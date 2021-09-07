<?php

 include_once 'funciones/funciones.php';//conecto a la bd

 $nombre= $_POST['nombre'];
 $apellido= $_POST['apellido'];
 $email= $_POST['email'];
 //carga los boletos
 $boletos_adquiridos= $_POST['boletos'];
//carga camisaas
 $camisas= $_POST['pedido_extra']['camisas']['cantidad'];
 //carga etiquetas
 $etiquetas= $_POST['pedido_extra']['etiquetas']['cantidad'];

 $pedido= productos_json($boletos_adquiridos, $camisas,$etiquetas);

 $total= $_POST['total_pedido'];
 $regalo= $_POST['regalo'];
 $eventos= $_POST['registro_evento'];
 $registro_eventos= eventos_json($eventos);
 
 $fecha_registro= $_POST['fecha_registro'];
 $id_registro = $_POST['id_registro'];
/***********NUEEEEVOOO*******/
if($_POST['registro'] == 'nuevo'){
    
   try{
    $stmt= $conn->prepare("INSERT INTO registrados( nombre_registrado,apellido_registrado,email_registrado, fecha_registro,pases_articulos, talleres_registrados,regalo, total_pagado, pagado) VALUES (? ,?, ?, NOW(), ?, ?, ?, ?, 1 )");//saco el nombre regalo
    $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
    $stmt->execute();
    $id_insertado= $stmt->insert_id;
    if($stmt->affected_rows){
        $respuesta = array(
            'respuesta'=> 'exito',
            'id_insertado'=> $id_insertado
        );
    }else{
        $respuesta = array(
            'respuesta'=> 'error'
            
        );
    }
    $stmt->close();
    $conn->close();

   }catch(Exception $e){
       echo "Error: " .$e->getMessage();
   }
   
   die(json_encode($respuesta));
}
 
//***********EDITAR***** */
  if($_POST['registro']=='actualizar'){

    try {

        $stmt = $conn->prepare('UPDATE registrados SET nombre_registrado=?, apellido_registrado=? , email_registrado=?, fecha_registro=? , pases_articulos=?, talleres_registrados=?, regalo=?, total_pagado=?, pagado=1 WHERE ID_Registrado= ? ');
        $stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total , $id_registro);

        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta= array(
                'respuesta'=> 'exito',
                'id_actualizado'=>$id_registro
            );
        }else{
            $respuesta=array(
                'respuesta' =>'error'
            );
        }
        $stmt->close();
        $conn->close();
    }catch(Exception $e){
        $respuesta=array(
            'respuesta'=>$e->getMessage()
        );
    }
   die(json_encode($respuesta));
};

//*******ELIMINAR******* */
if($_POST['registro']=='eliminar'){
    $id_borrar= $_POST['id'];

    try{
        $stmt= $conn->prepare('DELETE FROM registrados WHERE ID_Registrado= ?');
        $stmt-> bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta=array(
                'respuesta'=> 'exito',
                'id_eliminado'=> $id_borrar
            );
        }else{
            $respuesta=array(
                'respuesta'=> 'error'
            );
        }
        
    }catch(Exception $e){
        $respuesta=array(
            'respuesta'=>$e->getMessage()
        );
    }
    
    die(json_encode($respuesta));
}

//***********LOGIIIN***** */
    

if(isset($_POST['login-admin'])){
    $usuarioPost= $_POST['usuario'];
    $passwordPost= $_POST['password'];
    $opciones= array(
        'cost'=>12
    );
   
    try{  
        $stmt= $conn->prepare("SELECT usuario,password,nombre,id_admin,editado,nivel FROM admins WHERE usuario=?");
    $stmt->bind_param("s", $usuarioPost);
    //ejecuto el stmt
    $stmt->execute();
    $stmt->bind_result($usuario,$password,$nombre,$id_admin,$editado,$nivel);
    if($stmt->affected_rows){
        $existe = $stmt->fetch();
        if($existe){
            if(password_verify($passwordPost,$password))
            {
                session_start();
                $_SESSION['usuario']= $usuario;
                $_SESSION['nombre']= $nombre;
                $_SESSION['nivel']= $nivel;
                $_SESSION['id']= $id_admin;
                $respuesta= array(
                    'respuesta'=>'exitoso',
                    'usuario'=> $nombre
                );
                die(json_encode($respuesta));
            }
            else{
                $respuesta= array(
                    'respuesta'=>'error' 
                );
            }
        }
        else
        {
            $respuesta= array(
                'respuesta'=>'error'
            );
        }
        $stmt->close();
        $conn->close();
    }
    }catch(Exception $e){
        echo "Error: " .$e->getMessage();
    }
   
  }