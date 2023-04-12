<?php
    use Classes\Painel;
    if(isset($_GET['excluir'])){
        $idExcluir = (int)$_GET['excluir'];
        Painel::deletar('tb_site_servicos',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site_servicos',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $servicos = Painel::selectAll('tb_site_servicos',($paginaAtual - 1) * $porPagina,$porPagina);
?>
<div class="box-content">
    <h2><i class="fa-regular fa-address-card"></i> Listar Serviços</h2>
        <div class="wrapper-table">
            <table>
                <tr>
                    <td>Servicos</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                </tr>
                <?php 
                    foreach ($servicos as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value['servicos']; ?></td>
                    <td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL ?>editar-servicos?id=<?php echo $value['id'] ?>"><i class="fa-solid fa-pen"></i> Editar</a></td>
                    <td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL ?>listar-servicos?excluir=<?php echo $value['id'] ?>"><i class="fa-solid fa-xmark"></i> Excluir</a></td>
                    <td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>listar-servicos?order=up&id=<?php echo $value['id']; ?>"><i class="fa-solid fa-up-long"></i> </a></td>
                    <td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>listar-servicos?order=down&id=<?php echo $value['id']; ?>"><i class="fa-solid fa-down-long"></i> </a></td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <div class="paginacao">
           <?php  
                $totalPaginas = ceil(count(Painel::selectAll('tb_site_servicos')) / $porPagina);
                
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