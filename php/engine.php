<?php
	include('config_email.php');


	session_start();

		$nome 		= 	$_POST['nome'];
		$email 		= 	$_POST['email'];
		$oggetto 	= 	$_POST['oggetto'];
		$messaggio 	= 	$_POST['messaggio'];
		$ip			=	$_SERVER['REMOTE_ADDR'];


	if($_POST['fred'] != "") {
		echo('<p style="color: #000; font-size: 25px; font-weight: bold;">Sei uno spambot o stai usando tecniche di spam indesiderate, spiancenti ma ci siamo attrezzati. La mail non e stata inviata</p>');
	}

	else {


$to 		= $tua_email;
$sbj 		= "Richiesta Informazioni - $sito_internet";
$msg 		= "
<html>
<head>
<style type='text/css'>
body{
	font-family:'Lucida Grande', Arial;
	color:#333;
	font-size:15px;
}
</style>
</head>
<body>
<table width='600' border='0' cellspacing='0' cellpadding='5'>
  <tr>
    <td width='121' align='right' valign='baseline'><strong>Nome:</strong></td>
    <td width='459'>$nome</td>
  </tr>


  <tr>
    <td align='right' valign='baseline'><strong>Email:</strong></td>
    <td>$email</td>
  </tr>

  <tr>
    <td width='121' align='right' valign='baseline'><strong>Oggetto:</strong></td>
    <td width='459'>$oggetto</td>
  </tr>


  <tr>
    <td align='right' valign='baseline'><strong>Richiesta:</strong></td>
    <td>$messaggio</td>
  </tr>


    <tr>
    <td align='right' valign='baseline'><strong>IP Tracciato (per motivi di sicurezza):</strong></td>
    <td>$ip</td>
  </tr>

   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

    <tr>
    <td>&nbsp;</td>
    <td><small>Powered by Targetweb.it | &copy; Copyright 2012 Riccardo Mel</small></td>
  </tr>

</table>
</body>
</html>
";

$from 		 = $email;
$headers	 = 'MIME-Version: 1.0' . "\n";
$headers	.= 'Content-type: text/html; charset=iso-8859-1' . "\n"; //In certi casi con aruba se non viene formattata eliminare il \r per i permessi come ho fatto in questo caso
$headers 	.= "From: $from";


mail($to,$sbj,$msg,$headers); //Invio mail principale.


$toClient		 = $email;
$msgClient		 = "
<html>
<head>
<style type='text/css'>
body{
	font-family:'Lucida Grande', Arial;
	color:#333;
	font-size:15px;
}
</style>
</head>
<body>

<h1>Tuosito</h1>
<br />

<h2>Grazie, $nome</h2>
<br />

  <p>Grazie per averci contattato, $nome</p>
  <p>Abbiamo ricevuto la tua mail e ti ricontattermo prima possibile.</p>


  <br />
  <hr>

   <p>Thanks for contact us, $nome</p>
    <p>We received your email. We respond as soon as possible.</p>

</body>
</html>
";
$fromClient 	 = $tua_email;
$sbjClient		 = "Grazie, $nome ";
$headersClient	 = 'MIME-Version: 1.0' . "\r\n";
$headersClient	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headersClient 	.= "From: $fromClient";

mail($toClient,$sbjClient,$msgClient,$headersClient); //mail inviata al cliente


session_destroy();

exit;

} 

?>
