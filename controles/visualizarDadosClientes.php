<?php
/***********************************************************************************
 Objetivo: Visualiza os dados de Clientes no Banco de Dados
 Data:21/10/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

function visualizarCliente($id)
{
    require_once('functions/config.php');
    require_once(SRC.'bd/listarClientes.php');

  //Recebe o id enviado como argumento da função  
 $idCliente = $id;

 $dadosCliente = buscar($idCliente);

  if($rsCliente=mysqli_fetch_assoc($dadosCliente))
    return $rsCliente;
  else
    return false;
}



?>