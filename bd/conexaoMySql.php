<?php
/********************************************************************************************** 
     Objetivo: Arquivo para configurar a conexão com o Banco de Dados MySQL 
     Data: 15/09/2021  
     Autor: Luan Enzo Simonato Ferrasin 
***********************************************************************************************/




//Abre a conexão com a base de dados MySQL
function conexaoMySql()
{


    //Declaração de Variaveis para conexão com o BD    
     $server = (string) BD_SERVER;
     $user = (string) BD_USER;
     $password = (string) BD_PASSWORD;
     $dataBase = (string) BD_DATABASE;
     

    /* 
       Formas de criar conexão com o BD
       mysql_connect();
       mysqli_connect();
       PDO();

    */

    if($conexao = mysqli_connect($server, $user, $password, $dataBase))
      return $conexao;
    else
    {
      echo(BD_ERRO_CONEXAO);
      return false;
    }
      
}




?>