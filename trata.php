<?php

if (isset ($_POST ['acao'])) {
    $acao = $_POST ['acao'];
    include_once 'plugins/Alerta.class.php';

    $rsEmail = new Alerta();

    switch ($acao) {

        case 'sendmail':

// Multiple recipients
            $to = 'ana.s.m.garcia.83@gmail.com, kellycristinaxx@gmail.com'; // note the comma

// Subject
            $subject = 'Pedido de contacto em unhasdegelestetica.pt';

// Message
            $message = '
<html>
<head>
  <title>Formulário de contacto do website</title>
</head>
<body>
  <p>Pedido de contacto!</p>
  <table width="90%">
    <tr>
      <th>De</th>
      <th>Data</th>
      <th>Telefone</th>
      <th>Email</th>
    </tr>
    <tr>
      <td align="center">' . $_POST["nome"] . '</td><td align="center">' . date('Y-m-d') . '</td><td align="center">' . $_POST["telefone"] . '</td><td align="center">' . $_POST["email"] . '</td>
    </tr>
    <tr>
      <td align="justify" colspan="4">
      <table width="100%">
        <tr>
          <td align="justify">
          ' . $_POST["mensagem"] . '
          </td>
        </tr>
  </table>
      </td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
            $headers[] = 'To: Ana <ana.s.m.garcia.83@gmail.com>, Kelly <kellycristinaxx@gmail.com>';
            $headers[] = 'From: '.$_POST["nome"].' <'.$_POST["email"].'>';
           $headers[] = 'Cc: pauloamserrano@gmail.com';
          /*   /*$headers[] = 'Bcc: birthdaycheck@example.com';*/

// Mail it
            mail($to, $subject, $message, implode("\r\n", $headers));


            /* $jsonResponse = array();
            $emailPara = 'ana.s.m.sofia.83@gmail.com';
            $nomePara = 'Unhas de Gel e Estética';
            $assunto = "Contacto via website";
            $emailDe = $_POST['email'];
            $nomeDe = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $descricao = 'Entrou em contacto o(a) Sr(a). ' . $nomeDe . ' com o telefone ' . $telefone . '<br>';
            $descricao .= 'Mensagem : <br>';
            $descricao .= $_POST['mensagem'];
            $enviado = $rsEmail->enviarEmail($telefone, $descricao, $emailDe, $nomeDe, $emailPara, $nomePara);
            $jsonResponse = array('status' => $enviado);*/
            $jsonResponse = array('status' => true);
            echo json_encode($jsonResponse);

            break;
    }
}


