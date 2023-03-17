<?php 
    header('Content-Type: application/json');
    include('../config.php');
    use Classes\Email;
    
    $assunto = 'Novo Email!!';
    $data = array();
    $corpo = '';

    foreach ($_POST as $key => $value) {
        $corpo.=ucfirst($key).": ".$value;
        $corpo.="<hr>";
    }
    $info = array('assunto'=>$assunto,'corpo'=>$corpo);
    $mail = new Email('smtp.titan.email','contato@ivici.com.br','contato12tres','Contato ivici');
    $mail->addAddress('aciolekaua74@gmail.com', 'kaua');
    $mail->formatarEmail($info);
    if($mail->enviarEmail()){
      $data['sucesso'] = 'true';
    } else {
        $data['erro'] = 'true';
    }
    echo(json_encode($data));
?>