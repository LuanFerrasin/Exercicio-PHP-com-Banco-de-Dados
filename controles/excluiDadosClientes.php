<?php
/***********************************************************************************
 Objetivo: Exclui os dados de Clientes no Banco de Dados
 Data:29/09/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

require_once('../functions/config.php');
require_once(SRC.'bd/excluirCliente.php');

 $idCliente = $_GET['id'];

  if(excluir($idCliente))
  echo("<script>
  alert('" . BD_MSG_EXCLUIR . "');
  window.history.back();
  </script>
  ");
  else
  echo("<script>
     alert('" . BD_ERRO_EXCLUIR . "');
     window.history.back();
     </script>
     ");








?>