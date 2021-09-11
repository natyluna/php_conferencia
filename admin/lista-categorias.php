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
       Listado de Categorias 
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Organiza las categorias de los eventos </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <!--columnas de las tablas-->
                  <th>Nombre</th>
                  <th>Icono</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            $sql= "SELECT * FROM `categoria_evento`";
                            $resultado= $conn->query($sql);
                        }catch(Exception $e){
                            $error = $e->getMessage();
                            echo $error;
                        } ?>
                        
                        <?php  while($categoria= $resultado->fetch_assoc() ) { ?>
                            <!--un tr por cada admin-->
                            <tr>
                                <td> <?php echo $categoria['cat_evento']; ?></td>
                                <td> <i class="fa <?php echo $categoria['icono']; ?>"></i></td>
                                <td>
                                    <a href="editar-categoria.php?id=<?php echo $categoria['id_categoria']; ?>" class="btn bg-orange btn-flat margin">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="<?php echo $categoria['id_categoria']; ?>" data-tipo="categoria" class="btn btn-danger btn-flat margin borrar-registro">
                                         <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
   
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Icono</th>
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

 


