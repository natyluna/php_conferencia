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

        

        <link rel="stylesheet" href="css/main.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha512-3n19xznO0ubPpSwYCRRBgHh63DrV+bdZfHK52b1esvId4GsfwStQNPJFjeQos2h3JwCmZl0/LgLxSKMAI55hgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="registro">
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
  

<section class="seccion contenedor">
    <h2>Registro de Usuarios</h2>
    <form id="registro" class="registro" action="validar_registro.php" method="post">
        <div id="datos_usuario" class="registro caja clearfix">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre">
            </div>
            <div class="campo">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
            </div>
            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Tu Email">
            </div>
            <div id="error"></div>
        </div> <!--#datos_usuario-->
        
        <div id="paquetes" class="paquetes">
          <h3>Elige el número de boletos</h3>
          <ul class="lista-precios clearfix">
              <li class="card-precios">
                    <div class="tabla-precio">
                        <h3>Pase por día (viernes)</h3>
                        <p class="numero">$30</p>
                        <ul>
                          <li>Bocadillos Gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dia">Boletos deseados:</label>
                            <input type="number" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                        </div>
                    </div>
              </li>
              <li>
                    <div class="tabla-precio">
                        <h3>Todos los días</h3>
                        <p class="numero">$50</p>
                        <ul>
                          <li>Bocadillos Gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_completo">Boletos deseados:</label>
                            <input type="number" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0">
                            <input type="hidden" value="50" name="boletos[completo][precio]">
                        </div>
                    </div>
              </li> 
              
              <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 días (viernes y sábado)</h3>
                        <p class="numero">$45</p>
                        <ul>
                          <li>Bocadillos Gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dosdias">Boletos deseados:</label>
                            <input type="number" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
                            <input type="hidden" value="45" name="boletos[2dias][precio]">
                        </div>
                    </div>
              </li> 
          </ul>
        </div><!--#paquetes-->
        <!--HASTA ACA CONTROLE CON EL DE CONFERENCIA PROPIO-->
        
        <div id="eventos" class="eventos clearfix">
                 <h3>Elige tus talleres</h3>
                 <div class="caja">
                                                   <!--  EVEEENTOS -->
                        
                           <div id="Friday" class="contenido-dia clearfix">
                               <h4>Friday</h4>
                               <!-- accedo a los eventos -->
                                 
                                   <div>
                                         <p>Seminario</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="25" value="25">
                                                <time>10:00:00</time> Diseño UI y UX para móviles                                                <br>
                                                <span class="autor">Susan Sanchez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="10" value="10">
                                                <time>10:00:00</time> Diseño UI y UX para móviles                                                <br>
                                                <span class="autor">Susan Sanchez</span>
                                           </label>
                                                                           </div>
                                 
                                   <div>
                                         <p>Conferencias</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="7" value="7">
                                                <time>10:00:00</time> Como ser freelancer                                                <br>
                                                <span class="autor">Susan Sanchez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="22" value="22">
                                                <time>10:00:00</time> Como ser freelancer                                                <br>
                                                <span class="autor">Susan Sanchez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="8" value="8">
                                                <time>17:00:00</time> Tecnologías del Futuro                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="23" value="23">
                                                <time>17:00:00</time> Tecnologías del Futuro                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="24" value="24">
                                                <time>19:00:00</time> Seguridad en la Web                                                <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="9" value="9">
                                                <time>19:00:00</time> Seguridad en la Web                                                <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                           </div>
                                 
                                   <div>
                                         <p>Talleres </p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="2" value="2">
                                                <time>10:00:00</time> Responsive Web Design                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="17" value="17">
                                                <time>10:00:00</time> Responsive Web Design                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="3" value="3">
                                                <time>12:00:00</time> Flexbox                                                <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="18" value="18">
                                                <time>12:00:00</time> Flexbox                                                <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="4" value="4">
                                                <time>14:00:00</time> HTML5 y CSS3                                                <br>
                                                <span class="autor">Martin Juarez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="19" value="19">
                                                <time>14:00:00</time> HTML5 y CSS3                                                <br>
                                                <span class="autor">Martin Juarez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="5" value="5">
                                                <time>17:00:00</time> Drupal                                                <br>
                                                <span class="autor">Susana Lopez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="20" value="20">
                                                <time>17:00:00</time> Drupal                                                <br>
                                                <span class="autor">Susana Lopez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="6" value="6">
                                                <time>19:00:00</time> WordPress                                                <br>
                                                <span class="autor">Lucas Garcia</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="21" value="21">
                                                <time>19:00:00</time> WordPress                                                <br>
                                                <span class="autor">Lucas Garcia</span>
                                           </label>
                                                                           </div>
                                                          </div> <!--.contenido-dia -->
                       
                           <div id="Saturday" class="contenido-dia clearfix">
                               <h4>Saturday</h4>
                               <!-- accedo a los eventos -->
                                 
                                   <div>
                                         <p>Seminario</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="35" value="35">
                                                <time>10:00:00</time> Aprende a Programar en una mañana                                                <br>
                                                <span class="autor">Martin Juarez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="36" value="36">
                                                <time>17:00:00</time> Diseño UI y UX para móviles                                                <br>
                                                <span class="autor">Lucas Garcia</span>
                                           </label>
                                                                           </div>
                                 
                                   <div>
                                         <p>Conferencias</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="32" value="32">
                                                <time>10:00:00</time> Como crear una tienda online que venda millones en pocos días                                                <br>
                                                <span class="autor">Susan Sanchez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="33" value="33">
                                                <time>17:00:00</time> Los mejores lugares para encontrar trabajo                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="34" value="34">
                                                <time>19:00:00</time> Pasos para crear un negocio rentable                                                 <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                           </div>
                                 
                                   <div>
                                         <p>Talleres </p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="26" value="26">
                                                <time>10:00:00</time> AngularJS                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="12" value="12">
                                                <time>12:00:00</time> PHP y MySQL                                                <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="27" value="27">
                                                <time>12:00:00</time> PHP y MySQL                                                <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="28" value="28">
                                                <time>14:00:00</time> JavaScript Avanzado                                                <br>
                                                <span class="autor">Martin Juarez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="13" value="13">
                                                <time>14:00:00</time> JavaScript Avanzado                                                <br>
                                                <span class="autor">Martin Juarez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="29" value="29">
                                                <time>17:00:00</time> SEO en Google                                                <br>
                                                <span class="autor">Susana Lopez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="14" value="14">
                                                <time>17:00:00</time> SEO en Google                                                <br>
                                                <span class="autor">Susana Lopez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="30" value="30">
                                                <time>19:00:00</time> De Photoshop a HTML5 y CSS3                                                <br>
                                                <span class="autor">Lucas Garcia</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="15" value="15">
                                                <time>19:00:00</time> De Photoshop a HTML5 y CSS3                                                <br>
                                                <span class="autor">Lucas Garcia</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="31" value="31">
                                                <time>21:00:00</time> PHP Intermedio y Avanzado                                                <br>
                                                <span class="autor">Susan Sanchez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="16" value="16">
                                                <time>21:00:00</time> PHP Intermedio y Avanzado                                                <br>
                                                <span class="autor">Susan Sanchez</span>
                                           </label>
                                                                           </div>
                                                          </div> <!--.contenido-dia -->
                       
                           <div id="Sunday" class="contenido-dia clearfix">
                               <h4>Sunday</h4>
                               <!-- accedo a los eventos -->
                                 
                                   <div>
                                         <p>Seminario</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="46" value="46">
                                                <time>17:00:00</time> Creando una App en iOS en una tarde                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                           </div>
                                 
                                   <div>
                                         <p>Conferencias</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="42" value="42">
                                                <time>10:00:00</time> Como hacer Marketing en línea                                                <br>
                                                <span class="autor">Susan Sanchez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="43" value="43">
                                                <time>17:00:00</time> ¿Con que lenguaje debo empezar?                                                <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="44" value="44">
                                                <time>19:00:00</time> Frameworks y librerias Open Source                                                <br>
                                                <span class="autor">Martin Juarez</span>
                                           </label>
                                                                           </div>
                                 
                                   <div>
                                         <p>Talleres </p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="37" value="37">
                                                <time>10:00:00</time> Laravel                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="38" value="38">
                                                <time>12:00:00</time> Crea tu propia API                                                <br>
                                                <span class="autor">Natalia Luna</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="39" value="39">
                                                <time>14:00:00</time> JavaScript y jQuery                                                <br>
                                                <span class="autor">Martin Juarez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="40" value="40">
                                                <time>17:00:00</time> Creando Plantillas para WordPress                                                <br>
                                                <span class="autor">Susana Lopez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="41" value="41">
                                                <time>19:00:00</time> Tiendas Virtuales en Magento                                                <br>
                                                <span class="autor">Lucas Garcia</span>
                                           </label>
                                                                           </div>
                                                          </div> <!--.contenido-dia -->
                       
                           <div id="Wednesday" class="contenido-dia clearfix">
                               <h4>Wednesday</h4>
                               <!-- accedo a los eventos -->
                                 
                                   <div>
                                         <p>Seminario</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="45" value="45">
                                                <time>10:00:00</time> Creando una App en Android                                                 <br>
                                                <span class="autor">Susana Lopez</span>
                                           </label>
                                                                                   <label>
                                                <input type="checkbox" name="registro[]" id="214" value="214">
                                                <time>15:45:00</time> ss                                                <br>
                                                <span class="autor">Lucas Garcia</span>
                                           </label>
                                                                           </div>
                                                          </div> <!--.contenido-dia -->
                       
                           <div id="Monday" class="contenido-dia clearfix">
                               <h4>Monday</h4>
                               <!-- accedo a los eventos -->
                                 
                                   <div>
                                         <p>Conferencias</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="212" value="212">
                                                <time>15:10:00</time> ewew                                                <br>
                                                <span class="autor">Rafael Bautista</span>
                                           </label>
                                                                           </div>
                                                          </div> <!--.contenido-dia -->
                       
                           <div id="Tuesday" class="contenido-dia clearfix">
                               <h4>Tuesday</h4>
                               <!-- accedo a los eventos -->
                                 
                                   <div>
                                         <p>Seminario</p>
                                          <!-- accedo a los talleres -->
                                                                                    <label>
                                                <input type="checkbox" name="registro[]" id="213" value="213">
                                                <time>00:30:00</time> ABC                                                <br>
                                                <span class="autor">Lucas Garcia</span>
                                           </label>
                                                                           </div>
                                                          </div> <!--.contenido-dia -->
                                          </div><!--.caja-->
             </div> <!--#eventos-->
             
             <div id="resumen" class="resumen">
                <h3>Pago y Extras</h3>
                <div class="caja clearfix">
                      <div class="extras">
                            <div class="orden">
                                <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                                <input type="number" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                                <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                            </div> <!--.orden-->
                            <div class="orden">
                                <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                                <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                                <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                            </div> <!--.orden-->
                            <div class="orden">
                                <label for="regalo">Seleccione un regalo</label> <br>
                                <select id="regalo" name="regalo" required>
                                    <option value="">- Seleccione un regalo --</option>
                                    <option value="2">Etiquetas</option>
                                    <option value="1">Pulsera</option>
                                    <option value="3">Plumas</option>
                                </select>
                            </div><!--.orden-->
                            
                            <input type="button" id="calcular" class="button" value="Calcular">
                      </div> <!--.extras-->
                      
                      <div class="total">
                          <p>Resumen:</p>
                          <div id="lista-productos">
                            
                          </div>
                          <p>Total:</p>
                          <div id="suma-total">
                            
                          </div>
                          <input type="hidden" name="total_pedido" id="total_pedido">
                          <input type="hidden" name="total_descuento" id="total_descuento" value="total_descuento">
                          <input id="btnRegistro" type="submit" name="submit" class="button" value="Pagar">
                      </div> <!--.total-->
                </div><!--.caja-->
             </div> <!--#resumen-->
        
    </form>
