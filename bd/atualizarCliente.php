<?php
/***********************************************************************************
 Objetivo: Atualiza os dados dos  Clientes no Banco de Dados
 Data:13/10/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/
require_once('../bd/conexaoMySql.php');

function editar($arrayCliente)
{
    $sql = "update tblcliente set 
                nome = '".$arrayCliente['nome']."',
                rg = '".$arrayCliente['rg']."',
                cpf = '".$arrayCliente['cpf']."',
                telefone = '".$arrayCliente['telefone']."',
                celular = '".$arrayCliente['celular']."',
                email = '".$arrayCliente['email']."',
                obs = '".$arrayCliente['obs']."',
                idEstado = ".$arrayCliente['idEstado'].",
                foto = '".$arrayCliente['foto']."',
            where idcliente = ".$arrayCliente['id'];
             
    // //Chamando que estabelece a conexão com o Banco de Dados
    $conexao = conexaoMySql();
    // // Envia o Script SQL para o Banco de Dados
     if (mysqli_query($conexao,$sql))
     return true;
     else
     return false;

     
   


}




 ?>