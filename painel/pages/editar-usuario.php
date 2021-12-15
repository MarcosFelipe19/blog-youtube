<div class="box-content">

    <h2>Editar usuário</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                //envie formulário

                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];


                if($imagem['name'] != ''){
                    //existe upload de imagem.
                    if(Painel::imagemValida($imagem,600)){
                      
                        Painel::delete($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        if(Usuario::atualizarUsuario($nome,$senha,$imagem)){
                            $_SESSION['img'] = $imagem;
                            Painel::alert('sucesso','Atualiizado com sucesso junto com a imagem!');
                        }else{
                            Painel::alert('Erro','Ocorreu um Erro junto com a imagem!');  
                        }
                    }else{
                        Painel::alert('Erro','Imagem não é válida'); 
                    }
                }else{
                    $imagem = $imagem_atual;
                    if(Usuario::atualizarUsuario($nome,$senha,$imagem)){
                        Painel::alert('sucesso','Atualiizado com sucesso!');
                        
                    }else{
                        Painel::alert('Erro','Ocorreu um Erro!');
                    }
                }
               
            }
            
        ?>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $_SESSION['nome'];?>" required>
        </div><!--form-group-->

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" value="<?php echo $_SESSION['senha'];?>"required>
        </div><!--form-group-->

        <div class="form-group">
            <label for="nome">Imagem:</label>
            <input type="file" name="imagem" id="imagem" >
            <input type="hidden" name="imagem_atual"  value="<?php echo $_SESSION['img'];?>">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>
</div>