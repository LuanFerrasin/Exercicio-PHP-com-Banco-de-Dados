<?php
/***********************************************************************************
 Objetivo: Lista os Estados
 Data:27/10/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/


 require_once(SRC.'bd/listarEstados.php');

 function exibirEstados()
 {
     //Chama a função que busca os dados do Banco e recebe os registros dos clientes
    $dados = listarEstados();

     return $dados;
   

 }




 

?>