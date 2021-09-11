<?php
include_once 'funciones/sesiones.php'; //SIEMPRE PRIMERO // agrego en toda pag q quiera tener segura
include_once 'funciones/funciones.php';
include_once 'template/header.php';
include_once 'template/barra.php';
include_once 'template/navegacion.php';
?>


<div class="content-wrapper">

    <section class="content-header">
        <h1>Dashboard
            <small>
                Informacion sobre los eventos
            </small>
        </h1>
        <br>
    </section>
    <section class="content">
    <!-- LINE CHART cargo datos en app.js-->
        <div class="row">
            <div class="box-body chart-responsive">
              <div class="chart" id="grafica-registros" style="height: 300px;"></div>
            </div>
        </div>
            
        <h2 class="page-header">Resumen de Registros </h2>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <?php
                $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados ";
                $resultado = $conn->query($sql);
                $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $registrados['registros'];  ?></h3>

                        <p>Total Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div> <!-- cierra el primero -->

            <!--  segundo widget -->
            <div class="col-lg-3 col-xs-6">
                <?php
                $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE pagado=1";
                $resultado = $conn->query($sql);
                $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $registrados['registros'];  ?></h3>

                        <p>Total Pagados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div> <!-- cierra segundo -->

            <!-- tercer widget -->
            <div class="col-lg-3 col-xs-6">
                <?php
                $sql = "SELECT (ID_Registrado) AS registros FROM registrados WHERE pagado=0";
                $resultado = $conn->query($sql);
                $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php if ($registrados['registros'] == '') {
                                echo "0";
                            } else {
                                echo $registrados['registros'];
                            } ?></h3>

                        <p>Sin Pagar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-times"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div> <!-- cierra tercero -->

            <div class="col-lg-3 col-xs-6">
                <?php
                $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado=1";
                $resultado = $conn->query($sql);
                $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $registrados['ganancias'];  ?></h3>

                        <p>Ganancias Totales</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-usd"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div> <!-- cierra cuaarto -->
            </div>

            <h2 class="page-header">Regalos </h2>
            <div class="col-lg-3 col-xs-6">
                <?php
                $sql = "SELECT COUNT(total_pagado) AS Pulseras FROM registrados WHERE regalo =1";
                $resultado = $conn->query($sql);
                $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-purple-active">
                    <div class="inner">
                        <h3><?php echo $regalo['Pulseras'];  ?></h3>

                        <p>Pulseras</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div> <!-- cierra cuaarto -->
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php
                $sql = "SELECT COUNT(total_pagado) AS Etiquetas FROM registrados WHERE regalo =2";
                $resultado = $conn->query($sql);
                $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?php echo $regalo['Etiquetas'];  ?></h3>

                        <p>Etiquetas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div> <!-- cierra cuaarto -->
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php
                $sql = "SELECT COUNT(total_pagado) AS Plumas FROM registrados WHERE regalo =3";
                $resultado = $conn->query($sql);
                $regalo = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3><?php echo $regalo['Plumas'];  ?></h3>

                        <p>Plumas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div> <!-- cierra cuaarto -->
            </div>
            
        </div> <!-- cierra row -->

    </section>
</div>



</div> <!-- cierra conten -->


<?php
include_once 'template/footer.php';

?>

