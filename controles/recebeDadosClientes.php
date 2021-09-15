<?php

/***********************************************************************************
 Objetivo: Receber , tratar e validar os dados de Clientes.
 Data:15/02/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/


 //Declarando Variáveis
$nome = (String) null;
$rg = (String) null;
$cpf = (String) null;
$telefone = (String) null;
$celular = (String) null;
$email = (String) null;
$obs = (String) null;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $nome = $_POST['txtNome'];
  $rg = $_POST['txtRg'];
  $cpf = $_POST['txtCpf'];
  $telefone = $_POST['txtTelefone'];
  $celular = $_POST['txtCelular'];
  $email = $_POST['txtEmail'];
  $obs = $_POST['txtObs'];

  echo ($nome .  $rg .  $cpf .  $telefone .  $celular . $email . $obs);
}


?>