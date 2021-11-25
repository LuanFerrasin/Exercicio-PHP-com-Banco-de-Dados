<?php
/***********************************************************************************
 Objetivo: Exclui os Clientes no Banco de Dados
 Data:29/09/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

require_once('../bd/conexaoMySql.php');
  function excluir($idCliente)
  {
  $sql = "delete from tblcliente where idCliente = ".$idCliente;

  
        $conexao = conexaoMySql();

        if (mysqli_query($conexao, $sql))
            return true;
        else
            return false;
  }




?>