<?php 
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = (int)$_GET['id'];
        $videos = Painel::select('tb_site_videos','id = ?', array($id));
    }else{
        Painel::redirect(INCLUDE_PATH.'paginas/404'); 
     }
        ?>
<section class="posts-blog">
    <div class="center">
        <div class="container-externo-indi">
            <div class="container-indi">
                <div class="titulo-indi">
                    <h1> <?php echo $videos['titulo_video']; ?></h1>
                </div>
                <div class="container-post-indi">
                    <div class="post-indi">
                         <?php echo $videos['codigo_video']; ?> 
                    </div><!--video-indi-->

                    <div class="descricao-indi">
                        <?php echo $videos['descricao']; ?>
                    </div><!--descricao-indi-->
                </div><!--container-post-indi-->
    </div><!--center-->
</section>
<script>

window.addEventListener("load" function(){
    //document.querySelector("iframe").style.widith = 100+"%"
})

<script>