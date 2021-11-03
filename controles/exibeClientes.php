<?php
/***********************************************************************************
 Objetivo: Buscar os dados de Clientes no Banco de Dados
 Data:23/09/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/


 require_once('bd/listarClientes.php');

 function exibirClientes()
 {
     //Chama a função que busca os dados do Banco e recebe os registros dos clientes
    $dados = listar();

     return $dados;
   

 }




 

?>