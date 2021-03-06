<?php
/***********************************************************************************
 Objetivo: Listar dados de Clientes no Banco de Dados
 Data:23/09/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

require_once(SRC.'bd/conexaoMySql.php');




//Retorna todos os Registros Existentes no Banco
function listar()
{
    $sql = "select tblcliente.*,tblEstado.sigla 
    from tblcliente 
        inner join tblEstado 
        on tblEstado.idEstado = tblcliente.idEstado
        order by idCliente desc";

    $conexao = conexaoMySql();
    // Abre a conexão com o Banco de Dados
  

    //Solicita ao BD a execução do Script SQL
    $select = mysqli_query($conexao, $sql);

    return $select;


}
//Retorna apenas um registro com base no ID
function buscar ($idCliente)
{
    $sql = "select tblcliente.*,tblEstado.sigla 
        from tblcliente 
            inner join tblEstado 
            on tblEstado.idEstado = tblcliente.idEstado     
        where tblcliente.idCliente = ".$idCliente;

    $conexao = conexaoMySql();
    // Abre a conexão com o Banco de Dados
  

    //Solicita ao BD a execução do Script SQL
    $select = mysqli_query($conexao, $sql);

    return $select;


}

function buscarNome($nome) {
    $sql = "select tblcliente.*,tblEstado.sigla 
    from tblcliente
    inner join tblEstado
    on tblEstado.idEstado = tblcliente.idEstado
    where tblcliente.nome like '%".$nome."%'";

    $conexao = conexaoMySql();
    // Abre a conexão com o Banco de Dados


    //Solicita ao BD a execução do Script SQL
    $select = mysqli_query($conexao, $sql);

    return $select;

}




?>


