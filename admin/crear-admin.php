<?php
 include_once 'funciones/sesiones.php';  //SIEMPRE PRIMERO // agrego en toda pag q quiera tener segura
 include_once 'funciones/funciones.php';
include_once 'template/header.php';
include_once 'template/barra.php';
include_once 'template/navegacion.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Crear Administrador
            <small>completa el formulario</small>
        </h1>

    </section>

    <div class="row">
        <div class="col-md-8">


            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Administrador</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario:</label>
                                    <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre Completo">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña para iniciar sesion">
                                </div>
                                <div class="form-group">
                                    <label for="password">Repetir Contraseña:</label>
                                    <input type="password" name="repetir_password" class="form-control" id="repetir_password" placeholder="Contraseña para iniciar sesion">
                                    <span id="resultado_password" class="help-block"></span>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary" id="crear_registro_admin">Aceptar</button>
                            </div>
                        </form>
                    </div>
                   
                </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <?php
    include_once 'template/footer.php';

    ?>