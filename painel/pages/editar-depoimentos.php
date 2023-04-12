<?php  
use Classes\Painel;
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $depoimentos = Painel::select('tb_site_depoimentos','id = ?',array($id));
    }else {
        Painel::alerta('erro','Voce precisa passar o parametro Id');
    }
?>
<div class="box-content">
<h2><i class="fa-solid fa-pen"></i> Editar Depoimentos</h2>
    <form method="post"  enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])) {
                if(Painel::update($_POST)){
                    Painel::redirect(INCLUDE_PATH_PAINEL.'editar-depoimentos?id='.$id);
                    $depoimentos = Painel::select('tb_site_depoimentos','id = ?',array($id));
                }else {
                    Painel::alerta('erro','Não pode haver Campos Vazios!!');
                }
            }
        
        ?>


        <div class="form-group">
            <label>Seu nome :</label>
            <input type="text" name="nome" value="<?php echo $depoimentos['nome']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Depoimento</label>
            <textarea name="depoimentos"><?php echo $depoimentos['depoimentos']; ?></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label>Data</label>
            <input formato="data" type="text" name="data" value="<?php echo $depoimentos['data']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>"  />
            <input type="hidden" name="nome_tabela" value="tb_site_depoimentos"  />
            <input type="submit" name="acao" value="Atualizar"  />
        </div><!--form-group-->
    </form>
</div>