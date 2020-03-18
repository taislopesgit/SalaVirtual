<?php
	$pasta = "upload";
	$diretorio = dir($pasta);
	echo '<pre>';
	echo "Lista de Atividades dos jovens:<br />";
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

	echo '<ul>';

	foreach ($arPastas as $k => $v) {
		echo "<li>" . $k . "</li>";
		echo '<ul>';
		foreach ($v as $k1 => $v1) {
			echo "<li>" . $k1 . "</li>";
			var_dump($k1);
			asort($v1);
			foreach ($v1 as $k2 => $v2) {
				echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='upload/{$k}/{$k1}/{$v2}' target='_blank'>$v2</a><br>";
			}
		}
		echo '</ul><br><br>';
	}
	echo '</ul>';
?>

