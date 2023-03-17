<?php
    include('config.php');
?>
<?php use Classes\Site;
    Site::updateUsuarioOnline(); 
?>
<?php 
    Site::contador();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Projeto 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"<?php echo INCLUDE_PATH;?>>
    <link href="<?php echo INCLUDE_PATH;?>./style/style.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="palavras-chave,do,meu,site" />
    <meta name="description" content="Descrição do meu site" />
    <meta charset="utf-8" />

</head>

<body>

<base base="<?php echo INCLUDE_PATH;?>" />
    <?php 
        $url= isset($_GET['url']) ? $_GET['url'] : 'home' ;
        switch ($url){
            case 'depoimentos':
                echo '<target target="depoimentos" />';
            break;

            case 'servicos':
                echo '<target target="servicos" />';
                break;
        }
    ?>
    <div class="sucesso">Formulario Enviado com sucesso!!</div>
    <div class="overlay-loading">
        <img src="<?php INCLUDE_PATH;?>./images/carregar.gif" />
    </div><!--overlay-loading-->
    <header>
        <div class="center">
            <div class="logo left"><a href="/">Logomarca</a></div><!--Logo-->
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>servicos">Serviço</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                <i class="fa-solid fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>servicos">Serviço</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div><!--clear-->
        </div><!--center-->
    </header>

    <div class="container-principal">
        <?php 
            
            if(file_exists('pages/'.$url.'.php')){
                include('pages/'.$url.'.php');
            } else {
                //Podemos fazer oq quiser, a pagina não existe.
                if($url != 'depoimentos' && $url != 'servicos'){
                    $pagina404 = true;
                    include('pages/404.php');
                }else {
                    include('pages/home.php');
                }
                
            }
        ?>
    </div><!--container-principal-->

    <footer <?php if(isset($pagina404) && $pagina404 == true ) echo 'class="fixeds"'; ?> >
        <div class="center">
            <p>Todos os direitos reservados</p>
        </div><!--center-->
    </footer><!--footer-->

    <script src="https://kit.fontawesome.com/d6813c072e.js" crossorigin="anonymous" <?php echo INCLUDE_PATH;?>></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" <?php echo INCLUDE_PATH;?>></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer" <?php echo INCLUDE_PATH;?>></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu5pSjVZWCPOm4CEvKhNWMSkDswHxa3N0&callback=initMap"  ></script>
    <script src="./js/constants.js"<?php echo INCLUDE_PATH ?>></script>
    <script src="./js/map.js"<?php INCLUDE_PATH;?>></script>
    <script src="./js/index.js"<?php echo INCLUDE_PATH;?>></script>
    <?php 
        if($url == 'home' || $url = ''){ 
    ?>
     <script src="./js/slider.js"<?php echo INCLUDE_PATH; ?>></script>
    <?php 
        }
    ?>
    <?php 
        if($url == 'contato') {
            //include('/pages/contato.php');
    ?>
    <?php 
        } 
    ?>
    <script src="./js/formulario.js"<?php echo INCLUDE_PATH; ?>></script>
</body>

</html>