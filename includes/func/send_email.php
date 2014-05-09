<?php

//error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mens = "<font face='Calibri, Calibri Regular, Arial' size='4'>";
$mens .= "<b>Formulario Site Munchen Esquadrias </b><br><br>";
$mens .= "---------------------------------------------<br>";
$mens .= "Nome: $name <br>";
$mens .= "E-mail: $email <br>";
$mens .= "Telefone: $phone <br>";
$mens .= "Assunto: $subject <br>";
$mens .= "Mensagem: $message <br>";
$mens .= "---------------------------------------------<br><br><br>";
$mens .= "Enviada em ".date("d/m/Y"). "<br>";
$mens .= "</font>";

// Monta o cabecalho
$headers = "From: <$email>\n";
$headers .= "X-Sender: <$email>\n";
$headers .= "Content-Type: text/html; charset=utf-8";

require_once("../helpers/class.phpmailer/class.phpmailer.php");
// Instanciamos a classe
$mail = new PHPMailer();

// Setar para classe que ira usar SMTP
$mail->isSMTP();

// Host do Servidor SMTP, no caso uso o GMAIL
$mail->Host = "smtp.gmail.com";

// NIVEL DE DEBUG 1 = Erros e mensagens || 2 = Mensagens
$mail->SMTPDebug  = 2;

// Ativa autenticacao SMTP
$mail->SMTPAuth = true;

// Seta o prefixo para o servidor SMTP
$mail->SMTPSecure = "ssl";

// SETA CONFIGURACOES DO GMAIL
$mail->Host = "smtp.gmail.com";
$mail->Port     = 465; // PORTA DO SERVIDOR SMTP GMAIL = 465
$mail->Username = "julio.fg1986@gmail.com"; // USUARIO DO GMAIL
$mail->Password = "gigolo123"; // SENHA DO GMAIL

$mail->SetFrom($email, $name); // REMETENTE DO EMAIL (email, nome)
$mail->AddReplyTo($email, $name); // ENDERECO PARA RESPOSTA (email, nome)

// Assunto e Conteudo do email
$mail->Subject  = "Contato pelo Site Esquadrias Munchen";
$mail->AltBody = "Pra visualizar este e-mail voce precisar utilizar um programa que suporte HTML.";
$mail->MsgHTML($mens);


// USUARIO QUE IRA RECEBER O EMAIL
$mail->AddAddress("julio.fg@live.de", "Jx - Julio Griebeler");
//$mail->AddAddress("munchenesquadrias@gmail.com", "Esquadrias Munchen");

// Envia o e-mail
if(!$mail->Send()) {
	//echo "Mailer Error: " . $mail->ErrorInfo;
	header("location: http://esquadriasmunchen.com/contato/&er");
} else {
	header("location: http://esquadriasmunchen.com/contato/&ok");
	//echo "Mensagem Enviada!";
}


