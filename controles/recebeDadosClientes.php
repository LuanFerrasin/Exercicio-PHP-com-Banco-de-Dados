<?php




/***********************************************************************************
 Objetivo: Receber , tratar e validar os dados de Clientes.
 Data:15/02/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/

require_once('../functions/config.php');
//Import do Arquivo parar inserir no Banco de Dados
require_once(SRC.'bd/inserirCliente.php');
require_once(SRC.'bd/atualizarCliente.php');
//Chamando o Arquivo que faz o Upload de imagens para o Servidor
require_once(SRC.'functions/upload.php');

 //Declarando Variáveis
$nome = (String) null;
$rg = (String) null;
$cpf = (String) null;
$telefone = (String) null;
$celular = (String) null;
$email = (String) null;
$obs = (String) null;
$idEstado = (int) null;
//criando a variavel para guardar o nome das imagens
$foto =  (string) null;



//Validacao para saber se o id do registro está chegando pela URL (modo para editar registro)
if(isset ($_GET['id']))
  $id = (int) $_GET['id'];
else
  $id = (int) 0;



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
  $idEstado = $_POST['sltEstado'];
  //Esse nomeFoto está chegando através do Action do Form da Index, motivo dessa váriavel é para concluir o editar com o upload de fotos  
  $nomeFoto = $_GET['nomeFoto'];

  if(strtoupper($_GET['modo']) == 'ATUALIZAR')
  {
    if($_FILES['fleFoto']['name'] != "")
    {

  //chama a função que faz o Upload de um Arquivo (nesse caso, imagem)
   $foto = uploadFile($_FILES['fleFoto']);
   //Apaga a imagem antiga 
    unlink(SRC.NOME_DIRETORIO_FILE.$nomeFoto);

    }
    else{
      $foto = $nomeFoto;
    }
  }
  else 
  {
    $foto = uploadFile($_FILES['fleFoto']);
  }

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
          "obs" => $obs,
          "id" => $id,
          "idEstado" => $idEstado,
          "foto" => $foto
        );

    //Validação para saber se é para inserir no Registro ou se é para Atualizar o Registro existente no BD 
    if(strtoupper($_GET['modo']) == 'SALVAR')
    {
      // chama a funcao inserir do arquivo  inserirCliente.php
      if(inserir($cliente))
        echo("<script>
        alert('" . BD_MSG_INSERIR . "');
        window.location.href = '../index.php';
        </script>
        ");
     else
        echo("<script>
        alert('" . BD_MSG_ERRO . "');
        window.history.back();
        </script>
        ");
        
    }elseif(strtoupper($_GET['modo']) == 'ATUALIZAR')
    {
       if (editar($cliente))
      
        echo("<script>
       alert('" . BD_MSG_INSERIR . "');
        window.location.href = '../index.php';
        </script>
        ");
      else
        echo("<script>
       alert('" . BD_MSG_ERRO . "');
        window.history.back();
        </script>
        ");  
      } 
    }
  }
?>