</section>

<footer class="site-footer">
    <div class="contenedor clearfix">
          <div class="col-md-4 footer-informacion">
              <h3>Sobre <span>gdlwebcamp</span></h3>
              <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
          </div>
          <div class="col-md-4 ultimos-tweets">
                <h3>Últimos <span>tweets</span></h3>
                <a class="twitter-timeline" data-height="400" data-dnt="true" href="https://twitter.com/asaditojs?ref_src=twsrc%5Etfw">Tweets by asaditojs</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
          <div class="col-md-4 menu">
              <h3>Redes <span>sociales</span></h3>
              <nav class="redes-sociales">
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </nav>
          </div>
    </div>
    
    <p class="copyright">
      Todos los derechos Reservados Conferencia NL 2021.
    </p>
  
  <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div style="display: none;">
<div id="mc_embed_signup">
<form action="https://gmail.us5.list-manage.com/subscribe/post?u=17afe45fa93b71b3b533c92e8&amp;id=315806b1fd" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Suscribete a Newsletter </h2>
<div class="indicates-required"><span class="asterisk">*</span>obligatorio</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Correo Electronico<span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_17afe45fa93b71b3b533c92e8_315806b1fd" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
</div>
        
          
</footer>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js" integrity="sha512-WY7Piz2TwYjkLlgxw9DONwf5ixUOBnL3Go+FSdqRxhKlOqx9F+ee/JsablX84YBPLQzUPJsZvV88s8YOJ4S/UA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js" integrity="sha512-9ex1Kp3S7uKHVZmQ44o5qPV6PnP8/kYp8IpUHLDJ+GZ/qpKAqGgEEH7rhYlM4pTOSs/WyHtPubN2UePKTnTSww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="js/main.js"></script>
<script src="js/cotizador.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>

<!--suscripcion pop-up-->

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/17afe45fa93b71b3b533c92e8/ac29ec82b0799bfd19bd02326.js");</script>

  