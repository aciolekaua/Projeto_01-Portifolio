<?php 
    use Classes\Painel;

    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Painel Main</title>
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>./css/styles.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="palavras-chave,do,meu,site" />
    <meta name="description" content="Descrição do meu site" />
    <meta charset="utf-8" />
</head>
<body>
<div class="menu">
    <div class="menu-wrapper">
        <div class="box-usuario">
                <?php 
                    if(empty($_SESSION['img'])){    
                ?>
                <div class="avatar-usuario">
                    <i class="fa-solid fa-user"></i> 
                </div><!--avatar-usuario-->
                <?php } else {?>
                    <div class="imagem-usuario">
                        <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img'];?>" />
                    </div><!--imagem-usuario-->
                <?php }?>
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome']; ?> </p>
                <p><?php echo pegaCargo($_SESSION['cargo']);?></p>
            </div><!--nome-usuario-->
        </div><!--box-usuairo-->
        <div class="itens-menu">
            <h2>Cadastro</h2>
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimentos">Cadastrar Depoimentos</a>
            <a href="">Cadastrar Cadastrar Serviços</a>
            <a href="">Cadastrar Slides</a>
            <h2>Gestão</h2>
            <a href="">Listar Depoimentos</a>
            <a href="">Listar Serviços</a>
            <h2>Administração do Painel</h2>
            <a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-usuarios">Editar Usuario</a>
            <a href="">Adcionar Usuarios</a>
            <h2>Configuração Geral</h2>
            <a href="">Editar</a>
        </div><!--itens-menu-->
    </div><!--menu-wrapper-->
</div><!--menu-->
<header>
    <div class="center">
        <div class="menu-btn">
            <i class="fa-solid fa-bars"></i>
        </div><!--menu-btn-->
        <div class="loggout">
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa-solid fa-house"></i> <span>Pagina Inicial</span></a>
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa-solid fa-right-from-bracket"></i> <span>Sair</span></a>
        </div><!--loggout-->

        <div class="clear"></div><!--clear-->
    </div><!--center-->
</header>
<div class="content">
    <?php Painel::carregarPagina(); ?>
</div><!--content-->



<script src="https://kit.fontawesome.com/d6813c072e.js" crossorigin="anonymous" <?php echo INCLUDE_PATH;?>></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer" <?php echo INCLUDE_PATH;?>></script>
<script src="js/main.js" <?php echo INCLUDE_PATH_PAINEL ?>></script>
</body>
</html>