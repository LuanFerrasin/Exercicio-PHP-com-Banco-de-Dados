<?php
/***********************************************************************************
 Objetivo: Buscar os dados de Clientes no Banco de Dados
 Data:23/09/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/


 require_once(SRC.'bd/listarClientes.php');

 function exibirClientes()
 {
     //Chama a função que busca os dados do Banco e recebe os registros dos clientes
    $dados = listar();

     return $dados;
   

 }
//Função para criar um array de dados com base no retorno do BD
 function criarArray($objeto)
 {
     $cont = (int) 0;
     //Estrutura de Repetição para pegar um Objeto de Dados e Converter em um Array
    while ($rsDados = mysqli_fetch_assoc($objeto))
    {
        $arrayDados [$cont] = array(
                    "id"        => $rsDados['idCliente'],
                    "nome"      => $rsDados['nome'],
                    "rg"        => $rsDados['rg'],
                    "cpf"       => $rsDados['cpf'],
                    "telefone"  => $rsDados['telefone'],
                    "celular"   => $rsDados['celular'],
                    "email"     => $rsDados['email'],
                    "obs"       => $rsDados['obs'],
                    "foto"      => $rsDados['foto'],
                    "idEstado"  => $rsDados['idEstado'],
                    "sigla"     => $rsDados['sigla']
        );

        $cont +=1;
    }
    //Tratamento para validar se existe dados no BD
    //senão houver o retorno deverá ser false
    if(isset($arrayDados))
        return $arrayDados;
    else    
        return false;
 }
 //Criando a Função para gerar um JSON bom base em uma Array de Dados
    function criarJSON($arrayDados)
    {
        //Especifica no Cabeçalho do PHP se será gerado um JSON
        header("content-type:application/json");

        //Converte um Array em JSON
        $listJSON = json_encode($arrayDados);

        /*
        json_encode() - converte um array em JSON
        json_decode() - converte um JSON em array
        */ 

        if(isset($listJSON))
            return $listJSON;
        else
            return false;
    }

 

?>