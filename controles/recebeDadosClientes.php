<?php




/***********************************************************************************
 Objetivo: Receber , tratar e validar os dados de Clientes.
 Data:15/02/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

require_once('../functions/config.php');
//Import do Arquivo parar inserir no Banco de Dados
require_once('../bd/inserirCliente.php');

 //Declarando Variáveis
$nome = (String) null;
$rg = (String) null;
$cpf = (String) null;
$telefone = (String) null;
$celular = (String) null;
$email = (String) null;
$obs = (String) null;



//if($_SERVER['REQUEST_METHOD'] ele verifica qual o tipo de requisição foi encaminhada pelo form (GET / POST)
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

  //Recebe os dados encaminhados pelo Formulário através do método POST
  $nome = $_POST['txtNome'];
  $rg = $_POST['txtRg'];
  $cpf = $_POST['txtCpf'];
  $telefone = $_POST['txtTelefone'];
  $celular = $_POST['txtCelular'];
  $email = $_POST['txtEmail'];
  $obs = $_POST['txtObs'];

  if ($nome == null  || $rg == null || $cpf == null)
    echo("<script>
         alert('" . ERRO_CAIXA_VAZIA . "');
         window.history.back();
      </script>");
    //validação de quantidade de caracteres
   //strlen() retorna a quantidade de caracteres de uma variavel   
   elseif (strlen($nome)>100 || strlen($rg)>15 || strlen($cpf)>20)
    echo("<script>
        alert('" . ERRO_QTD_CARACTERES . "');
        window.history.back();
     </script>");

   else
   {

    //Local para enviar os dados para o BANCO DE DADOS

    //Criação de um Array para encaminhar a função "Inserir"
     $cliente = array (
         "nome"  => $nome,
          "rg"   => $rg,
          "cpf"  => $cpf,
          "telefone" => $telefone,
          "celular" => $celular,
          "email" => $email,
          "obs" => $obs
        );

     

     //Chama a função "Inserir" do arquivo inserirCliente.php e encaminha o array com os dados do
     inserir($cliente);
   }



}
?>