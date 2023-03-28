<?php

use Classes\MySql;
use Classes\Painel;

  $usuariosOnline = Painel::listarUsuariosOnline();

  $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas`");

  $pegarVisitasTotais->execute();

  $pegarVisitasTotais = $pegarVisitasTotais->rowCount();



  $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas` WHERE dia = ?");

  $pegarVisitasHoje->execute(array(date('Y-m-d')));

  $pegarVisitasHoje = $pegarVisitasHoje->rowCount();
 
 ?>
<div class="box-content left w100">
        <h2><i class="fa-solid fa-house"></i> Painel de Controle - <?php echo NOME_EMPRESA; ?></h2>

        <div class="box-metricas">
            <div class="box-metricas-single">
                <div class="box-metricas-wrapper">
                    <h2>Usuarios Online</h2>
                    <p><?php echo count($usuariosOnline); ?></p>
                </div><!--box-metricas-wrapper-->
            </div><!--box-metricas-single-->
            <div class="box-metricas-single">
                <div class="box-metricas-wrapper">
                    <h2>Total de visitas</h2>
                    <p><?php echo $pegarVisitasTotais; ?></p>
                </div><!--box-metricas-wrapper-->
            </div><!--box-metricas-single-->
            <div class="box-metricas-single">
                <div class="box-metricas-wrapper">
                    <h2>Visitas Hoje</h2>
                    <p><?php echo $pegarVisitasHoje; ?></p>
                </div><!--box-metricas-wrapper-->
            </div><!--box-metricas-single-->
        </div><!--box-metricas-->
</div><!--box-content-->

<div class="clear"></div><!--clear-->

<div class="box-content w100 rigth">
    <h2><i class="fa-solid fa-face-smile"></i> Usuarios Online</h2>

    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div><!--col-->
            <div class="col">
                <span>Ultima Ação</span>
            </div><!--col-->
            <div class="clear"></div><!--clear-->
        </div><!--row-->

        <?php foreach($usuariosOnline as $key => $value) { ?>
        <div class="row">
            <div class="col">
                <span><?php echo $value['ip']; ?></span>
            </div><!--col-->
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])); ?></span>
            </div><!--col-->
            <div class="clear"></div><!--clear-->
            <?php } ?>
        </div><!--row-->
    </div><!--table-responsive-->
</div><!--box-content-->
