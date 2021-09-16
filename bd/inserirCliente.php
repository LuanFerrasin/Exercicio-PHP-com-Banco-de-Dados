<?php


//Import do arquivo de conexao com Banco de Dados
require_once('../bd/conexaoMySql.php');
//require_once('../controles/receberDadosClientes.php');

/***********************************************************************************
 Objetivo: Inserir dados de Clientes no Banco de Dados
 Data:16/02/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

  function inserir ($arrayCliente)
    {


        //var_dump($arrayCliente);
     
        $sql = "insert into tblcliente
                 (
                    nome,
                    rg,
                    cpf,
                    telefone,
                    celular,
                    email,
                    obs

                 )
                 values
                 ('".$arrayCliente['nome']."', 
                 '".$arrayCliente['rg']."',
                 '".$arrayCliente['cpf']."',
                 '".$arrayCliente['telefone']."',
                 '".$arrayCliente['celular']."',
                 '".$arrayCliente['email']."',
                 '".$arrayCliente['obs']."'  






                 )

        
        ";
        //Chamando que estabelece a conexão com o Banco de Dados
        $conexao = conexaoMySql();
        // Envia o Script SQL para o Banco de Dados
        mysqli_query($conexao,$sql);
       
    }






?>