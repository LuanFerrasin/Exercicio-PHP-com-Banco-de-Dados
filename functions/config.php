<?php

/***********************************************************************************
 Objetivo: Arquivo de Configuração de variaveis e constantes que serão utilizadas no
 Sistema
 Data:15/02/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/











//Variaveis e constantes para conexão de Dados com MySql
const BD_SERVER = 'localhost';
const BD_USER = 'root';
const BD_PASSWORD = 'bcd127';
const BD_DATABASE = 'db_contados20212t';



// Criando Constante para indicar a pasta raiz do servidor + a Estrutura de Diretórios até o meu projeto :)

define ('SRC', $_SERVER['DOCUMENT_ROOT'].'/ds2t20212/Luan/Aula0408/Aula1509/');




//Mensagens de erro do Sistema
const ERRO_CAIXA_VAZIA = 'Não foi Possível realizar a operação, pois existem campos Obrigatórios a serem preenchidos.';

const BD_ERRO_CONEXAO = 'Não foi Possível realizar a conexão com o Banco de Dados , entre em contato com o Administrador do sistema.';

const ERRO_QTD_CARACTERES = 'Não foi Possível realizar a conexão, pois ultrapassou  o limite de caracteres';



//Mensagens de Aceitação e validação de dados no Banco

const BD_MSG_INSERIR = 'Registro salvo com sucesso no Banco de Dados!';

const BD_MSG_ERRO = 'Não Foi possível Inserir Dados';

const BD_MSG_EXCLUIR ='Registro excluíido com Sucesso do Banco de Dados';

const BD_ERRO_EXCLUIR ='Não foi possível excluir os dados, tente novamente!';






?>    