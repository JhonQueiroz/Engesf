<?php
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $telefone=$_POST['telefone'];
    $msg=$_POST['mensagem'];
    $mensagem= 'Esta mensagem foi enviada através do Site<br><br>';
    $mensagem.='<b>Nome: </b>'.$nome.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    $mensagem.='<b>Telefone:</b> '.$telefone.'<br>';
    $mensagem.='<b>Mensagem:</b><br> '.$msg;

    require("phpmailer/src/PHPMailer.php");
    require("phpmailer/src/SMTP.php");
    require ("phpmailer/src/Exception.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP(); // Não modifique
    $mail->Host       = 'engesf.com';  // SEU HOST (HOSPEDAGEM)
    $mail->SMTPAuth   = true;                        // Manter em true
    $mail->Username   = 'geraldo@engesf.com';   //SEU USUÁRIO DE EMAIL
    $mail->Password   = 'engesf@geraldo';                   //SUA SENHA DO EMAIL SMTP password
    $mail->SMTPSecure = 'ssl';    //TLS OU SSL-VERIFICAR COM A HOSPEDAGEM
    $mail->Port       = 465;     //TCP PORT, VERIFICAR COM A HOSPEDAGEM
    $mail->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO
    
    //Recipients
    $mail->setFrom('geraldo@engesf.com', 'Contato Engesf');  //DEVE SER O MESMO EMAIL DO USERNAME
    $mail->addAddress('geraldo@engesf.com');     // QUAL EMAIL RECEBERÁ A MENSAGEM!
    $mail->addReplyTo($email, $nome);  //AQUI SERA O EMAIL PARA O QUAL SERA RESPONDIDO                  

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensagem do Formulário'; //ASSUNTO
    $mail->Body    = $mensagem;  //CORPO DA MENSAGEM
    $mail->AltBody = $mensagem;  //CORPO DA MENSAGEM EM FORMA ALT

    // $mail->send();
    if(!$mail->Send()) {
        echo "<script>alert('Erro ao enviar o E-Mail');window.location.assign('contato.html');</script>";
     }else{
        echo "<script>alert('Agradecemos pelo contato!');window.location.assign('contato.html');</script>";
     }
     die
?>