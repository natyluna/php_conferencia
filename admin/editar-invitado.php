<?php

$id= $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)){
    die('Error');
} 

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
            Crear Invitados
            <small>completa el formulario para agregar un invitado</small>
        </h1>

    </section>

    <div class="row">
        <div class="col-md-8">


            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Invitado</h3>
                    </div>
                    <div class="box-body">

                    <?php
                         $sql= "SELECT * FROM invitados WHERE invitado_id =$id ";
                         $resultado= $conn->query($sql);
                         $invitado= $resultado->fetch_assoc();

                    ?>
                        <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-invitado.php" enctype="multipart/form-data"> <!--enctype SIEMPREEE QUE QUIERE SUBIR IMG--> 
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre_invitado">Nombre:</label>
                                    <input type="text" name="nombre_invitado" class="form-control" id="nombre_invitado" placeholder="nombre" value="<?php echo $invitado['nombre_invitado']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="apellido_invitado">Apellido:</label>
                                    <input type="text" name="apellido_invitado" class="form-control" id="apellido_invitado" placeholder="apellido" 
                                    value="<?php echo $invitado['apellido_invitado']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="biografia_invitado">Biografia: </label>
                                    <textarea class="form-control" id="biografia_invitado" name="biografia_invitado" rows="8" placeholder="Biografia"><?php echo $invitado['descripcion']; ?></textarea>
                                </div>
                                <!--PARA VER QUE IMG TIENE CARGADA-->
                                <div class="form-group">
                                    <label for="imagen_actual">Imagen Actual</label>
                                    <br>
                                    <img src="../img/invitados/<?php echo $invitado['url_imagen']; ?>" width="150">
                                </div>
                                <div class="form-group">
                                    <label for="imagen_invitado">Imagen:</label>
                                    <input class="form-control" type="file" id="imagen_invitado" name="archivo_imagen">

                                    <p class="help-block">Adjuntar imagen</p>
                                </div>


                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="actualizar">
                                <input type="hidden" name="id_registro" value="<?php echo $invitado['invitado_id']; ?>">
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