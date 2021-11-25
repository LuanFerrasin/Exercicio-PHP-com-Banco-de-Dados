<?php
/***********************************************************************************
 Objetivo: Exclui os dados de Clientes no Banco de Dados
 Data:29/09/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

require_once('../functions/config.php');
require_once(SRC.'bd/excluirCliente.php');

 $idCliente = $_GET['id'];
 // o nome da foto foi enviado pelo INDEX no link do excluir
 $nomeFoto = $_GET['foto'];

  if(excluir($idCliente))
   {
      //Apaga a foto que está na pasta dos Arquivos do Upload
      unlink(SRC.NOME_DIRETORIO_FILE.$nomeFoto);

      echo("<script>
      alert('" . BD_MSG_EXCLUIR . "');
      window.history.back();
      </script>
      ");
  }
  else
  echo("<script>
     alert('" . BD_ERRO_EXCLUIR . "');
     window.history.back();
     </script>
     ");








?>