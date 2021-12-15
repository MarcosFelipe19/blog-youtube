<?php  
    verificaPermicaoPagina(1);
?> 
<div class="box-content">

    <h2>Adcionar usuário</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                //envie formulário
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $cargo = $_POST['cargo'];
                $email = $_POST['email'];
                $imagem = $_FILES['imagem'];

                if($nome == ''){
                    Painel::alert('erro','O nome está vazio');
                }else if($senha ==''){
                    Painel::alert('erro','A senha está vazia');
                }else if($email == ''){
                    Painel::alert('erro','O email está vazio');
                }else if($cargo == ''){
                    Painel::alert('erro','selecione um cargo');
                }else {
                    if($cargo >= $_SESSION['cargo']){
                        Painel::alert('erro','Você precisa selecionar um cargo menor que o seu');
                    }else if(Usuario::userExists($email)){
                        Painel::alert('erro','Este e-mail já está cadastrado!');
                    }else{
                        //cadastrar banco de dados
                        if($imagem['name'] != ''){
                            if(Painel::imagemValida($imagem,600)){
                                $imagem = Painel::uploadFile($imagem);
                                usuario::cadastrarUsuario($nome,$email,$senha,$cargo,$imagem);
                                Painel::alert('sucesso','Usuário '.$nome.' cadastrado com sucesso');
                            }else{
                                Painel::alert('Erro','Imagem não é válida'); 
                            }
                        }else{
                            $imagem = "";
                            usuario::cadastrarUsuario($nome,$email,$senha,$cargo,$imagem);
                            Painel::alert('sucesso','Usuário '.$nome.' cadastrado com sucesso');
                        }
                        
                    }
                }

            }

            
        ?>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" >
        </div><!--form-group-->

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div><!--form-group-->

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </div><!--form-group-->

        
        <div class="form-group">
            <label for="senha">Cargo:</label>
                <select name="cargo">
                <?php 
                    foreach (Painel::$cargo as $key => $value) {
                      if($key < $_SESSION['cargo'])  echo   '<option value="'.$key.'">'.$value.'</option>';
                    }
                 ?> 
                </select>
        </div><!--form-group-->

        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>
</div>