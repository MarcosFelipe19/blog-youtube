<?php 
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $imagem = Painel::select('tb_site_posts','id = ?', array($idExcluir));
        $imagem = $imagem['img'];
        Painel::deletar('tb_site_posts',$idExcluir); 
        Painel::delete($imagem);   
        Painel::redirect('listar-posts');
    }
    if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site_posts',$_GET['order'],$_GET['id']);
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $posts = Painel::selectAll('tb_site_posts',($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>
<div class="box-content">

    <h2>Listar posts</h2>
    
    <table>
        <tr>
            <td>Título do post</td>
            <td>Imagem</td>
            <td>#</td>
            <td>#</td>
            <td>up</td>
            <td>down</td>
        </tr>
        <?php foreach ($posts as $key => $value){?>
        <tr>
            <td><?php echo $value['titulo_post']; ?></td>
            <td><img style="width:50px;" src="<?php echo INCLUDE_PATH_PAINEL."uploads/".$value['img']; ?>"></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-posts?id=<?php echo $value['id'];?>" class="btn edit">Editar</a></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-posts?excluir=<?php echo $value['id']; ?>"  class="btn delete">Deletar</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-posts?order=up&id=<?php echo $value['id']; ?>">&and;</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-posts?order=down&id=<?php echo $value['id']; ?>">&or;</a></td>
        </tr>
        <?php } ?>
    </table>

            <div class="paginacao">
                <?php 
                    $totalPagina = ceil(count(Painel::selectAll('tb_site_posts'))/$porPagina);
                    for($i = 1; $i <= $totalPagina; $i++){
                        if($i == $paginaAtual){
                            echo '<div class="caixa-controle numero"><a class="select-page" href="'.INCLUDE_PATH_PAINEL.'listar-posts?pagina='.$i.'">'.$i.'</a></div>';
                        }else{
                            echo '<a  href="'.INCLUDE_PATH_PAINEL.'listar-posts?pagina='.$i.'">'.$i.'</a>';
                        }
                    }
                ?> 
            </div><!--paginação-->
</div>