<section class="banner-container">
        <div style="background-image: url(<?php echo INCLUDE_PATH; ?>./images/imagem.jpg);" class="banner-single"></div><!--banner-single-->
        <div style="background-image: url(<?php echo INCLUDE_PATH; ?>./images/work2.jpg);" class="banner-single"></div><!--banner-single-->
        <div style="background-image: url(<?php echo INCLUDE_PATH; ?>./images/work3.jpg);" class="banner-single"></div><!--banner-single-->
        <div class="overlay"></div><!--overlay-->
        <div class="center">
            <form method="post" action="" class="formEnvia">
                <h2>Qual seu melhor E-mail?</h2>
                <input type="email" name="email" required />
                <input type="hidden" name="identificador" value="form_home" />
                <input type="button" name="acao" value="Cadastrar!" />
            </form> 
        </div><!--center-->
            <div class="bullets"></div><!--bullets-->
    </section><!--Banner-Principal-->

    <section class="descricao-autor">
        <div class="center">
            <div class="w50 left">
                <h2><?php echo $result['nome_autor']; ?></h2>
                <p><?php echo $result['descricao']; ?></p>
            </div>
            <div class="w50 left">
                <!--Pegar imagem depois-->
                <img class="right" src="<?php echo INCLUDE_PATH;?>./images/EQUIPE-ELAI.jpg" />
            </div><!--w50-->
            <div class="clear"></div><!--clear-->
        </div><!--center-->
    </section><!--Descrição do site-->


    <section class="especialidades">
        
        <div class="center">
            <h2 class="title">Especialidades</h2>
            <div class="w33 left box-especialidades">
                <h3><i class="<?php echo $result['icone1'] ?>"></i></h3>
                <h4>CSS3</h4>
                <p><?php echo $result['descricao1']; ?></p>
            </div>  
            <div class="w33 left box-especialidades">
                <h3><i class="<?php echo $result['icone2'] ?>"></i></h3>
                <h4>HTML5</h4>
                <p><?php echo $result['descricao2']; ?></p>
            </div>  
            <div class="w33 left box-especialidades">
                <h3><i class="<?php echo $result['icone3'] ?>"></i></h3>
                <h4>JavaScript</h4>
                <p><?php echo $result['descricao3']; ?></p>
            </div>
            <div class="clear"></div>
        </div><!--center-->
    </section><!--Minha Especialidades-->


    <section class="extras">
        <div class="center">
            <div id="depoimentos" class="w50 left depoimenos-container">
                <h2 class="title">Depoimentos dos nossos Clientes</h2>
                <?php 
                    use Classes\MySql;

                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site_depoimentos` ORDER BY order_id ASC LIMIT 3");
                    $sql->execute();
                    $depoimentos = $sql->fetchAll();
                    foreach ($depoimentos as $key => $value) {
                        
                ?>
                <div class="depoimentos-single">
                    <p class="depoimentos-descricao"><?php echo $value['depoimentos']; ?></p>
                    <p class="nome-autor"><?php echo $value['nome']; ?> - <?php echo $value['data']; ?></p>
                </div><!--depoimento-single-->
                <?php } ?>
            </div><!--w50-->
            <div id="servicos" class="w50 left servicos-container">
                <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <?php 
                            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site_servicos` ORDER BY order_id ASC LIMIT 3");
                            $sql->execute();
                            $servicos = $sql->fetchAll();
                            foreach ($servicos as $key => $value) {
                        ?>
                        <li><?php echo $value['servicos']; ?></li>
                        <?php } ?>
                    </ul>
                </div><!--servicos-->
            </div><!--w50-->
            <div class="clear"></div>
        </div><!--center-->
    </section><!--extras-->