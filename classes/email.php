<?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
class Email 
{
    private $mailer;
    public function __construct($host,$userName,$password,$name) {

        //Load Composer's autoloader
        
        //Create an instance; passing `true` enables exceptions
            $this->mailer = new PHPMailer(true);
     
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->mailer->isSMTP();                                            //Send using SMTP
            $this->mailer->Host       = $host;                   //Set the SMTP server to send through
            $this->mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mailer->Username   = $userName;                     //SMTP username
            $this->mailer->Password   = $password;                               //SMTP password
            $this->mailer->SMTPSecure =  'ssl';            //Enable implicit TLS encryption
            $this->mailer->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $this->mailer->setFrom($userName,$name);         
            //Content
            $this->mailer->isHTML(true);                                  //Set email format to HTML
        
    }
    public function addAddress($email,$nome){
        $this->mailer->addAddress($email,$nome);
    }
    public function enviarEmail(){
        if($this->mailer->send()){
            return true;
        }else{
            return false;
        }
    }
    public function formatarEmail($info){
        $this->mailer->Subject = $info["assunto"];
        $this->mailer->Body    = $info["corpo"];
        $this->mailer->AltBody = strip_tags($info["corpo"]);
    }

};


?>