<?php 
include_once '../config/conexao.php';
ini_set('display_errors', 0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <title>Notícias - FNCC</title>
    <meta name="title" content="Notícias - FNCC - Federação Nacional das Cooperativas de Crédito">
<meta name="description" content="A FNCC é uma federação constituída para representar o interesse das suas cooperativas associadas junto aos órgãos governamentais, instituições financeiras e entidades de todo o segmento do cooperativismo de crédito, apoiando as suas federadas no desenvolvimento das suas atividades.">
<meta name="keywords" content="fncc,FNCC, federação, federacao, FEDERAÇÃO, FEDERAÇÃO, cooperativa, COOPERATIVA, cooperativas, COOPERATIVAS, crédito, credito, emprestimo, empréstimos, empréstimo,cooperativismo, noticias, são paulo, sao paulo, brasil, consultoria, consultoria técnica, consultoria tecnica, consultoria jurídica, consultoria juridica, normas, normativo, regras, finanças, financeiro, cooperar, gestão, estratégia, estrategia, assitência, parceria, parceiros, ouvidoria, ouvidor, denúncias, atendimento, representação, representatividade, benchmarking, assembleia, processos, capacitação, workshops, foruns, palestras, conecta">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="revisit-after" content="1 day">
<meta name="description" content="Portuguese">
<meta name="author" content="beMK - https://bemktech.com.br">

    <link rel="icon" type="image/png" sizes="512x512" href="../assets/imagens/icones/fncc-logotipo-colorido.webp">
    <link rel="icon" type="image/png" sizes="48x48" href="../assets/imagens/icones/fncc-logotipo-colorido.webp">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/imagens/icones/fncc-logotipo-colorido.webp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo:wght@100;200;300;400;500;600;700;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <link href="../assets/css/menu.css" rel="stylesheet">
    <link href="../assets/css/voltartopo.css" rel="stylesheet">
    <link href="../assets/css/aos.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/default.css" rel="stylesheet">
    <script src="carrega_noticia.js"></script>
  </head>
  <body>
      <?php require_once '../assets/menu.php';?>
      <div class="conteudo-tela">
          <div class="topo-telas">
              <div class="container-fluid">
                  <div class="row align-content-center text-center">
                      <div class="col-12" >
                          <h1 class="titulo-topo">NOTÍCIAS</h1>
                          <p class="subtitulo-topo fw-bold">Fique por dentro! News e Express em um só lugar.</p>
                      </div>
                  </div>
              </div>
          </div>
          <section class="todas-noticias espacamento">
              <div class="container-fluid espacamento-lateral">  
                  <div class="row">
                  <?php 
                  $buscaNoticia = mysqli_query($conexao, "SELECT * FROM site_noticias WHERE publicado = 1 ORDER BY cod_noticia DESC LIMIT 1");
                  if(mysqli_num_rows($buscaNoticia) > 0){
                      $resultadoNoticiaDestaque = mysqli_fetch_assoc($buscaNoticia);
                      $codNoticiaDestque = $resultadoNoticiaDestaque["cod_noticia"];
                  ?>
                      <div class="col-lg-6 col-md-6 col-12">
                        <a href="https://bemktech.com.br/site-fncc/noticias/news-express/<?php echo $resultadoNoticiaDestaque["slug_noticia"]?>">
                        <div class="card h-100 mb-3">
                          <img src="../assets/imagens/imagens_noticias/<?php echo $resultadoNoticiaDestaque["img_noticia"]?>" class="card-img-top" alt="imagem post">
  <div class="card-body">
    <div class="topo-noticia-destaque mb-3">
      <span class="badge <?php if($resultadoNoticiaDestaque["categoria_noticia"] == "News"){echo "text-bg-info";}else{ echo "text-bg-success";}?>"><?php echo $resultadoNoticiaDestaque["categoria_noticia"];?> </span> <span class="float-end data-postagem"> <?php echo strftime('%d de %b de %Y', strtotime($resultadoNoticiaDestaque["data_publicacao"]));?></span> 
    </div>
    <h5><?php echo $resultadoNoticiaDestaque["titulo_noticia"]?></h5>
    <h6 style="max-width: 100%; color: #785aa2;"><?php echo substr($resultadoNoticiaDestaque["subtitulo_noticia"], 0, 300)." ...";?></h6>
  </div>
</div>
                        </a>
                    </div>
                  <?php }else{ echo "<p>Não há notícias para exibir!</p>"; } ?>
                      <div class="col-lg-6 col-md-6 col-12">
                          <div class="row g-0">
                              <?php 
                              $buscaNoticiaLinha1 = mysqli_query($conexao, "SELECT * FROM site_noticias WHERE cod_noticia != '$codNoticiaDestque' and publicado = 1 ORDER BY cod_noticia DESC LIMIT 4");
                              if(mysqli_num_rows($buscaNoticiaLinha1) > 0 ){
                                  while($resultadoPrimeiraLinha = mysqli_fetch_assoc($buscaNoticiaLinha1)){
                                      $ultimaNoticiaPrimeiraLinha = $resultadoPrimeiraLinha["cod_noticia"];
                              ?>
                              <div class="col-12">
                                 <a href="https://bemktech.com.br/site-fncc/noticias/news-express/<?php echo $resultadoPrimeiraLinha["slug_noticia"];?>">
                                <div class="card mb-3">
  <div class="card-body n-mobile">
      <div class="row">
          <div class="col-lg-5 col-md-5 col-12">
              <img src="../assets/imagens/imagens_noticias/<?php echo $resultadoPrimeiraLinha["img_noticia"];?>" class="card-img-top" alt="imagem post" style="height: 100%;">
        </div>
          <div class="col-lg-7 col-md-7 col-12">
             <div class="topo-noticia-destaque mt-2 mb-3">
      <span class="badge <?php if($resultadoPrimeiraLinha["categoria_noticia"] == "News"){echo "text-bg-info";}else{ echo "text-bg-success";}?>"><?php echo $resultadoPrimeiraLinha["categoria_noticia"];?> </span> <span class="data-postagem"> <?php echo strftime('%d de %b de %Y', strtotime($resultadoPrimeiraLinha["data_publicacao"]));?></span> 
    </div>
    <h4><?php echo $resultadoPrimeiraLinha["titulo_noticia"]?></h4> 
        </div>
    </div>
  </div>
</div>
                                 </a>
                        </div>
                              <?php 
                                  }
                              }
                              ?>
                    </div>
                </div>
                      
            </div>
                  <div class="row mt-3">
                      <?php 
                              $buscaNoticiaLinha2 = mysqli_query($conexao, "SELECT * FROM site_noticias WHERE cod_noticia < '$ultimaNoticiaPrimeiraLinha' and publicado = 1 ORDER BY cod_noticia DESC LIMIT 8");
                              if(mysqli_num_rows($buscaNoticiaLinha2) > 0 ){
                                  while($resultadoSegundaLinha = mysqli_fetch_assoc($buscaNoticiaLinha2)){
                              ?>
                    <div class="col-lg-3 col-md-3 col-12">
                              <a href="https://bemktech.com.br/site-fncc/noticias/news-express/<?php echo $resultadoSegundaLinha["slug_noticia"]?>">
                                <div class="card mb-3">
  <div class="card-body n-mobile">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
              <img src="../assets/imagens/imagens_noticias/<?php echo $resultadoSegundaLinha["img_noticia"]?>" class="card-img-top" alt="imagem post" style="height: 100%;">
        </div>
          <div class="col-lg-12 col-md-12 col-12">
             <div class="topo-noticia-destaque mt-2 mb-3">
      <span class="badge <?php if($resultadoSegundaLinha["categoria_noticia"] == "News"){echo "text-bg-info";}else{ echo "text-bg-success";}?>"><?php echo $resultadoSegundaLinha["categoria_noticia"]?> </span> <span class="data-postagem"> <?php echo strftime('%d de %b de %Y', strtotime($resultadoSegundaLinha["data_publicacao"]));?></span> 
    </div>
    <h4><?php echo $resultadoSegundaLinha["titulo_noticia"]?></h4> 
        </div>
    </div>
  </div>
</div>
                              </a>
                        </div>
                   <?php 
                   } }
                   ?>
                      <div> 
                          <table>
                              <thead>
				<tr>
					<td>ID</td>
					<td>Nome</td>
					<td>E-mail</td>
					<td>Senha</td>
				</tr>
			</thead>
			<tbody>
				<!--Carrega os registro do ajax -->
			</tbody>
                          </table>
                      </div>
                      <div class="col-12 text-center">
                          <button type="button" class="btn btn-outline-primary carregar-mais">Quero ver mais notícias</button>
                      </div>
                </div>
              </div>
        </section>
      </div>
      <?php include_once '../assets/rodape.php';?>
      <?php include_once '../assets/voltartopo.php';?>
      <?php include_once '../assets/includes/vlibras.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../assets/js/voltartopo.js"></script>
    <script src="../assets/js/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/aos.js"></script>
  </body>
</html>