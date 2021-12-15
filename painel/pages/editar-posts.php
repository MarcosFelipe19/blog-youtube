<?php 
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = (int)$_GET['id'];
        $posts = Painel::select('tb_site_posts','id = ?', array($id));
    }else{
        Painel::alert('erro','Você precisa passa o parametro ID.');
        die();
    }
        ?>
<div class="box-content">

    <h2>Editar post</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                //envie formulário
                $imagem = $_FILES['img'];
                if($_POST["titulo_post"] != ""  &&  $_POST['descricao'] != ""){
                        if($imagem['name'] != ""){
                            if(Painel::imagemValida($imagem,1200)){
                                $imagem = Painel::uploadFile($imagem);
                                $_POST['img'] = $imagem;
                                Painel::delete($_POST['img_atual']);
                                Painel::update($_POST);
                                $posts = Painel::select('tb_site_posts','id = ?', array($id));
                                Painel::alert("sucesso", "O post foi atualizado com sucesso!");
                            }else{
                                Painel::alert("erro", "A imagem não é válida!");
                            }
                            
                        }else{
                            Painel::update($_POST,);
                            $posts = Painel::select('tb_site_posts','id = ?', array($id));
                            Painel::alert("sucesso", "O post foi atualizado com sucesso!");
                        }
                    }else{
                        Painel::alert("erro","Campo título ou descrição está vazio!");
                     }
            }

            
        ?>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo_post" id="titulo" value="<?php echo $posts['titulo_post'];?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="nome">Descrição:</label>
            <textarea name="descricao"><?php echo $posts['descricao']; ?></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" name="img" id="imagem">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
            <input type="hidden" name="nome_tabela" value="tb_site_posts">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="img_atual" value="<?php echo $posts['img'];?>">
        </div><!--form-group-->
    </form>
</div>