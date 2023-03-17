<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Editar Usuarios</h2>

<?php

        use Classes\Painel;

        if(isset($_POST['acao'])) {
            //Envie o formulario
            Painel::alerta('sucesso','Cadastro Realizado Realizado com Sucesso!');
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome'] ?>" />
        </div><!--form-group-->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" required <?php echo $_SESSION['password'] ?>/>
        </div><!--form-group-->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" required />
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'] ?>" />
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar" />
        </div><!--form-group-->
    </form>

</div><!--box-content-->