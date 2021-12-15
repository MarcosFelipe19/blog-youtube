<?php

    if(isset($_GET['loggout'])){
        
        Painel::loggout();
    }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Marcos Felipe Moura Mota">
    <meta name="Keywords" content="palavras,separadas,por,vírgula">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="blog de vídeos do youtube">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
    <title>UVN</title>
</head>
<body>
    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
            <?php if($_SESSION['img'] == ''){?>
                <div class="avatar-usuario">

                </div><!--avatar-usuario-->
            <?php }
            else{   ?>
                <div class="img-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL?>/uploads/<?php echo $_SESSION['img']; ?>">
                </div><!--avatar-usuario-->
                <?php }?>
            </div><!--box-usuario-->
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome'];  ?></p>
                <p><?php echo pegaCargo($_SESSION['cargo']);?></p>
            </div><!--nome-usuario-->

            <div class="itens-menu">
                <h2>Cadastro</h2>
                <a <?php selecionarMenu(' ')?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-video"><?php if(@$_GET['url'] == "cadastrar-video"){?><label>&#x0226B;</label><?php }?> Cadastrar vídeos</a>

                <a <?php selecionarMenu('cadastrar-slides')?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-slides"><?php if(@$_GET['url'] == "cadastrar-slides"){?><label>&#x0226B;</label><?php }?> Cadastrar slides</a>

                <a <?php selecionarMenu('cadastrar-posts')?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-posts"><?php if(@$_GET['url'] == "cadastrar-posts"){?><label>&#x0226B;</label><?php }?> Cadastrar posts</a>

                <h2>Gestão</h2>
                <a <?php selecionarMenu('listar-videos')?> href="<?php echo INCLUDE_PATH_PAINEL?>listar-videos"><?php if(@$_GET['url'] == "listar-videos"){?><label>&#x0226B;</label><?php }?> Listar vídeos</a>

                <a <?php selecionarMenu('listar-slides')?> href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides"><?php if(@$_GET['url'] == "listar-slides"){?><label>&#x0226B;</label><?php }?> Listar slides</a>

                <a <?php selecionarMenu('listar-posts')?> href="<?php echo INCLUDE_PATH_PAINEL?>listar-posts"><?php if(@$_GET['url'] == "listar-posts"){?><label>&#x0226B;</label><?php }?> Listar posts</a>

                <h2>Administração do painel</h2>
                <a <?php selecionarMenu('editar-usuario');?><?php verificaPermicao(1);?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario"><?php if(@$_GET['url'] == "editar-usuario"){?><label>&#x0226B;</label><?php }?> Editar usuário</a>

                <a <?php selecionarMenu('adicionar-usuario');?><?php verificaPermicao(2);?> href="<?php echo INCLUDE_PATH_PAINEL?>adicionar-usuario"><?php if(@$_GET['url'] == "adicionar-usuario"){?><label>&#x0226B;</label><?php }?> Adicionar usuário</a>

                <h2>Configurações gerais</h2>
                <a <?php selecionarMenu('editar-site')?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-site"><?php if(@$_GET['url'] == "editar-site"){?><label>&#x0226B;</label><?php }?> Editar</a>
            </div>
        </div><!--menu-wraper-->
    </div><!--menu-->
    <header>
        <div class="center">
            <label id="menu-btn">&#9776;</label>
            <div class="loggout">
                <a <?php if(@$_GET['url'] == ""){?>style="background-color:#5a666c;padding:16px;"<?php }?> href="<?php echo INCLUDE_PATH_PAINEL ?>"><span>Página inicial</span></a>
                <a href="<?php INCLUDE_PATH_PAINEL?>?loggout"><span>Sair</span></a>
            </div><!--loggout-->
        </div><!--center-->
    </header>
    <div class="clear"></div>
    <div class="content">  
    <?php  
        
        Painel::carregarPage();

    ?>
    </div><!--content-->
    <script src=" <?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>
</html>