<?php 
    Global $imagem;
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $imagem = Painel::select('tb_site_videos','id = ?', array($idExcluir));
        $imagem = $imagem['img'];
        Painel::deletar('tb_site_videos',$idExcluir); 
        Painel::delete($imagem); 
        Painel::redirect('listar-videos');  
        
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site_videos',$_GET['order'],$_GET['id']);
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $videos = Painel::selectAll('tb_site_videos',($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>
<div class="box-content">

    <h2>Listar vídeos</h2>
    
    <table>
        <tr>
            <td>Título do vídeo</td>
            <td>Imagem</td>
            <td>#</td>
            <td>#</td>
            <td>up</td>
            <td>down</td>
        </tr>
        <?php foreach ($videos as $key => $value){?>
        <tr>
            <td><?php echo $value['titulo_video']; ?></td>
            <td><img style="width:50px; height:50px;" src="<?php echo INCLUDE_PATH_PAINEL."uploads/".$value['img']; ?>"></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-videos?id=<?php echo $value['id'];?>" class="btn edit">Editar</a></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-videos?excluir=<?php echo $value['id']; ?>"  class="btn delete">Deletar</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-videos?order=up&id=<?php echo $value['id']; ?>">&and;</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-videos?order=down&id=<?php echo $value['id']; ?>">&or;</a></td>
        </tr>
        <?php } ?>
    </table>

          <div class="paginacao">
                <?php 
                    $totalPagina = ceil(count(Painel::selectAll('tb_site_videos'))/$porPagina);
                
                    for($i = 1; $i <= $totalPagina; $i++){
                        if($i == $paginaAtual){
                            echo '<div class="caixa-controle numero"><a class="select-page" href="'.INCLUDE_PATH_PAINEL.'listar-videos?pagina='.$i.'">'.$i.'</a></div>';
                        }else{
                            echo '<div class="caixa-controle numero"><a  href="'.INCLUDE_PATH_PAINEL.'listar-videos?pagina='.$i.'">'.$i.'</a></div>';
                        }
                    }
                ?> 
            </div><!--paginação-->
</div>