<?php

/*Permissoes para a api responder em um servidor Local.*/ 
header('Acess-Control-Allow-Origin: *');
header('Acess-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS');
header('Acess-Control-Allow-Header: Content-Type');
header('Content-Type:application/json');

//Import do Arquivo de API de CLientes


//Cria um array com base na URL até a pasta API
//guarda no indice 0 a primeira palavra após a "/"
$url = (string) null;

$url = explode('/',$_GET['url']);

//Estrutura condicional para encaminhar a API
//Conforme a escolha []
switch ($url[0])
{
    case 'clientes':
        require_once ("clientesAPI/index.php");
        break;

    case 'estados':
        require_once ("estadosAPI/index.php");
        break;
}









?>