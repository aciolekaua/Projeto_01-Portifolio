<?php 
    use Classes\Painel;
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $slide = Painel::select('tb_site_slides','id = ?',array($id));
    }else{
        Painel::alerta('erro','Voce precisa passar o ID');
        die();
    }
?>
<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Editar Slides</h2>

<?php

        if(isset($_POST['acao'])) {
            //Envie o formulario
            
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];
            
            if(!empty($imagem['name'])){
                //Existe o Upload de Imagem
                if(Painel::imagemValida($imagem)){
                    Painel::deleteArquivo($imagem_atual);
                    $imagem = Painel::atualizarArquivo($imagem);
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site_slides'];
                    Painel::update($arr);
                    $slide = Painel::select('tb_site_slides','id = ?',array($id));
                    Painel::alerta('sucesso','Slide foi atualizdo com sucesso e Atualizou com Imagem');
                } else {
                    Painel::alerta('erro','A Imagem não é valida!');
                }
            } else {
                $imagem = $imagem_atual;
                $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site_slides'];
                Painel::update($arr);
                $slide = Painel::select('tb_site_slides','id = ?',array($id));
                Painel::alerta('sucesso','Slide foi atualizdo com sucesso');
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $slide['nome'] ?>" />
        </div><!--form-group-->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem"  />
            <input type="hidden" name="imagem_atual" value="<?php echo $slide['slide'] ?>" />
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar" />
        </div><!--form-group-->
    </form>

</div><!--box-content-->