<?php


/***********************************************************************************
 Objetivo: fazer upload de imagens
 Data:03/11/2021 
 Autor: Luan Enzo Simonato Ferrasin

 **********************************************************************************/


 //Criando a função para fazer upload de Arquivos
 function uploadFile($arrayFile)
 {
 $fotoFile = $arrayFile;
 $tamanhoOriginal = (int) 0;
 $tamanhoKB = (int) 0; 
 $extensao = (string) null;
 $tipoArquivo = (string) null;
 $nomeArquivo = (string) null;
 $nomeArquivoCript = (string) null;
 $foto = (string)  null;
 $arquivoTemp = (string) null;



 //Valide se o arquivo existe no ARRAY
   if($fotoFile['size'] > 0 && $fotoFile['type'] != "")
   {
       //Recebe o tamanho original do Arquivo em Byte
    $tamanhoOriginal = $fotoFile['size'];

    //Converte o Tamanho Em KBytes
    $tamanhoKB = $tamanhoOriginal/1024;

    //Recebe a tipo original do Arquivo
    $tipoArquivo = $fotoFile['type'];

    //Valida se o tamanho do arquivo é menor(<) do que o permitido
    if($tamanhoKB <= TAMANHO_FILE)
    {
        //Percorre o Array de Extensões permitidas buscando a extensao do arquivo atual, se encontrar retorna "true"
        if(in_array($tipoArquivo, EXTENSOES_PERMITIDAS))
        {
            //Permite extrair apenas um nome de um arquivo sem a extensao
            $nomeArquivo = pathinfo($fotoFile['name'],PATHINFO_FILENAME);
             //Permite extrair apenas a extensao de um arquivo sem o nome
            $extensao = pathinfo($fotoFile['name'],PATHINFO_EXTENSION);

            /*
            Algoritmos de Criptografia no PHP
            hash('sha256','variavel')
            sha1('variavel');
            md5('variavel');
            */ 
            
            //Gera uma Sequência númerica com base nas configurações de Hardware da Maquina
            //time() pega a hora:minuto:segundo atual
            $nomeArquivoCript = md5($nomeArquivo.uniqid(time()));
            //Monta o novo nome do arquivo com a extensão
            $foto = $nomeArquivoCript.".".$extensao;
            //Recebe o nome do arquivo temporario que foi gerado quando o APACHE recebeu o arquivo do FORM
            $arquivoTemp = $fotoFile['tmp_name'];

            //move_uploaded_file move um arquivo de pasta temporario do APACHE para a pasta de servidor que foi criada
           if(move_uploaded_file($arquivoTemp, SRC.NOME_DIRETORIO_FILE.$foto))
           return $foto;
           else
            echo('erro no upload do arquivo!');

        }else
        echo('Erro Tipo de Arquivo');
    }else
    echo('Erro Tamanho do Arquivo');
   }
 }





 ?>