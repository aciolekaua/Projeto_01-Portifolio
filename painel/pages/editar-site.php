<?php  
    use Classes\Painel;

    $site = Painel::select('tb_site_config',false); 
?>
<div class="box-content">
<h2><i class="fa-solid fa-pen"></i> Editar Configurações do site</h2>
    <form method="post"  enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])) {
                if(Painel::update($_POST,true)){
                    Painel::alerta('sucesso','O site foi editado com sucesso');
                    $site = Painel::select('tb_site_config',false);
                }else {
                    Painel::alerta('erro','Não pode haver Campos Vazios!!');
                }
            }
        
        ?>
        <div class="form-group">
            <label>Titulo do site</label>
            <input type="text" name="titulo" class="form-control" value="<?php echo $site['titulo']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Nome do Autor do Site</label>
            <input type="text" name="nome_autor" class="form-control" value="<?php echo $site['nome_autor']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Descricao do Site</label>
            <textarea name="descricao"><?php echo $site['descricao']; ?></textarea>
        </div><!--form-group-->

        <?php 
            for ($i=1; $i <= 3; $i++) {
        ?>

        <div class="form-group">
            <label>Icone <?php echo $i; ?></label>
            <input type="text" name="icone<?php echo $i;?>" class="form-control" value="<?php echo $site['icone'.$i]; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Descricao do Icone <?php echo $i; ?></label>
            <textarea name="descricao<?php echo $i; ?>"><?php echo $site['descricao'.$i]; ?></textarea>
        </div><!--form-group-->

        <?php } ?>

        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_config"  />
            <input type="submit" name="acao" value="Atualizar"  />
        </div><!--form-group-->
    </form>
</div>