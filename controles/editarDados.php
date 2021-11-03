<?php
/***********************************************************************************
 Objetivo: Busca os dados de Clientes no Banco de Dados
 Data:06/10/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

require_once('../functions/config.php');
 require_once(SRC.'bd/listarClientes.php');

 $idCliente = $_GET['id'];

 $dadosCliente = buscar($idCliente);

  if($rsCliente=mysqli_fetch_assoc($dadosCliente))
  {
//    echo("<script>
//    alert('" . BD_MSG_EXCLUIR . "');
//    window.history.back();
//    </script>
//   ");
    session_start(); 
    
    $_SESSION['cliente'] = $rsCliente;

    header('location:../index.php');

  }
  else
   echo("");
?>