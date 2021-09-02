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
            Crear Registros 
            <small>completa el formulario para agregar un registro</small>
        </h1>

    </section>

    <div class="row">
        <div class="col-md-8">


            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Registro</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                      
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
                                </div> <!-- fin form-gropu -->
                              
                            <div class="form-group">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Elige los talleres</h3>
                                </div>
                                <div id="eventos" class="eventos clearfix">
                 <h3>Elige tus talleres</h3>
                 <div class="caja">
                        <?php
                            try {
                                /* require_once('includes/funciones/bd_conexion.php'); */
                                $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                                $sql .= " FROM eventos ";
                                $sql .= " JOIN categoria_evento ";
                                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                                $sql .= " JOIN invitados ";
                                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                                $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";
                                //echo $sql;
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            
                            $eventos_dias = array();
                            while($eventos = $resultado->fetch_assoc()) {
                                
                                $fecha = $eventos['fecha_evento'];
                                setlocale(LC_ALL, 'es_ES');
                                $dia_semana = strftime("%A", strtotime($fecha));
                                
                                $categoria = $eventos['cat_evento'];
                                $dia = array(
                                    'nombre_evento' => $eventos['nombre_evento'],
                                    'hora' => $eventos['hora_evento'],
                                    'id' => $eventos['evento_id'],
                                    'nombre_invitado' => $eventos['nombre_invitado'],
                                    'apellido_invitado' => $eventos['apellido_invitado']
                                );
                                $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                            }
                
                        
                        ?>
                     
                        <?php foreach($eventos_dias as $dia => $eventos) {?>

                           <div id="<?php echo str_replace('á', 'a', $dia); ?>" class="contenido-dia clearfix">
                               <h4><?php echo $dia; ?></h4>
                               
                               <?php foreach($eventos['eventos'] as $tipo => $evento_dia): ?>  
                                   <div>
                                         <p><?php echo $tipo; ?></p>
                                       
                                         <?php foreach($evento_dia as $evento) { ?>
                                           <label>
                                                <input type="checkbox" name="registro[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                                <time><?php echo $evento['hora']; ?></time> <?php echo $evento['nombre_evento']; ?>
                                                <br>
                                                <span class="autor"><?php echo $evento['nombre_invitado'] . " "  . $evento['apellido_invitado']; ?></span>
                                           </label>
                                        <?php } //foreach ?>
                                   </div>
                               <?php endforeach; ?>
                           </div> <!--.contenido-dia -->
                       <?php  } ?>
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