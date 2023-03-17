<?php 
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    require __DIR__.'/vendor/autoload.php';
    define('INCLUDE_PATH','http://localhost/Projeto_01/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');  

    //Conectar com o banco de dados.
    define('HOST','localhost');
    define('DATABASE','projeto_01');
    define('USER','root');
    define('PASSWORD','');

    define('NOME_EMPRESA','Kauã Carlos');
    define('BASE_DIR_PAINEL',__DIR__.'/painel');


    //Funções do Painel

    function pegaCargo($cargo){
        $array = array('0' => 'Normal','1' => 'Sub Admin', '2' => 'Admin');

        return $array[$cargo];
    }

    function selecionadoMenu($par) {
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par) {
            echo 'class="menu-active"';
        }
    }

    function verificarPermissaoMenu($permissao) {
        if($_SESSION['cargo'] >= $permissao) {
            return;
        } else {
            echo 'style="display:none;"';
        }
    }

    function verificarPermissaoPag($permissao) {
        if($_SESSION['cargo'] >= $permissao) {
            return;
        } else {
            include('painel/pages/permissao-negada.php');
           die();
        }
    }
?>