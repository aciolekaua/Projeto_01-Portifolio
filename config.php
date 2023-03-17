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


    //Funções 

    function pegaCargo($cargo){
        $array = array('0' => 'Normal','1' => 'Sub Admin', '2' => 'Admin');

        return $array[$cargo];
    }
?>