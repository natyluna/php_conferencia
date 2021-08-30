<?php

 include_once 'funciones/funciones.php';//conecto a la bd

$nombre_categoria= $_POST['nombre_categoria'];
$icono= $_POST['icono'];
$id_registro= $_POST['id_registro'];
/***********NUEEEEVOOO*******/
if($_POST['registro'] == 'nuevo'){

   try{
    $stmt= $conn->prepare('INSERT INTO categoria_evento (cat_evento, icono) VALUES (? ,?) ');
    $stmt->bind_param("ss", $nombre_categoria, $icono);
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

        $stmt = $conn->prepare('UPDATE categoria_evento SET cat_evento=?, icono=? ,editado=NOW() WHERE id_categoria= ? ');
        $stmt->bind_param("ssi", $nombre_categoria, $icono, $id_registro);

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
        $stmt= $conn->prepare('DELETE FROM categoria_evento WHERE id_categoria= ?');
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