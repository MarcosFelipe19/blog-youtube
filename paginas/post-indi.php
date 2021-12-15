<?php 
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = (int)$_GET['id'];
        $posts = Painel::select('tb_site_posts','id = ?', array($id));
        $postsindi = MySql::conectar()->prepare("SELECT * FROM `tb_site_posts_indi` WHERE id_post = ?");
        $postsindi->execute(array($id));
        $postsindi =  $postsindi->fetchAll();
    }else{
        Painel::redirect(INCLUDE_PATH.'paginas/404'); 
     }
        ?>
<section class="posts-blog">
    <div class="center">
        <div class="container-externo-indi">
            <div class="container-indi">
                <div class="titulo-indi">
                    <h1><?php echo $posts['titulo_post'];?></h1>
                </div>
                <div class="container-post-indi">
                    <div class="img-indi">
                        <img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $posts['img'];?>">
                    </div><!--img-indi-->
                    <div class="descricao-indi">
                        <?php echo $posts['descricao'] ?>
                    </div><!--descricao-indi-->
                </div><!--container-post-indi-->

                <?php foreach($postsindi as $key => $value) {?>
                <div class="container-post-indi">
                    <h3><?php echo $value['sub_titulo'];?></h3><!--h3-->
                    <div class="img-indi">
                        <img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['imagem_sub'];?>">
                    </div><!--img-indi-->
                    <div class="descricao-indi">
                        <?php echo $value['sub_descricao'];?>
                    </div><!--descricao-indi-->
                </div><!--container-post-indi-->
                <?php }?>
            </div><!--container-indi-->
        </div><!--container-externo-indi-->
    </div><!--center-->
</section>