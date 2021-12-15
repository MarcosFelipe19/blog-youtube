<div class="box-content">

    <h2>Cadastrar posts</h2>

    <form method="post" enctype="multipart/form-data">
        <?php 
        ?>
        <?php
            if(isset($_POST['acao'])){
                //envie formulário
                if($_FILES['imagem_principal']['name'] != "" && $_FILES['imagem_sub0']['name'] != ""){
                    $certo = true;
                    $post1;
                    $post2;
                    $i = 0;
                   foreach ($_FILES as $key => $value) {
                     if($_FILES[$key]['name'] == ""){
                            Painel::alert('erro',"insira todas as imagens");
                            $certo = false;
                            break;
                        }else if(Painel::imagemValida($_FILES[$key],1000)){
                                    if($key == 'imagem_principal'){
                                        $post1['titulo'] = $_POST['titulo']; 
                                        $post1['descricao'] = $_POST['descricao']; 
                                        $post1['nome_tabela'] = $_POST['nome_tabela']; 
                                        $post1['imagem'] = $_FILES['imagem_principal'];
                                        unset($_POST['titulo']); 
                                        unset($_POST['descricao']); 
                                        unset($_POST['nome_tabela']);  
                                    }
                        }else{
                            Painel::alert('Erro','A formato ou tamanho de uma imagem não é válido. tamanho máximo 1MB');
                            $certo = false;
                            break;
                        }
                   }
                   if($certo == true){
                        $post1['imagem'] = Painel::uploadFile($_FILES['imagem_principal']);
                        unset($_FILES['imagem_principal']);
                        $post2['nome_tabela'] = $_POST['nome_table'];
                     if(Painel::insert($post1)){
                        $select = MySql::conectar()->prepare("SELECT * FROM `tb_site_posts` ORDER BY id DESC LIMIT 1");
                        $select->execute();
                        $id = $select->fetch();
                        foreach ($_FILES as $key => $value) {
                                    $imagem_sub[$key] = Painel::uploadFile($_FILES[$key]);
                                    $post2['titulo'] = $_POST["sub_titulo".$i];
                                    $post2['descricao'] = $_POST['sub_descricao'.$i];
                                    $post2['id_post'] = (int)$id['id'];
                                    $post2['imagem_sub'] = $imagem_sub[$key];
                                    $i++;
                                    if(Painel::insert($post2)){
                                        
                                    }else{
                                        $id = $post2['id_post'];
                                        Painel::delete($post1['imagem']);
                                        foreach ($imagens_sub as $key => $value) {
                                            Painel::delete($imagem_sub[$key]);   
                                        }
                                        $deletar = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id_post = $id");
                                        $deletar->execute();
                                        Painel::deletar("tb_site_posts",$id);
                                        Painel::alert("erro","Campos vazios não são permitidos!");
                                        $certo = false;
                                        break;
                                    }
                                }/*foreach*/ 
                            }else{
                                Painel::alert("erro","Campos vazios não são permitidos!");
                                $certo = false;
                            }
                     }
                     if($certo){
                        Painel::alert("sucesso","Cadastro do post foi feito com sucesso!");
                     }
                }else{
                    Painel::alert("erro","Campos vazios não são permitidos!");
                }

            }                   
            

            
        ?>
        <div class="form-group">
            <label for="titulo">Título do post:</label>
            <input type="text" name="titulo" id="titulo" >
        </div><!--form-group-->

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao"></textarea>
        </div><!--form-group-->

        <div class="form-group">
                    <label>Imagem:</label>
                    <input type="file" name="imagem_principal">
        </div><!--form-group-->

        <div class="container-subs">
            <h2>Mais sobre o post</h2>
                <h2>Sub post</h2>
                <div class="form-group">
                    <label for="sub_titulo">Sub título:</label>
                    <input type="text" name="sub_titulo0" >
                </div><!--form-group-->

                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="sub_descricao0"></textarea>
                </div><!--form-group--> 

                <div class="form-group">
                    <label>Imagem:</label>
                    <input type="file" name="imagem_sub0">
                </div><!--form-group-->
        </div><!--container-subs-->

        <div class="form-group">
                <label>Quatidade de sub campos:</label>
                <input type="text" id="qtd_campos" name="sub_campos" placeholder="Digite a quatidade sub campos que deseja cadastrar">
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="nome_table" value="tb_site_posts_indi">
            <input type="button"  value="Cadastrar Mais">
        </div><!--form-group-->
        
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_posts">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    </form>
</div>