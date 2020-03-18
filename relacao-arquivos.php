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
                                <div class=""> <h4>Relação de atividades entregues</h4></div>
                                <img src="img/faixa_medium.png">
                            </header>

<?php
                    $pasta = "upload";
                    $diretorio = dir($pasta);

	while($arquivo = $diretorio -> read()) {
		if ($arquivo != '..' && $arquivo != '.') {
			$arPastas[$arquivo] = array();
		}
	}
	$diretorio->close();

	foreach ($arPastas as $k => $v) {
		$subPasta = $pasta . '/' . $k;
		$subDiretorio = dir($subPasta);
		while($arquivo = $subDiretorio -> read()) {
			if ($arquivo != '..' && $arquivo != '.') {
				$arPastas[$k][$arquivo] = array();
			}
		}
		$subDiretorio->close();
	}


	foreach ($arPastas as $k => $v) {
		if (is_array($v)) {
			foreach ($v as $k1 => $v1) {
				$subPasta = $pasta . '/' . $k . '/' . $k1;
				$subDiretorio = dir($subPasta);
				while($arquivo = $subDiretorio -> read()) {
					if ($arquivo != '..' && $arquivo != '.') {
						$arPastas[$k][$k1][] = $arquivo;
					}
				}
				$subDiretorio->close();
			}
		}
	}

	ksort($arPastas);

	echo '<div id="accordion">';

	foreach ($arPastas as $k => $v) {
		echo "<h3>" . $k . "</h3>";
		echo '<div class="accordion2">';
		foreach ($v as $k1 => $v1) {
			echo "<h4>" . $k1 . "</h4>";
			asort($v1);
			echo "<div>";
			foreach ($v1 as $k2 => $v2) {
				echo "<a href='upload/{$k}/{$k1}/{$v2}' target='_blank'>$v2</a><br>";
			}
			echo "</div>";
		}
		echo '</div>';
	}
	echo '</div>';
?>
                            <br> <br>  <br>
                            <img src="img/logo-aprendiz.png">

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                    <link rel="stylesheet" href="/resources/demos/style.css">
                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                        <script>
                            $( function() {
                                $( "#accordion" ).accordion();
                                $( ".accordion2" ).accordion();
                            } );
                        </script>
