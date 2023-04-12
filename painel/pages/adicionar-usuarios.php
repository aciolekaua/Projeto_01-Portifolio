<?php 
//verificarPermissaoPag(2); 
use Classes\Painel;
use Classes\Usuario;
?>
<div class="box-content">
<h2><i class="fa-solid fa-pen"></i> Editar Usuarios</h2>
    <form method="post"  enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])) {
                $login = $_POST['login'];
                $nome = $_POST['nome'];
                $senha = $_POST['password'];
                $cargo = $_POST['cargo'];
                $imagem = $_FILES['imagem'];

                if($login == '') {
                    Painel::alerta('erro','O Login está Vazio!!');
                    
                }else if($nome == '') {
                    Painel::alerta('erro','O Nome está Vazio!!');
                }else if($senha == '') {
                    Painel::alerta('erro','A Senha está Vazio!!');
                }else if($cargo == '') {
                    Painel::alerta('erro','O Cargo precisa estar Selecionado!!');
                }else if($imagem['name'] == '') {
                    Painel::alerta('erro','A Imagem precisa estar Selecionada!!');
                }else {
                    //Podemos Cadastrar
                    if($cargo > $_SESSION['cargo']) {
                        Painel::alerta('erro','Você precisa Selecionar um Cargo menor que o Seu!!');
                    }else if(Painel::imagemValida($imagem) == false) {
                        Painel::alerta('erro','O formato da Imagem não é Válido!!');
                    }else if(Usuario::userExist($login)){
                        Painel::alerta('erro','O Usuario '.$login.' já existe no sistema!!');
                    }else {
                        //Podemos Cadastrar no Banco de Dados
                        $usuario = new Usuario();
                        $imagem = Painel::atualizarArquivo($imagem);
                        $usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
                        Painel::alerta('sucesso','O Usuario '.$login.' foi Cadastrado com Sucesso!!');
                    }
                }


            }
        
        ?>


        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login"  />
        </div><!--form-group-->

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome"  />
        </div><!--form-group-->

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password"  />
        </div><!--form-group-->

        <div class="form-group">
            <label>Cargo:</label>
            <select name="cargo">
                <?php 
                    foreach(Painel::$cargos as $key => $value) {
                       if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                ?>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Imagem</label>
            <input type="file" name="imagem"  />
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Enviar"  />
        </div><!--form-group-->
    </form>
</div>