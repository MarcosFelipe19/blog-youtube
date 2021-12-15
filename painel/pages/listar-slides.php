<?php 
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site_slides',$idExcluir); 
        Painel::redirect('listar-slides');
    }
    if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site_slides',$_GET['order'],$_GET['id']);
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $slides = Painel::selectAll('tb_site_slides',($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>
<div class="box-content">

    <h2>Listar slides</h2>
    
    <table>
        <tr>
            <td>Título do slide</td>
            <td>Descrição</td>
            <td>#</td>
            <td>#</td>
            <td>up</td>
            <td>down</td>
        </tr>
        <?php foreach ($slides as $key => $value){?>
        <tr>
            <td><?php echo substr($value['titulo_slide'], 0, 60); ?></td>
            <td><?php echo substr($value['descricao'], 0, 100); ?></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slides?id=<?php echo $value['id'];?>" class="btn edit">Editar</a></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id']; ?>"  class="btn delete">Deletar</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?php echo $value['id']; ?>">&and;</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=down&id=<?php echo $value['id']; ?>">&or;</a></td>
        </tr>
        <?php } ?>
    </table>

  
    <div class="paginacao">
                <?php 
                    $totalPagina = ceil(count(Painel::selectAll('tb_site_slides'))/$porPagina);
                    for($i = 1; $i <= $totalPagina; $i++){
                        if($i == $paginaAtual){
                            echo '<div class="caixa-controle numero"><a class="select-page" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a></div>';
                        }else{
                            echo '<div class="caixa-controle numero"><a  href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a></div>';
                        }
                    }
                ?> 
            </div><!--paginação-->
</div>