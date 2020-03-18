
<?php
function extensao($arquivo){
    $arquivo = strtolower($arquivo);
    $explode = explode(".", $arquivo);
    $arquivo = end($explode);

    return ($arquivo);
}


define('KB', 1024);
define('MB', 1048576); // 1024 * 1024
define('GB', 1073741824); // 1024 * 1024 * 1024
define('TB', 1099511627776); // 1024 * 1024 * 1024 * 1024

$msg = false;



if( isset($_POST['enviou']) && $_POST['enviou'] == 1 ){

    // arquivo
    $arquivo = $_FILES['arquivo'];

    // Tamanho máximo do arquivo (em Bytes)
    $tamanhoPermitido = 1024 * 1024 * 2; // 2Mb

    //Define o diretorio para onde enviaremos o arquivo
    $diretorio = "upload/";

    // verifica se arquivo foi enviado e sem erros
    if( $arquivo['error'] == UPLOAD_ERR_OK ){

        // pego a extensão do arquivo
        $extensao = extensao($arquivo['name']);

        // valida a extensão
        if( in_array( $extensao, array("pdf") ) ){

            // verifica tamanho do arquivo
            if ( $arquivo['size'] > $tamanhoPermitido ){

                $msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até ".$tamanhoPermitido/MB." MB.";
                $class = "alert-warning";

            }else{

                // atribui novo nome ao arquivo
                $novo_nome  = "teste001.".$extensao;
                // faz o upload
                $enviou = move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

                if($enviou){
                    $msg = "<strong>Sucesso!</strong> Arquivo enviado corretamente.";
                    $class = "alert-success";
                }else{
                    $msg = "<strong>Erro!</strong> Falha ao enviar o arquivo.";
                    $class = "alert-danger";
                }
            }

        }else{
            $msg = "<strong>Erro!</strong> Somente arquivos PDF são permitidos.";
            $class = "alert-danger";
        }

    }else{
        $msg = "<strong>Atenção!</strong> Você deve enviar um arquivo.";
        $class = "alert-info";
    }
}

if ($msg != false) echo "<div class=\"alert $class\" role=\"alert\">$msg</div>";
?>