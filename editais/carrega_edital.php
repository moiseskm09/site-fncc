<?php
	include_once '../config/conexao.php';

	$inicio = $_POST['inicio'];
	$max = $_POST['max'];
	

	$resultadoEditalC = mysqli_query($conexao, "SELECT cod_edital FROM site_editais ORDER BY cod_edital DESC");
	$resultado["resultaQuantidade"] = mysqli_num_rows($resultadoEditalC);
	
	$result_edital = mysqli_query($conexao, "SELECT edital_arquivo, cooperativa, logo_coop, DATE_FORMAT(edital_data, '%d-%m-%Y') as edital_data FROM site_editais INNER JOIN cooperativas ON edital_coop = cod_coop ORDER BY cod_edital DESC LIMIT $inicio, $max");
	if($resultado["resultaQuantidade"] > 0 ){
		while($row_edital = mysqli_fetch_assoc($result_edital)){
			$resultado_dados[] = $row_edital;
		}
		$resultado["dados"] = $resultado_dados;
        }else{
		$resultado["dados"] = $null;
		$resultado["resultaQuantidade"] = 0;
                
	}
	echo json_encode($resultado);