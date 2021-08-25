<?php
    session_start();
    //para hacer el cerrar sesion
    $cerrar_sesion= $_GET['cerrar_sesion'];
    if($cerrar_sesion){
       session_destroy(); 
    }
    include_once 'template/header.php';
    include_once 'funciones/funciones.php';
    
?>
<!--da el color gris del fondo-->
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>GDL</b>WebCamp</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesión</p>
  
                                                         <!--***CAMBIE  action="crear-admin.php"--> 
    <form name="login-admin-form" id="login" method="post" action="login-admin.php">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <div class="col-xs-12">
            <input type="hidden" name="login-admin" value="1">
          <button type="submit"  class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<?php
    include_once 'template/footer.php';
    
?>

 


