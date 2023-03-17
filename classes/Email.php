<?php 
    namespace Classes;

    use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\SMTP;

    
    

    class Email {

      private $mailer;
        
      public function __construct($host,$username,$senha,$name)
       {
                 $this->mailer = new PHPMailer(true);
            
                 //$this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;                      
                 $this->mailer->isSMTP();                                       
                 $this->mailer->Host       = $host;                   
                 $this->mailer->SMTPAuth   = true;                                 
                 $this->mailer->Username   = $username;                        
                 $this->mailer->Password   = $senha;                              
                 $this->mailer->CharSet    = 'UTF-8';
                 $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                 $this->mailer->Port       = 465;  
                 $this->mailer->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
                // $mail->addStringAttachment('qualqueraruivo',  'documento.pdf');
                $this->mailer->setFrom($username, $name);
                
                $this->mailer->isHTML(true);
        }


       
 
        public function addAddress($email,$nome) {
            $this->mailer->addAddress($email, $nome);                         
        }


        public function formatarEmail($info) {
                $this->mailer->Subject = $info['assunto'];
                $this->mailer->Body = $info['corpo'];
                $this->mailer->AltBody = strip_tags($info['corpo']);
        }

        public function enviarEmail() {
            if($this->mailer->send()){
                return true;
            } else {
                return false;
            }
        }
    }
?>