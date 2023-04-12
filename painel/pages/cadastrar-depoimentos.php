<?php  
use Classes\Painel;
?>
<div class="box-content">
<h2><i class="fa-solid fa-pen"></i> Adcionar Depoimentos</h2>
    <form method="post"  enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])) {
                if(Painel::insert($_POST)){
                    Painel::alerta('sucesso','Depoimento adcionado com sucesso');
                }else {
                    Painel::alerta('erro','Ocorreu um erro ao adcionar os seu depoimento!');
                }
            }
        
        ?>


        <div class="form-group">
            <label>Seu nome :</label>
            <input type="text" name="nome"  />
        </div><!--form-group-->

        <div class="form-group">
            <label>Depoimento</label>
            <textarea name="depoimento"></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label>Data</label>
            <input formato="data" type="text" name="data"  />
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="order_id" value="0"  />
            <input type="hidden" name="nome_tabela" value="tb_site_depoimentos"  />
            <input type="submit" name="acao" value="Enviar"  />
        </div><!--form-group-->
    </form>
</div>