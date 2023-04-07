<?php
include_once '../../config/conexao.php';

if(empty($_GET["noticia"])){
    header("location: ../../noticias");
}else{
    date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    $nomeNoticia = $_GET["noticia"]; 
    $buscaNoticia = mysqli_query($conexao, "SELECT * FROM site_noticias WHERE slug_noticia = '$nomeNoticia'");
    if(mysqli_num_rows($buscaNoticia) > 0){
        $resultadoNoticia = mysqli_fetch_assoc($buscaNoticia);
        $tituloNoticia = $resultadoNoticia["titulo_noticia"];
        $subtituloNoticia = $resultadoNoticia["subtitulo_noticia"];
        $textoNoticia = $resultadoNoticia["texto_noticia"];
        $categoriaNoticia = $resultadoNoticia["categoria_noticia"];
        $imgNoticia = $resultadoNoticia["img_noticia"];
        $dataNoticia = $resultadoNoticia["data_noticia"];
    }else{
       header("location: ../../noticias"); 
    }
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <title>News e Express - FNCC</title>
    <meta name="title" content="News e Express - FNCC">
<meta name="description" content="A FNCC é uma federação constituída para representar o interesse das suas cooperativas associadas junto aos órgãos governamentais, instituições financeiras e entidades de todo o segmento do cooperativismo de crédito, apoiando as suas federadas no desenvolvimento das suas atividades.">
<meta name="keywords" content="fncc,FNCC, federação, federacao, FEDERAÇÃO, FEDERAÇÃO, cooperativa, COOPERATIVA, cooperativas, COOPERATIVAS, crédito, credito, emprestimo, empréstimos, empréstimo,cooperativismo, noticias, são paulo, sao paulo, brasil, consultoria, consultoria técnica, consultoria tecnica, consultoria jurídica, consultoria juridica, normas, normativo, regras, finanças, financeiro, cooperar, gestão, estratégia, estrategia, assitência, parceria, parceiros, ouvidoria, ouvidor, denúncias, atendimento, representação, representatividade, benchmarking, assembleia, processos, capacitação, workshops, foruns, palestras, conecta">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="revisit-after" content="1 day">
<meta name="description" content="Portuguese">
<meta name="author" content="beMK - https://bemktech.com.br">
    <link rel="icon" type="image/png" sizes="512x512" href="../../assets/imagens/icones/fncc-logotipo-colorido.webp">
    <link rel="icon" type="image/png" sizes="48x48" href="../../assets/imagens/icones/fncc-logotipo-colorido.webp">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/imagens/icones/fncc-logotipo-colorido.webp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo:wght@100;200;300;400;500;600;700;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <link href="../../assets/css/menu.css" rel="stylesheet">
    <link href="../../assets/css/voltartopo.css" rel="stylesheet">
    <link href="../../assets/css/aos.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/default.css" rel="stylesheet">
  </head>
  <body>
      <?php require_once '../../assets/menu.php';?>
      <div class="conteudo-tela">
          <div class="topo-telas">
              <div class="container-fluid">
                  <div class="row align-content-center text-center">
                      <div class="col-12" >
                          <h1 class="titulo-topo">NOTÍCIAS</h1>
                          <p class="subtitulo-topo fw-bold"><?php echo $tituloNoticia;?></p>
                      </div>
                  </div>
              </div>
          </div>
          <section class="post-unico espacamento">
              <div class="container">
                  <div class="row mb-4 mt-4">
                      <div class="col-lg-8 col-md-8 col-12">
                          <div class="titulo-post">
                            <h3><?php echo $tituloNoticia;?></h3>  
                        </div>
                          <div class="img-post">
                            <img src="../../assets/imagens/imagens_noticias/<?php echo $imgNoticia;?>" alt="imagem noticia"/>
                        </div>
                    
                      <div class="subtitulo-post mb-3">
                        <h5><?php echo $subtituloNoticia;?></h5> 
                    </div>
                      <div class="texto-post">
                          <p>
<?php echo $textoNoticia;?>
                        </p>
                        <div class="categoria-post">
                            <span class="badge text-bg-primary"><?php echo $categoriaNoticia;?> </span> <span class="float-end data-post"> <?php echo strftime('%d de %b de %Y', strtotime($dataNoticia));?></span> 
                        </div>
                    </div>
                        </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="sticky-top">
                            <div class="titulo-relacionadas">
                              <h6>Notícias Recentes</h6>
                          </div>
                            <div class="relacionadas">
                                <ul>
                                    <?php 
                                    $buscaNoticiasRecentes = mysqli_query($conexao, "SELECT titulo_noticia, slug_noticia FROM site_noticias WHERE slug_noticia != '$nomeNoticia' ORDER BY cod_noticia DESC LIMIT 8");
                                    if(mysqli_num_rows($buscaNoticiasRecentes) > 0 ){
                                        while ($resultadoNoticiaRecente = mysqli_fetch_assoc($buscaNoticiasRecentes)){
                                    ?>
                                  <li>
                                    <a href="https://bemktech.com.br/site-fncc/noticias/news-express/<?php echo $resultadoNoticiaRecente["slug_noticia"];?>">
                                          <?php echo $resultadoNoticiaRecente["titulo_noticia"];?>
                                    </a>
                                  </li>
                                  <?php 
                                        }
                                    }else{
                                  ?>
                                  <li><a href="#">Não há notícias recentes a serem exibidas</a></li>
                                    <?php }?>
                              </ul>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            
        </section>
      </div>
      <?php include_once '../../assets/rodape.php';?>
      <?php include_once '../../assets/voltartopo.php';?>
      <?php include_once '../../assets/includes/vlibras.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../../assets/js/voltartopo.js"></script>
    <script src="../../assets/js/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../../assets/js/aos.js"></script>
  </body>
</html>