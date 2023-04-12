<?php 
    use Classes\Painel;
?>
<div class="box-content">
<h2><i class="fa-solid fa-pen"></i> Cadastrar Slides</h2>
    <form method="post"  enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])) {
                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];

                if($nome == '') {
                    Painel::alerta('erro','O nome está Vazio!!');
                }else {
                    //Podemos Cadastrar
                    if(Painel::imagemValida($imagem) == false) {
                        Painel::alerta('erro','O formato da Imagem não é Válido!!');
                    }else {
                        //Podemos Cadastrar no Banco de Dados
                        $imagem = Painel::atualizarArquivo($imagem);
                        $arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site_slides'];
                        Painel::insert($arr);
                        Painel::alerta('sucesso','O Cadastrado foi realizado com Sucesso!!');
                    }
                }
            }
        
        ?>


        <div class="form-group">
            <label>Nome do Slide:</label>
            <input type="text" name="nome"  />
        </div><!--form-group-->


        <div class="form-group">
            <label>Imagem</label>
            <input type="file" name="imagem"  />
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="order_id" value=0 />
            <input type="hidden" name="nome_tabela" value="tb_site_slides" />
            <input type="submit" name="acao" value="Enviar"  />
        </div><!--form-group-->
    </form>
</div>