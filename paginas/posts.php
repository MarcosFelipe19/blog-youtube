<?php 
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $posts = Painel::selectAll('tb_site_posts',($paginaAtual - 1) * $porPagina, $porPagina*$paginaAtual);
?>
<section class="posts-blog">
    <div class="center">
        <?php foreach ($posts as $key => $value){ ?> 
        <div class="container-posts">
            <a href="<?php echo INCLUDE_PATH;?>post-indi?id=<?php echo $value['id'];?>">
                <div class="titulo">
                    <h1><?php echo substr($value['titulo_post'], 0, 100)."...";?></h1>
                </div><!--titulo-->
                <div class="img-destaque">
                    <div class="img-interno">
                        <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['img'];?>">
                    </div><!--img-interno-->
                </div><!--img-destaque-->
                <div class="descricao">
                    <p><?php echo substr($value['descricao'], 0, 400)."...";?></p>
                </div><!--descricao-->
             </a>
        </div><!--container-posts--> 
        <?php }?> 
        <div class="paginacao">
                <?php 
                    $totalPagina = ceil(count(Painel::selectAll('tb_site_posts'))/$porPagina);
                    for($i = 1; $i <= $totalPagina; $i++){
                        if($i == $paginaAtual){
                            echo '<div class="caixa-controle numero"><a class="select-page" href="'.INCLUDE_PATH.'posts?pagina='.$i.'">'.$i.'</a></div>';
                        }else{
                            echo '<div class="caixa-controle numero"><a  href="'.INCLUDE_PATH.'posts?pagina='.$i.'">'.$i.'</a></div>';
                        }
                    }
                ?> 
        </div><!--paginação-->
    </div><!--center-->
</section>