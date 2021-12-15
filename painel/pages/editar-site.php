<div class="box-content">

    <h2>Editar site</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                //envie formulário
                if($_POST["titulo_site"] == "" ){
                    unset($_POST['titulo_site']);
                }
                if($_POST["titulo_1"] == "" ){
                    unset($_POST['titulo_1']);
                }
                if($_POST["titulo_2"] == "" ){
                    unset($_POST['titulo_2']);
                }
                if($_POST["descricao_1"] == "" ){
                    unset($_POST['descricao_1']);
                }
                if($_POST["descricao_2"] == "" ){
                    unset($_POST['descricao_2']);
                }
                if($_POST["link_you"] == "" ){
                    unset($_POST['']);
                }
                if($_POST["link_face"] == "" ){
                    unset($_POST['link_face']);
                }
                if($_POST["link_insta"] == "" ){
                    unset($_POST['link_insta']);
                }
                $_POST['id'] = 1;
                Painel::update($_POST);
                Painel::alert('sucesso','site editado com sucesso');

            }

            
        ?>
        <div class="form-group">
            <label for="titulo_site">Título site:</label>
            <input type="text" name="titulo_site" id="titulo_site">
        </div><!--form-group-->

        <div class="form-group">
            <label for="titulo_1">Título informação 1:</label>
            <input type="text" name="titulo_1" id="titulo_1">
        </div><!--form-group-->

        <div class="form-group">
            <label for="descricao_1">Descrição informação 1:</label>
            <textarea name="descricao_1"></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label for="titulo_2">Título informação 2:</label>
            <input type="text" name="titulo_2" id="titulo_2">
        </div><!--form-group-->

        <div class="form-group">
            <label for="descricao_2">Descrição informação 2:</label>
            <textarea name="descricao_2"></textarea>
        </div><!--form-group-->

        
        <div class="form-group">
            <label>Insira um link para youtube:</label>
            <input type="text" name="link_you">
        </div><!--form-group-->

        
        <div class="form-group">
            <label >Insira um link para o facebook:</label>
            <input type="text" name="link_face">
        </div><!--form-group-->

        
        <div class="form-group">
            <label>Insira um link para o instagram:</label>
            <input type="text" name="link_insta">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
            <input type="hidden" name="nome_tabela" value="tb_admin_config">
        </div><!--form-group-->
    </form>
</div>