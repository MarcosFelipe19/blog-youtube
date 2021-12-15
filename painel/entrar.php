<?php
    if(isset($_COOKIE['lembrar'])){
        $email = $_COOKIE['email'];
        $senha = $_COOKIE['senha'];
        $sql =  MySql::conectar()->prepare("SELECT * FROM tb_admin_users  WHERE email= ? AND senha = ?");
        $sql->execute(array($email,$senha));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['img'] = $info['img'];
            header('Location:'.INCLUDE_PATH_PAINEL);
            die();
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Marcos Felipe Moura Mota">
    <meta name="Keywords" content="palavras,separadas,por,vírgula">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="blog de vídeos do youtube">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
    <title>UVN</title>
</head>
<body>
<section class="entrar">
    <div class="center">
        <form method="post">
            <div class="container-form">
                 <?php 
                    if(isset($_POST['acao'])){
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $sql =  MySql::conectar()->prepare("SELECT * FROM `tb_admin_users`  WHERE email= ? AND senha = ?");
                        $sql->execute(array($email,$senha));
                        if($sql->rowCount() == 1){
                            $info = $sql->fetch();
                            $_SESSION['login'] = true;
                            $_SESSION['email'] = $email;
                            $_SESSION['senha'] = $senha;
                            $_SESSION['nome'] = $info['nome'];
                            $_SESSION['cargo'] = $info['cargo'];
                            $_SESSION['img'] = $info['img'];
                            if(isset($_POST['lembrar'])){
                              setcookie('lembrar',true,time()+(60*60*24),'/');
                              setcookie('email',$email,time()+(60*60*24),'/');
                              setcookie('senha',$senha,time()+(60*60*24),'/');
                            }
                            header('Location:'.INCLUDE_PATH_PAINEL);
                            die();
                        }else{
                            echo "E-mail ou senha incorreto";
                        }
                    }     
                  ?> 
                 <div class="input">
                    <p class="rotulo">E-mail:</p>
                    <input type="email" name="email" placeholder="Digite E-mail" required>
                </div><!--input-->

                <div class="input">
                    <p class="rotulo">Senha:</p>
                    <input type="text" name="senha" placeholder="Digite Senha" required>
                </div><!--input-->

                <div class="input-login left" >
                      <input type="submit" name="acao" value="Entrar">
                </div><!--input-->

                <div class="input-login right">
                        <p>lembrar-me</p>
                        <input type="checkbox" name="lembrar">
                </div><!--input-->
            </div><!--container-form-->
        </form>
    </div><!--center-->
</section>
</body>
</html>