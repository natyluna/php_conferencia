<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
$id = $_GET['id'];
//validacion: si no es numerico corta la ejecucion
if(!filter_var($id, FILTER_VALIDATE_INT)){
    die('Error');
}
include_once 'template/header.php';
include_once 'template/barra.php';
include_once 'template/navegacion.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Administrador
            <small>editar los datos </small>
        </h1>
    </section>
    <div class="row">
        <div class="col-md-8">
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Administrador</h3>
                    </div>
                    <div class="box-body">
                        <?php
                            $sql= "SELECT * FROM `admins` WHERE `id_admin`= $id";
                            $resultado= $conn->query($sql);
                            $admin= $resultado->fetch_assoc();

                        ?>
                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario:</label>
                                    <!--con el value hago q se autocmplete el campo para editar-->
                                    <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario" value="<?php echo $admin['usuario']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre Completo" value="<?php echo $admin['nombre']; ?>">
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
                            <input type="hidden" name="registro" value="actualizar">
                            <?php $id = $_GET['id']; ?>
                            <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                                <button type="submit" name="actualizar" id="actualizar" class="btn btn-primary" >Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php
$conn->close();

include_once 'template/footer.php';

?>