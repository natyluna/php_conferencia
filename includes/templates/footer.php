<footer class="site-footer">
    <div class="contenedor clearfix">
          <div class="footer-informacion">
              <h3>Sobre <span>gdlwebcamp</span></h3>
              <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
          </div>
          <div class="ultimos-tweets">
                <h3>Últimos <span>tweets</span></h3>
                <ul>
                    <li>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa veniam nam recusandae animi id amet temporibus dolor modi esse laboriosam sit voluptate nostrum quae, alias doloribus excepturi delectus vel. Dolorem?
                    </li>
                    <li>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, molestiae! Qui explicabo sit cumque quaerat, repellat deleniti animi doloremque numquam! Ex commodi repudiandae neque, eveniet facere obcaecati ratione. Laborum, possimus?
                    </li>
            
                </ul>
            </div>
          <div class="menu">
              <h3>Redes <span>sociales</span></h3>
              <nav class="redes-sociales">
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </nav>
          </div>
    </div>
    
    <p class="copyright">
      Todos los derechos Reservados GDLWEBCAMP NL 2021.
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
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.lettering.js"></script>

<?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<script src="js/jquery.colorbox-min.js"></script>';
      echo '<script src="js/jquery.waypoints.min.js"></script>';
      echo '<script src="js/leaflet.js"></script>
      ';
    } else if($pagina == 'conferencia') {
      echo '<script src="js/lightbox.js"></script>';
    }        
?>
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

//suscripcion pop-up

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/17afe45fa93b71b3b533c92e8/ac29ec82b0799bfd19bd02326.js");</script>


</body>
</html>