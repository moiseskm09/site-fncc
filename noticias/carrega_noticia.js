$(function(){
	carregar(9, 4, 'carrega_noticia.php');
	
	$("button.carregar-mais").click(function(evento){
		evento.preventDefault();
                var inicio = $(".todas-noticias a").length;
		carregar(inicio, 4, 'carrega_noticia.php');
	});
	
	function carregar(inicio, max, url){
		var dados = {inicio : inicio, max : max};
                $(".maisNoticias").append('<div class="col-12 remover text-primary text-center fw-bold mb-2 mt-2">Carregando</div>');
		$.post(url, dados, function(data){	
			$(".remover").last().remove();
			for(i = 0; i < data.dados.length; i++){
				$(".maisNoticias").append('<div class="col-lg-3 col-md-3 col-12"> <a href="https://bemktech.com.br/site-fncc/noticias/news-express/'+data.dados[i].slug_noticia+'"> <div class="card mb-3"> <div class="card-body n-mobile"> <div class="row"> <div class="col-lg-12 col-md-12 col-12"> <img src="../assets/imagens/imagens_noticias/'+data.dados[i].img_noticia+'" class="card-img-top" alt="imagem post" style="height: 100%;"> </div><div class="col-lg-12 col-md-12 col-12"> <div class="topo-noticia-destaque mt-2 mb-3"> <span class="badge text-bg-warning">'+data.dados[i].categoria_noticia+' </span> <span class="data-postagem">'+data.dados[i].data_publicacao+'</span> </div><h4>'+data.dados[i].titulo_noticia+'</h4> </div></div></div></div></a> </div>');
			}
			var conta = $(".todas-noticias a").length;
			if( conta == data.resultaQuantidade){
				$("button.carregar-mais").hide();
			}else{ 
                        }
		}, "json");
	}
});