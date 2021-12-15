<section class="registre">
<div class="center">
        <form method="post">
            <h1>Inscreva-se</h1>
        <div class="input">
            <p class="rotulo">Nome:</p>
            <input type="text" name="nome" placeholder="Nome">
        </div><!--input-->

        <div class="input">
            <p class="rotulo">Sobrenome:</p>
            <input type="text" name="nome" placeholder="Sobrenome"require>
        </div><!--input-->

        <div class="input">
            <p class="rotulo">E-mail:</p>
            <input type="email" name="email" placeholder="E-mail"require>
        </div><!--input-->

        <div class="input">
            <p class="rotulo">Senha:</p>
            <input type="text" name="senha" placeholder="Senha" require>
        </div><!--input-->

        <div class="input">
            <p class="rotulo">Confirme senha:</p>
            <input type="text" name="senha" placeholder="Senha" require>
        </div><!--input-->

        <div class="input">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--input-->

        <input type="hidden" name="identificador" value="form_registre">
        </form>
    </div><!--cenrer-->
    <?php
        if(isset($_POST['acao']) && $_POST['identificador']=="form_registre"){
            
            if($_POST['email'] != ''){
                $email = $_POST['email'];
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    //tudo certo
                    $mail = new Email('smtp.hostinger.com','teste_email@marcosfelipeportfolio.com.br','Mfmm@2021','Marcos');
                    $mail->addAddress($email,'Marcos');
                    $info = array("assunto"=>"Um novo email cadastrado no site","corpo"=>$email);
                    $mail->formatarEmail($info);
                    if($mail->enviarEmail()){
                        echo '<script>alert("Cadastrado com sucesso")</script>';
                    }else{
                        echo '<script>alert("Algo deu errado")</script>';
                    }
                }else{
                    echo '<script>alert("Não é um email válido")</script>';
                }   
            }else{
                echo '<script>alert("Campos vazios não são permtidos")</script>';
            }
        }
        ?>
</section>