$(function(){
	carregar(0, 2, 'carrega_noticia.php');
	
	$("button.carregar-mais").click(function(evento){
		evento.preventDefault();
		
		var inicio = $("tbody tr").length;
		
		carregar(inicio, 2, 'carrega_noticia.php');
	});
	
	function carregar(inicio, max, url){
		var dados = {inicio : inicio, max : max};
		
		$("tbody").append('<tr><td style="color:red;">Carregando...</td></tr>');
		
		$.post(url, dados, function(data){
			
			$("tbody tr").last().remove();
			
			for(i = 0; i < data.dados.length; i++){
				$("tbody").append('<tr><td>'+data.dados[i].cod_noticia+'</td><td>'+data.dados[i].titulo_noticia+'</td><td>'+data.dados[i].subtitulo_noticia+'</td><td>'+data.dados[i].texto_noticia+'</td></tr>');
			}
			
			var conta = $("tbody tr").length;
			
			if(conta == data.resultaQuantidade){
				$("button.carregar-mais").hide();
			}
			
		}, "json");
	}
});