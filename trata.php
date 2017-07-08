<?php

if (isset ($_POST ['acao'])) {
    $acao = $_POST ['acao'];
    include_once 'plugins/Alerta.class.php';

    $rsEmail = new Alerta();

    switch ($acao) {

        case 'sendmail':

            $jsonResponse = array();
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
            $jsonResponse = array('status' => $enviado);
            echo json_encode($jsonResponse);

            break;
    }
}


