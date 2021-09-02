<?php
    include_once 'funciones/sesiones.php'; ///SIEMPRE PRIMERO // agrego en toda pag q quiera tener segura
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
       Listado de Registrados 
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Organiza las personas registradas </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <!--columnas de las tablas-->
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha Registro</th>
                  <th>Articulos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            $sql= "SELECT * FROM registrados.* regalos.nombre_regalo, FROM registrados ";
                            $sql .= "JOIN regalos ";
                            $sql .= "ON registrados.regalo = regalo.ID_regalo";
                           
                            $resultado= $conn->query($sql);
                        }catch(Exception $e){
                            $error = $e->getMessage();
                            echo $error;
                        } ?>
                        
                        <?php  while($registrados= $resultado->fetch_assoc() ) { ?>
                            <!--un tr por cada admin-->
                            <tr>
                                <td> 
                                    <?php echo $registrados['nombre_registrado'] . " " . $registrados['apellido_registrado'];
                                        $pagado= $registrados['pagado'];
                                        if($pagado){
                                            echo '<span class="badge bf-green">Pagado</span>';
                                        }else{
                                            echo '<span class="badge bf-red">No Pagado</span>';
                                        }
                                 ?>
                                 </td>
                                <td> <?php echo $registrados['email_registrado']; ?></td>
                                <td> <?php echo $registrados['fecha_registro']; ?></td>
                                <td> <?php echo $registrados['pases_articulos']; ?></td>
                                <td> <?php echo $registrados['talleres_registrados']; ?></td>
                                <td> <?php echo $registrados['nombre_regalo']; ?></td>
                                <td> $<?php echo $registrados['total_pagado']; ?></td>
                                <td>
                                    <a href="editar-registro.php?id=<?php echo $registrados['ID_Registrado']; ?>" class="btn bg-orange btn-flat margin">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="<?php echo $registrados['ID_Registrado']; ?>" data-tipo="registrado" class="btn btn-danger btn-flat margin borrar-registro">
                                         <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                
                            </tr>
                            <?php } ?>
   
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha Registro</th>
                  <th>Articulos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include_once 'template/footer.php';
    
?>

 


