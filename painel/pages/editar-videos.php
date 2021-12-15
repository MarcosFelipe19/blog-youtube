<?php 
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = (int)$_GET['id'];
        $videos = Painel::select('tb_site_videos','id = ?', array($id));
    }else{
        Painel::alert('erro','Voceê precisa passa o parametro ID.');
        die();
    }
        ?>
<div class="box-content">

    <h2>Editar vídeo</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                //envie formulário
                $imagem = $_FILES['img'];
                if($_POST["titulo_video"] != "" && $_POST['codigo_video'] != ""){
                        if($imagem['name'] != ""){
                        if(Painel::imagemValida($imagem,1000)){
                            $imagem = Painel::uploadFile($imagem);
                            Painel::delete($_POST['img_atual']);
                            $_POST['img'] = $imagem;
                            Painel::update($_POST);
                            $videos = Painel::select('tb_site_videos','id = ?', array($id));
                            Painel::alert("sucesso", "O vídeo foi atualizado com sucesso!");
                        }else{
                            Painel::alert("erro", "A imagem não é válida!");
                        }
                    }else{
                        Painel::update($_POST,);
                        $videos = Painel::select('tb_site_videos','id = ?', array($id));
                        Painel::alert("sucesso", "O vídeo foi atualizado com sucesso!");
                    }
                }else{
                    Painel::alert("erro","Campo título,código de incorporação ou descrição está vazio!");
                }
            }

            
        ?>
        <div class="form-group">
            <label for="titulo">Título do vídeo:</label>
            <input type="text" name="titulo_video" id="titulo" value="<?php echo $videos['titulo_video'];?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="">Código de incorporaçao:</label>
            <textarea name="codigo_video"><?php echo $videos['codigo_video']; ?></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label for="nome">Descrição:</label>
            <textarea name="descricao"><?php echo $videos['descricao']; ?></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" name="img" id="imagem" >
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_videos">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="img_atual" value="<?php echo $videos['img'];?>">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>
</div>