<?php include_once 'funciones/sesiones.php';  //SIEMPRE PRIMERO // agrego en toda pag q quiera tener segura
include_once 'funciones/funciones.php';

$sql= "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY (fecha_registro) ORDER BY fecha_registro ";

$resultado= $conn->query($sql);

$arreglo_registros= array();

while($registro_dia = $resultado->fetch_assoc()){
   $fecha= $registro_dia['fecha_registro'];
   $registro['fecha']= date('Y-m-d', strtotime($fecha));
   //convierto la fecha
   $registro['cantidad']= $registro_dia['resultado'];

//enlazo con el arreglo de afuera
    $arreglo_registros[]= $registro;
}

echo json_encode($arreglo_registros);

?>