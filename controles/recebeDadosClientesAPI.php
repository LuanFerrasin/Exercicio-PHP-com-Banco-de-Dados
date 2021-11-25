<?php

/*****************************************
Obejtivo: Arquivo responsável por receber os dados da API
Data: 24/11/2021
Autor: Luan 
 
************************************************/ 

    // require_once('../assets/function/config.php');
    require_once(SRC.'bd/inserirCliente.php');
    require_once(SRC.'bd/atualizarCliente.php');
    require_once(SRC.'bd/excluirCliente.php');


    function inserirClienteAPI($arrayDados) {

        // função para inserir dados no BD via post da API

        if (inserir($arrayDados))

            return true;

        else

            return false;



    }
    function atualizarClienteAPI($arrayDados, $id) {

        //Cria um novo Array apenas com o ID
        $novoItem = array("id" => $id);

        //Acrescenta o array do novoItem no $arrayDados, fazendo uma mescla de chaves.

        $arrayCliente = $arrayDados + $novoItem;

        // função para atualizar dados no banco via Put da API

        if (editar($arrayCliente))

            return true;

        else

            return false;



    }

   
?>