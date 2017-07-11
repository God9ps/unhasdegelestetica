<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

/*require 'PHPMailerAutoload.php';*/
require 'phpmailer/class.phpmailer.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
$mail->isHTML();
//Set who the message is to be sent from
$mail->setFrom($_POST['email'], $_POST['nome']);
//Set an alternative reply-to address
$mail->addAddress('ana.s.m.garcia.83@gmail.com', 'Ana Garcia');
$mail->addAddress('kellycristinaxx@gmail.com', 'Kelly Silva');
//Set who the message is to be sent to
$mail->addReplyTo('pauloamserrano@gmail.com', 'Paulo Serrano');
//Set the subject line
$mail->Subject = 'Pedido de contacto através do website';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

$telefone = $_POST['telefone'];
$descricao = 'Entrou em contacto o(a) Sr(a). ' . $_POST['nome'] . ' com o telefone ' . $_POST['telefone'] . '<br>';
$descricao .= 'Mensagem : <br>';
$descricao .= $_POST['mensagem'];
$mail->Body = $descricao;
/*$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));*/
//Replace the plain text body with one created manually
$mail->AltBody = $descricao;
//Attach an image file
/*$mail->addAttachment('images/phpmailer_mini.png');*/

//send the message, check for errors
if (!$mail->send()) {
    $jsonResponse = array('status'=>$mail->ErrorInfo);
    echo json_encode($jsonResponse);
} else {
    $jsonResponse = array('status'=>true);
    echo json_encode($jsonResponse);
}
