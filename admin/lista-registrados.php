<?php
include_once 'funciones/sesiones.php'; ///SIEMPRE PRIMERO // agrego en toda pag q quiera tener segura
include_once 'funciones/funciones.php';
include_once 'template/header.php';
include_once 'template/barra.php';
include_once 'template/navegacion.php';
?>


  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Registrados
          <small>Aquí podrás ver todos los registrados</small>
        </h1>


      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Todos los registrados</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <a href="crear-registro.php" class="btn btn-success">Añadir Nuevo</a>
                <table id="registros" class="table table-bordered table-hover">
                  <thead>
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
                  </thead>
                  <tbody>

                    <?php
                    try {
                      $sql = "SELECT * FROM registrados";
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                    }
                    while ($registrados = $resultado->fetch_assoc()) { ?>
                      <tr>
                        <td>
                          <?php echo $registrados['nombre_registrado'] . " " . $registrados['apellido_registrado'];
                          $pagado = $registrados['pagado'];
                          if ($pagado) :
                            echo '<span class="badge bg-green">Pagado</span>';
                          else :
                            echo '<span class="badge bg-red">No Pagado</span>';
                          endif;
                          ?>
                        </td>
                        <td><?php echo $registrados['email_registrado']; ?></td>
                        <td><?php echo $registrados['fecha_registro']; ?></td>
                        <td>
                          <?php
                          $articulos = json_decode($registrados['pases_articulos'], true);
                          $arreglo_articulos = array(
                            'un_dia' => 'Pase 1 día',
                            'pase_2dias' => 'Pase 2 días',
                            'pase_completo' => 'Pase 3 días',
                            'camisas' => 'Camisas',
                            'etiquetas' => 'Etiquetas'
                          );
                          foreach ($articulos as $llave => $articulo) {

                            if (array_key_exists('cantidad', $articulo)) {

                              echo $articulo['cantidad'] . " " .  $arreglo_articulos[$llave] . "<br>";
                            } else {
                              echo $articulo . " " .  $arreglo_articulos[$llave] . "<br>";
                            }
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          $eventos_resultado = $registrados['talleres_registrados'];
                          $talleres = json_decode($eventos_resultado, true);

                          $talleres = implode("', '", $talleres['eventos']);


                          $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE evento_id IN  ('$talleres') OR clave IN ('$talleres')  ";
                          // echo $sql_talleres;
                          $resultado_talleres =  $conn->query($sql_talleres);



                          while ($eventos = $resultado_talleres->fetch_assoc()) {
                            echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "<br>";
                          }
                          ?>
                        </td>
                        <td><?php echo $registrados['regalo']; ?></td>
                        <td>$ <?php echo (float)$registrados['total_pagado']; ?></td>

                        <td>
                          <a href="editar-registro.php?id=<?php echo $registrados['ID_Registrado']; ?>" class="btn bg-orange btn-flat margin">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a data-id="<?php echo $registrados['ID_Registrado']; ?>" data-tipo="categoria" class="btn btn-danger btn-flat margin borrar-registro">
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

    </div>
    <?php
    $conn->close();
    include_once 'templates/footer.php';
    include_once 'templates/footer-scripts.php';


    ?>