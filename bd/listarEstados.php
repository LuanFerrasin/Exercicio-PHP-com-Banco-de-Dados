<?php
/***********************************************************************************
 Objetivo: Listar dados de Estados no Banco de Dados
 Data:23/09/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

require_once(SRC.'bd/conexaoMySql.php');




//Retorna todos os Registros Existentes no Banco
function listarEstados()
{
    $sql = "select * from tblEstado order by nome";

    $conexao = conexaoMySql();
    // Abre a conexão com o Banco de Dados
  

    //Solicita ao BD a execução do Script SQL
    $select = mysqli_query($conexao, $sql);

    return $select;


}