<?php

/*****************************************
Objetivo: Arquivo responsável por excluir os dados da API
Data: 24/11/2021
Autor: Luan 
 
************************************************/ 

function excluirClienteAPI($id) {
    if (excluir($id))
        return true;
    else
        return false;
}

?>