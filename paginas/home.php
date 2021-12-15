<main>
<?php 
    $sql1 = MySql::conectar()->prepare("SELECT * FROM `tb_site_slides` ORDER BY order_id ASC LIMIT 5");
    $sql1->execute();
    $slides = $sql1->fetchAll(); 

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 9;

    $videos = Painel::selectAll('tb_site_videos',($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>
        <section class="section-destaque">
                <div id="container_externo" class="container-externo-destaque">         
                    <?php foreach ($slides as $key => $value) {?>
                        <div class="container-destaque" style="<?php if($key == 0){echo "visibility:visible;";}?>">
                        <div class="center">
                            <div class="container-video left">
                                <div class="video"><?php echo $value['codigo_slide']; ?></div><!--video-->
                            </div><!--container-video-->

                            <div class="descricao-video  right">
                                <a href=""><h2 class="titulo"><?php echo substr($value['titulo_slide'], 0, 67)."..."; ?></h2></a>
                                <p class="descricao">
                                <?php echo substr($value['descricao'], 0, 400)."..."; ?> 
                                </p>
                            </div><!--descricao-video-->
                                <div class="clear"></div><!--limpando flutuação-->
                        </div><!--center-->
                    </div><!--container-destaque-->
                    <?php }?>
                    <div class="clear"></div>
                </div><!--container-externo-destaque-->
                <div class="clear"></div>
                <div id="direction">
                </div>
                <div class="seta">
                        <div id="left" class="seta-caixa">&lt</div>
                        <div id="right" class="seta-caixa">&gt</div>
                </div><!--seta-->             
        </section><!--section-destaque-->

        <section class="posts-videos">
            <div class="center">
                <div class="list-categoria">
                    <aside>
                        <ul>
                            <li id="principal">Todos os vídeos</li>
                        </ul>
                    </aside><!--aside-->
                </div><!--list-categoria-->
             
                <div class="list-videos">
                <?php 
                    foreach ($videos as $key => $value) {
                ?> 
                    <a href="<?php echo INCLUDE_PATH;?>video-indi?id=<?php echo $value['id']?>">
                        <div class="post-video left">
                            <div class="item-video">
                                <img src="<?php echo INCLUDE_PATH_PAINEL."uploads/".$value['img'];?>" > 
                            </div>
                            <p><?php echo $value['titulo_video']; ?> </p>
                        </div><!--post video-->
                    </a>    
                    <?php 
                          }
                     ?> 
                </div><!--list-videos-->
                <div class="clear"></div>
                <!--controles de páginação-->
                <div class="paginacao">
                <?php 
                    $totalPagina = ceil(count(Painel::selectAll('tb_site_videos'))/$porPagina);
                    for($i = 1; $i <= $totalPagina; $i++){
                        if($i == $paginaAtual){
                            echo '<div class="caixa-controle numero"><a class="select-page" href="'.INCLUDE_PATH.'?pagina='.$i.'">'.$i.'</a></div>';
                        }else{
                            echo '<div class="caixa-controle numero"><a  href="'.INCLUDE_PATH.'?pagina='.$i.'">'.$i.'</a></div>';
                        }
                    }
                ?> 
            </div><!--paginação-->
            </div><!--center-->
        </section><!--posts-videos-->

    </main>
