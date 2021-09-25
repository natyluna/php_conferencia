<?php
    // defino un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    // def archivo para cachear (puede ser .php)
	$archivoCache = 'cache/'.$pagina.'.php';
	//  def tiempo q debe estar el archivo almacenado
	$tiempo = 36000;
	// valida que el archivo exista, el tiempo adecuado y lo muestra
	if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
   	include($archivoCache);
    	exit;
	}
	// Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
	ob_start();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" integrity="sha512-Ojqt7YpXqYM6//AdMhErV3ot38rYgGF5QLJEwx7zhesjL9VqfhWiRz/dWK22hsn96RNz0CLl85+pg1P0BmfgVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/leaflet.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">

        <?php
            $archivo = basename($_SERVER['PHP_SELF']);
            $pagina = str_replace(".php", "", $archivo);
            if($pagina == 'invitados' || $pagina == 'index'){
              echo '<link rel="stylesheet" href="css/colorbox.css">';
            } else if($pagina == 'conferencia') {
              echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" integrity="sha512-39cUEe00wnlnuDLBvI4rVDbzYOXdLiAo/CVCjRmVWGQ/arXeqYoC8M1Gj1K3UeX4ZtrsvnjKqOGLq6hGNYDgLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
            }
        ?>


        <link rel="stylesheet" href="css/main.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha512-3n19xznO0ubPpSwYCRRBgHh63DrV+bdZfHK52b1esvId4GsfwStQNPJFjeQos2h3JwCmZl0/LgLxSKMAI55hgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="<?php echo $pagina; ?>">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



        <header class="site-header">
            <div class="hero">
                <div class="contenido-header">
                    <nav class="redes-sociales">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="/gdlwebcampHTML/admin/login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                    </nav>
                    <div class="informacion-evento">
                        <div class="clearfix">
                            <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i> 10-12 Dic</p>
                            <p class="ciudad"><i class="fa fa-map-marker" aria-hidden="true"></i>Catamarca-ARG</p>
                        </div>

                        <h1 class="nombre-sitio">GdlWebCamp</h1>
                        <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
                    </div> <!--.informacion-evento-->
                </div>
            </div><!--.hero-->
        </header>

        <div class="barra">
            <div class="contenedor clearfix">
                <div class="logo">
                    <a href="index.php">
                        <img src="img/logo.svg" alt="logo gdlwebcamp">
                    </a>
                </div>

                <div class="menu-movil">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <nav class="navegacion-principal clearfix">
                    <a href="conferencia.php">Conferencia</a>
                    <a href="calendario.php">Calendario</a>
                    <a href="invitados.php">Invitados</a>
                    <a href="registro.php">Reservaciones</a>
                </nav>
            </div><!--.contenedor-->
        </div> <!--.barra-->
