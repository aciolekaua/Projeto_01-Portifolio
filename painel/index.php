<?php

use Classes\Painel;

    include('../config.php');

    if(Painel::logado() == false) {
        include('login.php');
    } else {
        include('main.php');
    }

?>