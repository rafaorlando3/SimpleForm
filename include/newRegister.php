<?php
date_default_timezone_set('America/Sao_Paulo');
include_once 'class/SimpleForm.class.php';
include_once 'class/Upload.class.php';
include_once '../config/config.php';

if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['telefone'])  && !empty($_POST['mensagem']) && !empty($_FILES['anexo']['name'])) {
    
    global $link, $configEmail;
    $upload = new Upload();
    $upload->setAllowedExtensions(array('odt', 'pdf', 'txt', 'doc', 'docx'));
    $upload->setRandomName(true);
    $upload->setMaxSize(0.5);
    $upload->setUploadDir('../uploads/');
    $upload->uploadFile($_FILES['anexo']);
    $path_file = '../uploads/'.$upload->getFileName();
    
    if (!empty($upload->getFileName())) {
        $objSimpleForm = new SimpleForm();
        $objSimpleForm->nome = mysqli_real_escape_string($link, $_POST["nome"]);
        $objSimpleForm->email = base64_encode(mysqli_real_escape_string($link, $_POST["email"]));
        $objSimpleForm->telefone = base64_encode(mysqli_real_escape_string($link, $_POST["telefone"]));
        $objSimpleForm->mensagem = mysqli_real_escape_string($link, $_POST["mensagem"]);
        $objSimpleForm->anexo = base64_encode('uploads/'.$upload->getFileName());
        $objSimpleForm->data = date("Y-m-d H:i:s");
        $objSimpleForm->ip = $objSimpleForm->getIP();
        $objSimpleForm->inserir();

        if (!empty($configEmail)) {
            include_once 'phpmailer/src/PHPMailer.php';
            include_once 'PHPMailer/src/SMTP.php';
            include_once "PHPMailer/src/Exception.php";

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; // or 587
            $mail->IsHTML(true);
            $mail->Username = "odinbrs3@gmail.com";
            $mail->Password = "odin2255";
            $mail->SetFrom("odinbrs3@gmail.com");
            $mail->CharSet = 'UTF-8';
            $mail->Subject = "Nova mensagem enviada do FormSimple - Netshow.me";
            $mail->Body = "<b>Nome: </b> ".$_POST["nome"]." <br/>"
                         ."<b>Email: </b> ".$_POST["email"]." <br/>"
                         ."<b>Telefone: </b> ".$_POST["telefone"]." <br/>"
                         ."<b>IP: </b> ".$objSimpleForm->getIP()." <br/>"
                         ."<b>Data: </b> ".date("d/m/Y", strtotime(date("Y-m-d")))." <br/>"
                         ."<b>Hora: </b> ".date("H:i")." <br/>"
                         ."<b>Mensagem: </b>".$_POST["mensagem"];
            $mail->AddAttachment($path_file);
            $mail->AddAddress($configEmail);
                if(!$mail->Send()) {
                    echo '<div class="alert alert-warning" role="alert">
                            Cadastrado realizado na base, porém não foi possivel enviar o e-mail. Verifique as configurações de SMTP.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                   
                } else {
                   echo '<div class="alert alert-success" role="alert">
                            Cadastrado e envio de email realizado com sucesso.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                }

        } else {
            echo '<div class="alert alert-warning" role="alert">
                            O registro foi inserido na base porém não há e-mail configurado para envio. Verifique o arquivo config.php.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                  </div>';
        }


    } else {
        echo '<div class="alert alert-danger" role="alert">
            O upload do arquivo falhou, verifique a extensão, tamanho ou tente mais tarde.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
    
} else {
   echo '<div class="alert alert-danger" role="alert">
            Verifique se você preencheu corretamente os campos obrigatórios.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>'; 
}


    
    
