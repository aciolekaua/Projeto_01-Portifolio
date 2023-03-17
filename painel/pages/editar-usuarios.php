<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Editar Usuarios</h2>

<?php

        use Classes\Painel;
        use Classes\Usuario;

        if(isset($_POST['acao'])) {
            //Envie o formulario
            
            
            $nome = $_POST['nome'];
            $senha = $_POST['password'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];
            $usuario = new Usuario();
            
            if(!empty($imagem['name'])){
                //Existe o Upload de Imagem
                if(Painel::imagemValida($imagem)){
                    Painel::deleteArquivo($imagem_atual);
                    $imagem = Painel::atualizarArquivo($imagem);
                    if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                        $_SESSION['img'] = $imagem;
                        Painel::alerta('sucesso','Usuario Atualizado com Sucesso junto com a imagem!');
                    } else {
                        Painel::alerta('erro','Usuario Não foi Atualizado junto com a imagem!');
                        
                    }
                } else {
                    Painel::alerta('erro','A Imagem não é valida!');
                }
            } else {
                $imagem = $imagem_atual;
                if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                    Painel::alerta('sucesso','Usuario Atualizado com Sucesso!');
                } else {
                    Painel::alerta('erro','Usuario Não foi Atualizado!');
                    
                }
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome'] ?>" />
        </div><!--form-group-->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" required <?php echo $_SESSION['password'] ?>/>
        </div><!--form-group-->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem"  />
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'] ?>" />
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar" />
        </div><!--form-group-->
    </form>

</div><!--box-content-->