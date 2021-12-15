<?php 
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = (int)$_GET['id'];
        $videos = Painel::select('tb_site_slides','id = ?', array($id));
    }else{
        Painel::alert('erro','Voceê precisa passa o parametro ID.');
        die();
    }
        ?>
<div class="box-content">

    <h2>Editar slide</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                //envie formulário
                if($_POST["titulo_slide"] != "" && $_POST['codigo_slide'] != "" && $_POST['descricao'] != ""){
                            Painel::update($_POST);
                            $videos = Painel::select('tb_site_slides','id = ?', array($id));
                            Painel::alert("sucesso", "O slide foi atualizado com sucesso!");
                }else{
                    Painel::alert("erro","Campos vazios não são permitidos!");
                }
            }

            
        ?>
        <div class="form-group">
            <label for="titulo">Título do slide:</label>
            <input type="text" name="titulo_slide" id="titulo" value="<?php echo $videos['titulo_slide'];?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="">Descrição:</label>
            <textarea name="descricao"><?php echo $videos['descricao']; ?></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label for="">Código de incorporaçao:</label>
            <textarea name="codigo_slide"><?php echo $videos['codigo_slide']; ?></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_slides">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>
</div>