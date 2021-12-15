<section class="contato">
    <form class="center" method="post">
        <h2>Contato</h2>
        <div class="input">
            <p class="rotulo">Nome:</p>
            <input type="text" name="nome" placeholder="Nome">
        </div>

        <div class="input">
            <p class="rotulo">E-mail:</p>
            <input type="email" name="email" placeholder="email">
        </div>

        <div class="input">
            <p class="rotulo">Mensagem:</p>
            <textarea name="mensagem" placeholder="Deixe sua mensagem"></textarea>
        </div>
        <div class="input">
            <input type="submit" name="acao" value='Enviar' >
        </div>
        <input type="hidden" name="identificador" value="form_contato">
    </form>
    <?php
    if(isset($_POST['acao']) && $_POST["identificador"]=="form_contato"){

            if($_POST['email'] != '' && $_POST['nome'] != '' && $_POST['mensagem'] != ''){
                $email = $_POST['email'];
                $nome = $_POST['nome'];
                $mensagem = $_POST['mensagem'];
                if(filter_var(  $email, FILTER_VALIDATE_EMAIL)){
                    //tudo certo
                   $mail = new Email('smtp.hostinger.com','teste_email@marcosfelipeportfolio.com.br','Mfmm@2021','Marcos'); 
                    $mail->addAddress("mmuramota1@gmail.com","Marcos");
                    $corpo = "<b>Mensagem de: ".$nome."</b><br><b>E-mail: ".$email."</b><hr><p>".$mensagem."</p>"; 
                    $info = array("assunto"=>"Nova mensagem do site","corpo"=>$corpo);
                    $mail->formatarEmail($info);
                    if($mail->enviarEmail()){
                        echo '<script>alert("Menagem enviada")</script>';
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