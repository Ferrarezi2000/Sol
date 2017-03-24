<?php
header('Content-Type: text/html; charset=UTF-8');

$nome = utf8_decode($_POST["nome"]);
$nome_alerta = $_POST["nome"];
$sobrenome = utf8_decode($_POST["sobrenome"]);
$email = $_POST["email"];
$mensagem = utf8_decode($_POST["mensagem"]);

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();

$mail->isSMTP();
$mail->SetLanguage("br", "language/");
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "standbyinf@gmail.com";
$mail->Password = "ferrarezi2000";

$mail->setFrom("soldouradojf@soldouradojf.com.br", "Site Sol Dourado");
$mail->addAddress("soldouradojf@soldouradojf.com.br");
$mail->Subject = "Email de contato do site Sol Dourado";

$mail->msgHTML("<html>Nome: {$nome}<br/>Sobrenome: {$sobrenome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}</html>");
$mail->AltBody = "Nome: {$nome}\n Sobrenome: {$sobrenome}\n Email:{$email}\n\n Mensagem: {$mensagem}";

if($mail->send()) {
	//echo"<script type='text/javascript'>";
	//echo "alert('Mensagem enviada com sucesso...');";
	//header("Location: index.html");
	//echo "</script>";
	echo "<script>window.location='index.html';alert('$nome_alerta, sua mensagem foi enviada com sucesso!');</script>";
	//"Mensagem enviada com sucesso";
	
} else {
	//echo"<script type='text/javascript'>";
	//echo "alert('Erro ao enviar mensagem, tente novamente mais tarde...');";
	//echo "</script>";
    //"Erro ao enviar mensagem " . $mail->ErrorInfo;
   //header("Location: contato.html");
	echo "<script>window.location='contato.html';alert('$nome_alerta, sua mensagem não foi enviada... Tente novamente mais tarde!');</script>";
}
die();