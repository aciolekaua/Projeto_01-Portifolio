<?php 
 use Classes\MySql;

    if(isset($_COOKIE['lembrar'])) {
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $Mysql = MySql::conectar();
        $sql = $Mysql->prepare("SELECT * FROM `tb_admin_usuarios` WHERE  user = ? AND password = ?");
        $sql->execute(array($user,$password));

        if($sql->rowCount() == 1) {
            $info = $sql->fetch();
            $_SESSION['login'] = 'true';
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];
            header('Location: '.INCLUDE_PATH_PAINEL);
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Painel de controle</title>
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>./css/styles.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="palavras-chave,do,meu,site" />
    <meta name="description" content="Descrição do meu site" />
    <meta charset="utf-8" />
</head>
<body>
    <div class="box-login">
        <?php

            if(isset($_POST['acao'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $Mysql = MySql::conectar();
                $sql = $Mysql->prepare("SELECT * FROM `tb_admin_usuarios` WHERE  user = ? AND password = ?");
                $sql->execute(array($user,$password));

                if($sql->rowCount() == 1) {
                    //Logamos com sucesso
                    $info = $sql->fetch();
                    $_SESSION['login'] = 'true';
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['cargo'] = $info['cargo'];
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['img'] = $info['img'];
                    if(isset($_POST['lembrar'])){
                        setcookie('lembrar','true',time()+(60*60*24),'/');
                        setcookie('user',$user,time()+(60*60*24),'/');
                        setcookie('password',$password,time()+(60*60*24),'/');
                    }
                    header('Location: '.INCLUDE_PATH_PAINEL);
                    die();
                } else {
                    //Login Falhou
                    echo '<div class="box-erro"><i class="fa-sharp fa-solid fa-x"></i> Usuarios ou senha Incorretos!!</div>';

                }
            }
        ?>
        <h2>Efetue o Login:</h2>
        <form method="post">
            <input type="text" name="user" placeholder="Login..." required />
            <input type="password" name="password" placeholder="Senha..." required />
            <div class="form-group-login left">
                <input type="submit" name="acao" value="Logar!" />
            </div>
            <div class="form-group-login right">
                <label>Lembre-me</label>
                <input type="checkbox" name="lembrar" />
            </div>
            <div class="clear"></div>
        </form>
    </div><!--box-login-->
<script src="https://kit.fontawesome.com/d6813c072e.js" crossorigin="anonymous" <?php echo INCLUDE_PATH;?>></script>
</body>
</html>