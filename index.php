<?php

//Ativa a Utilização de váriaveis de sessão.
session_start();

//declaração das váriaveis para o formulário
$nome = (string) null;
$telefone = (string) null;
$celular = (string) null;
$rg = (string) null;
$cpf = (string) null;
$email = (string) null;
$obs = (string) null;
$id = (int) 0;
//Criando Variaveis para trazer os valores do Estado e a Sigla
$idEstado = (int) null;
$sigla = (string) "Selecione um Item ";
  //Essa variavel será utilizada para definir o modo de manipulação com Banco de Dados(Salvar será feito o insert
  // Se ela estiver atualizar será feito o update)
$modo = (string) "Salvar";



//Import de configuração de variaveis e constantes
require_once('functions/config.php');

// require_once(SRC.'bd/conexaoMySql.php');
// conexaoMySql();

require_once(SRC.'controles/exibeClientes.php');


//Chamando o Arquivo de Listagem de Estados
require_once('controles/listarDadosEstados.php');


// var_dump($_SESSION['cliente']);
//Verifica a existencia da Variavel sessao e usamos para trazer os dados para o Editar
if(isset($_SESSION['cliente']))
{
    $id = $_SESSION['cliente']['idCliente'];
    $nome = $_SESSION['cliente']['nome'];
    $telefone = $_SESSION['cliente']['telefone'];
    $celular = $_SESSION['cliente']['celular'];
    $rg = $_SESSION['cliente']['rg'];
    $cpf = $_SESSION['cliente']['cpf'];
    $email = $_SESSION['cliente']['email'];
    $obs = $_SESSION['cliente']['obs'];
    $idEstado = $_SESSION['cliente']['idEstado'];
    $sigla = $_SESSION['cliente']['sigla'];
    $modo = "Atualizar";
}
    //Elimina um objeto, variavel da memoria
    unset($_SESSION['cliente']);


// <?=$_SESSION['cliente']['nome']





?>

<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery.js"></script>

        <script>
            $(document).ready(function(){
                //Alterando uma propriedade de css ao carregar da página
                $('#containerModal').css('display', 'none') 

                    // abre a Modal
                $('.pesquisar').click(function(){
                   $('#containerModal').fadeIn(1000);

                    //Recebe o id do Cliente que foi adicionado pelo Data Atributo no HTML
                    let idCliente = $(this).data('id');
                    // Realiza uma requisição para consumir dados de outra pagina 
                    $.ajax({
                        type: "GET", // Tipo de Requisição (GET, POST. PUT e etc...)
                        url: "visualizarDados.php", // URL da pagina que será consumida
                        data: {id:idCliente},
                        success: function(dados){ // Se a requisiçãp der certo iremos receber um conteúdo na váriavel dados
                            $('#modal').html(dados); // Exibe dentro da div MODAL
                        } 
                        


                    });

                });
                    // Fecha a Modal
                 $('#fecharModal').click(function(){
                    $('#containerModal').fadeOut();    
                 });
            });
        </script>

    </head>
    <body>
        <div id="containerModal">
            <span id="fecharModal">
                <img src="css/img/trash.png" alt="">
            </span>
            <div id="modal">

            </div>
        </div>
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Contatos </h1>
            </div>
            <div id="cadastroInformacoes">
        
            <!-- As Variaveis Modo e ID , que foram utilizadas no Action do Form, são responsaveis por encaminhar para a pagina recebeDadosCliente.php duas informações:
                modo - que é responsavel por definir se é para definir ou atualizar
                id - que é responsavel por identificar o registro a ser atualizado no Banco de Dados
            -->
                <form action="controles/recebeDadosClientes.php?modo=<?=$modo?>&id=<?=$id?>" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Foto: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="file" name="fleFoto" accept="image/jpeg, image/jpg, image/png">
                        </div>
                    </div>
                <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Estado: </label>
                            </div>
                            <div class="cadastroEntradaDeDados">
                        <select name="sltEstado">
                            <option value="<?=$idEstado?>"><?=$sigla?> </option>
                            <?php
                                //chama a função que vai buscar todos os Estados do Banco
                               $listEstados =  exibirEstados();
                               //Repetição para exibir os dados do Banco
                               while($rsEstados = mysqli_fetch_assoc($listEstados))
                               {
                                ?>
                                    <option value="<?=$rsEstados['idEstado']?>"> <?=$rsEstados['sigla']?> </option>
                                <?php
                               }

                            ?>
                        </select>
                        </div>
                            </div> 
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> RG: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtRg" value="<?=$rg?>" placeholder="Digite seu Rg" maxlength="20">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Cpf: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtCpf" value="<?=$cpf?>" placeholder="Digite seu Cpf" maxlength="20">
                        </div>
                    </div>
                     <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Telefone: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTelefone" value="<?=$telefone?>" placeholder="Digite seu Telefone" maxlength="20">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Celular: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtCelular" value="<?=$celular?>" placeholder="Digite seu Celular" maxlength="20">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" value="<?=$email?>" placeholder="Digite seu Email" maxlength="60">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Observações: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtObs" cols="50" rows="7"><?=$obs?></textarea>
                        </div>

                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="<?=$modo?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Consulta de Dados.</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
 
                <?php
                 $dadosClientes = exibirClientes();


                  while($rsClientes = mysqli_fetch_assoc($dadosClientes))
                  {

                  


                 ?>


                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$rsClientes['nome']?></td>
                    <td class="tblColunas registros"><?=$rsClientes['celular']?></td>
                    <td class="tblColunas registros"><?=$rsClientes['email']?></td>
                    <td class="tblColunas registros">
                        <a href="controles/editarDados.php?id=<?=$rsClientes['idCliente']?>">
                        <img src="css/img/edit.png" alt="Editar" title="Editar" class="editar">
                        </a>
                        <a onclick="return confirm('Tem Certeza, que deseja Excluir?');"  href="controles/excluiDadosClientes.php?id=<?=$rsClientes['idCliente']?>">
                        <img src="css/img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                        <img src="css/img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar" data-id="<?=$rsClientes['idCliente']?>">
                    </td>
                </tr>
                <?php
                    }
                  ?>
            </table>
        </div>
        <div id="baixo"> <span>Copyright &copy;2021 | Luan Ferrasin </span>
      </div>
    </body>
</html>