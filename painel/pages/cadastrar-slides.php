<div class="box-content">

    <h2>Cadastrar slides</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
            if(isset($_POST['acao'])){

                //envie formulário

                if(Painel::insert($_POST)){
                    Painel::alert("sucesso","O cadastro do post foi feito com sucesso!");
                    }
                else{
                    Painel::alert("erro","Campos vazios não são permitidos!");
                }
            }

            
        ?>
        <div class="form-group">
            <label for="titulo">Título do slide:</label>
            <input type="text" name="titulo" id="titulo">
        </div><!--form-group-->

        <div class="form-group">
            <label for="nome">Descrição:</label>
            <textarea name="descricao"></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label for="">código de incorporação:</label>
            <textarea name="codigos"></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_slides">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    </form>
</div>