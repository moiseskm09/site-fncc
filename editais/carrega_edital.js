$(function(){
	carregar(0, 12, 'carrega_edital.php');
	
	$("button.carregar-mais").click(function(evento){
		evento.preventDefault();
                var inicio = $(".rel-editais a").length;
		carregar(inicio, 4, 'carrega_edital.php');
	});
	
	function carregar(inicio, max, url){
		var dados = {inicio : inicio, max : max};
                $(".editaisM").append('<div class="col-12 remover text-primary text-center fw-bold mb-2 mt-2">Carregando</div>');
		$.post(url, dados, function(data){	
			$(".remover").last().remove();
			for(i = 0; i < data.dados.length; i++){
				$(".editaisM").append('<div class="col"><a href="https://bemktech.com.br/site-fncc/assets/arquivos/editais/'+data.dados[i].edital_arquivo+'" target="blank"><div class="card h-100"><div class="card-header"><div class="row text-center align-items-center"><div class="col-12"><h6>'+data.dados[i].cooperativa+'</h6><small class="publicado">Publicado em: '+data.dados[i].edital_data+'</small></div></div></div><div class="card-body p-0"><img src="../assets/imagens/cooperativas/'+data.dados[i].logo_coop+'" class="card-img-top" alt="logo cooperativa"></div><div class="card-footer text-center"><small class="fw-bold">Fazer o download do edital</small></div></div></a></div>');
			}
			var conta = $(".rel-editais a").length;
			if( conta == data.resultaQuantidade){
				$("button.carregar-mais").hide();
			}else{ 
                        }
		}, "json");
	}
});