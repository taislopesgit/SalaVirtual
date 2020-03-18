<?php
require_once "./classes/ConexaoJA.php";

if (isset($_GET)){

    $idJovem = isset($_GET['id']) ? $_GET['id'] : 0;
    $cronograma= isset($_GET['cr']) ? $_GET['cr'] : 0;
    $ja = new ConexaoJA();

    $entregaAtividade = $ja->getEntrega($idJovem , $cronograma);


    if ($entregaAtividade == "") {
        header('location:error.php?');

        die ();

    } else {
        $resultado= $entregaAtividade->fetch(PDO::FETCH_ASSOC);
    }
}else {
    header('location:error.php?');
    die ();
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Vendor styles -->
    <link rel="stylesheet" href="theme/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="theme/vendors/bower_components/animate.css/animate.min.css">
    <!-- App styles -->
    <link rel="stylesheet" href="theme/css/app.min.css">
</head>
<body data-ma-theme="cyan">
<div class="login">
    <div class="login__block active" id="l-login">
        <div class="conteiner">
            <div style="padding-left: 10%;padding-right: 10%;padding-top: 10%; ">
                <div class="row price-table price-table--highlight">
                    <div class="col-md-12">
                        <div class="nav-item">
                            <header class="bg-white">
                                <div class=""> <h4>Entregue sua atividade diária aqui!</h4></div>
                                <img src="img/faixa_medium.png">
                            </header>
                            <br>
                            <div class="price-table__item">
                                <header class="price-table__header bg-cyan">
                                    <div class="price-table__title"> Olá, <?php echo $resultado['nome'];?></div>
                                    <div class="price-table__title">  </div>
                                    <br>

                                </header>

                                <h6>Instrutor solicitante:</h6>
                                <?php echo $resultado['instrutor'];?>
                                <br>
                                <div class="price-table">
                                    <br>
                                </div>
                            </div>
                            <header class="price-table__header bg-cyan"
                            <div class="price-table__info">
                                <h6>Disciplina:</h6>
                                <?php echo $resultado['descricao'];?>

                            </div>
                            </header>
                            <form name="form" method="POST" action="upload.php">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" class="form-control-file" id="entregarAtividade">
                                </div>
                                <input type="submit"  id="enviou" class="btn btn-primary btn-lg" value="Enviar"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br> <br>  <br>
            <img src="img/logo-aprendiz.png">
        </div>
            </div>
        </div>
        <!-- Vendors -->


        <script src="theme/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="theme/vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="theme/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- App functions and actions -->
        <script src="theme/js/app.min.js"></script>
</body>

</html>

