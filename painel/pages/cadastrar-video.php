<div class="box-content">

    <h2>Cadastrar vídeos</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
            if(isset($_POST['acao'])){
                //envie formulário
                $imagem = $_FILES['imagem'];
                if($imagem['name'] != ""){
                    
                    if(Painel::imagemValida($imagem,1000)){   
                        $imagem = Painel::uploadFile($imagem);
                         $_POST['imagem'] = $imagem;
                         if(Painel::insert($_POST)){
                            Painel::alert("sucesso","O cadastro do vídeo foi feito com sucesso!");
                        }
                        else{
                            Painel::alert("erro","Campos vazios não são permitidos!");
                        }
                    }else{
                            Painel::alert('Erro','A imagem não é válida');
                    }
                    
                }else{
                    Painel::alert('erro',"insira uma imagem");
                }
            }

            
        ?>
        <div class="form-group">
            <label for="titulo">Título do vídeo:</label>
            <input type="text" name="titulo" id="titulo" >
        </div><!--form-group-->
        
        <div class="form-group">
            <label for="nome">Código de incorporaçao:</label>
            <textarea name="codigos"></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label for="descricao">descricao:</label>
            <textarea name="descricao"></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem">
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_videos">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    </form>
</div>