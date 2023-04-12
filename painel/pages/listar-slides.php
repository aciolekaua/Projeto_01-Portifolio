<?php

use Classes\MySql;
use Classes\Painel;
    if(isset($_GET['excluir'])){
        $idExcluir = (int)$_GET['excluir'];
        $selectImage = MySql::conectar()->prepare("SELECT slide FROM `tb_site_slides` WHERE id=?");
        $selectImage->execute(array($_GET['excluir']));
        $imagem = $selectImage->fetch()['slide'];
        Painel::deleteArquivo($imagem);
        Painel::deletar('tb_site_slides',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site_slides',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $slides = Painel::selectAll('tb_site_slides',($paginaAtual - 1) * $porPagina,$porPagina);
?>
<div class="box-content">
    <h2><i class="fa-regular fa-address-card"></i> Listar Slides</h2>
        <div class="wrapper-table">
            <table>
                <tr>
                    <td>Nome</td>
                    <td>Imagem</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                </tr>
                <?php 
                    foreach ($slides as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value['nome']; ?></td>
                    <td><img style="width: 50px;height: 50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide']; ?>" ></td>
                    <td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL ?>editar-slides?id=<?php echo $value['id'] ?>"><i class="fa-solid fa-pen"></i> Editar</a></td>
                    <td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id'] ?>"><i class="fa-solid fa-xmark"></i> Excluir</a></td>
                    <td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?php echo $value['id']; ?>"><i class="fa-solid fa-up-long"></i> </a></td>
                    <td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>listar-slides?order=down&id=<?php echo $value['id']; ?>"><i class="fa-solid fa-down-long"></i> </a></td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <div class="paginacao">
           <?php  
                $totalPaginas = ceil(count(Painel::selectAll('tb_site_depoimentos')) / $porPagina);
                
                for ($i=1; $i <= $totalPaginas; $i++) {
                    if($i == $paginaAtual){
                        echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                    }else {
                        echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                    }
                }
           ?>
        </div><!--paginacao-->
</div><!--box-content-->