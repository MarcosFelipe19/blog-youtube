<!--incluindo arquivo php config-->
<?php 
      include('config.php');
      Site::updateUsuarioOnline();
      Site::contador();

      $edit = Painel::selectAll('tb_admin_config');
      $valor;
      foreach ($edit as $key => $value) {
            $valor = $value;
      }
      ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Marcos Felipe Moura Mota">
    <meta name="Keywords" content="palavras,separadas,por,vírgula">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="blog de vídeos do youtube">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/reset.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/contato.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/posts.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/registre.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/responsivo.css">
    <title><?php echo $valor['titulo_site']; ?></title>
</head>
<body>
    <header>
        <div class="center">
                    <div class="logo left">
                       <a href="<?php echo INCLUDE_PATH; ?>home"><img src="<?php echo INCLUDE_PATH; ?>imagens/Capturar.PNG"></a>
                    </div><!--logo-->
            
                <nav class="menu-desktop right">
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH; ?>home">Home</a></li>
                        <li><a href="#sobre_nos">Sobre</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>posts">posts</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>contato">contato</a></li>
                    </ul>
                </nav><!--menu-desktop-->
                    
                <nav class="menu-mobile">
                    <label id="menu">&#9776;</label>
                
                    <ul>
                            <li><a href="<?php echo INCLUDE_PATH; ?>home">Home</a></li>
                            <li><a href="#sobre_nos">Sobre</a></li>
                            <li><a href="<?php echo INCLUDE_PATH; ?>posts">posts</a></li>
                            <li><a href="<?php echo INCLUDE_PATH; ?>contato">contato</a></li>
                    </ul>
                </nav><!--menu-mobile-->
                <div class="clear"></div>
     </div><!--center-->
    </header>
    <div class="clear"></div>

    <?php
        //urls amigaveis. incluindo arquivo apartir da url, arquivo htaccess pega a url-->
        if(isset($_GET['url'])){
            $url = $_GET['url'];
        }else{
            $url = 'home';
        }


            /*verifica se o caminho da pasta existe*/
        if(file_exists('paginas/'.$url.'.php')){
            include('paginas/'.$url.'.php');
        }
        else{
            include('paginas/404.php');
        }

    ?>

    <footer <?php if($url == '404'){
        echo 'class="fixed"';
    };?> >
        <div class="center">

        <section class="sobre">
        
                <div class="container-informacoes w50 left">
                    <h2><?php echo $valor['titulo_1']; ?></h2>
                    <p><?php  echo $valor['descricao_1']; ?></p>
                </div><!--container-informaçoes-->

                <div id="sobre_nos" class="container-informacoes w50 left">
                     <h2><?php echo $valor['titulo_2']; ?></h2>
                    <p><?php echo $valor['descricao_2']; ?></p>
                </div><!--container-informaçoes-->
            <div class="clear"></div>
        </section>

        <section class="container-icones">
                <div class="icones left">
                    <div><a target="black" href="<?php echo $valor['link_insta']; ?>"><img src="<?php echo INCLUDE_PATH; ?>imagens/icones/icons8-instagram-velho-26.png"></a></div>
                    <div><a target="black" href="<?php echo $valor['link_face']; ?>"><img src="<?php echo INCLUDE_PATH; ?>imagens/icones/icons8-f-do-facebook-26.png"></a></div>
                    <div><a target="black" href="<?php echo $valor['link_you']; ?>"><img src="<?php echo INCLUDE_PATH; ?>imagens/icones/icons8-reproduzir-youtube-26.png"></a></div>
                 </div>
                <p>UVN Network - 2021 Direitos Autorais Reservados. </p>
                <div class="clear"></div>
        </section>
        </div><!--center-->
    </footer>
        <script src="<?php echo INCLUDE_PATH; ?>js/index.js"></script>
    <?php
        if($url == 'home'){
        echo '<script src="js/slider.js"></script>';
        }else{
            return false;
        }
    ?>
</body>
</html>