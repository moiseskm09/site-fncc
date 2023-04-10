<?php
	include_once '../config/conexao.php';

	$inicio = $_POST['inicio'];
	$max = $_POST['max'];
	
	$resultadoNoticiaC = mysqli_query($conexao, "SELECT * FROM site_noticias WHERE publicado = 1 ORDER BY cod_noticia DESC");
	$resultado["resultaQuantidade"] = mysqli_num_rows($resultadoNoticiaC);
	
	$result_noticia = mysqli_query($conexao, "SELECT * FROM site_noticias WHERE publicado = 1 ORDER BY cod_noticia DESC LIMIT $inicio, $max");
	
	if($resultado["resultaQuantidade"] > 0 ){
		while($row_noticia = mysqli_fetch_assoc($result_noticia)){
			$resultado_dados[] = $row_noticia;
		}
		$resultado["dados"] = $resultado_dados;
	}else{
		$resultado["dados"] = $null;
		$resultado["resultaQuantidade"] = 0;
	}
	echo json_encode($resultado);