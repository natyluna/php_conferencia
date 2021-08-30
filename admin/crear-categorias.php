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
            Crear Categorias de Eventos
            <small>completa el formulario para agregar una categoria</small>
        </h1>

    </section>

    <div class="row">
        <div class="col-md-8">


            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Categoria</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Nombre:</label>
                                    <input type="text" name="nombre_categoria" class="form-control" id="nombre_categoria" placeholder="Categoria">
                                </div>
                                <div class="form-group">
                                   <label for="">Icono:</label>
                                   <div class="input-group">
                                       <div class="input-group-addon">
                                           <i class="fa fa-address-book"></i>
                                       </div>
                                       <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icono">
                                   </div>
                                </div>
                            

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary" id="crear_registro">Aceptar</button>
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