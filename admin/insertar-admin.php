<?php
 include_once 'funciones/funciones.php';//conecto a la bd
//PARA COMPROBAR SI ESTA CONECTADA A LA BASE DE DATOS
/* if($conn->ping()){
    echo "conectado";
}else{
    echo "no conectado";
}  */

if(isset($_POST['agregar-admin'])){
    $usuario = $_POST['usuario'];
  $nombre = $_POST['nombre'];
  $password= $_POST['password'];

   //creo las opciones
   $opciones= array(
    'cost'=>12
    );
   //para encriptar el password
   $password_hashed= password_hash($password, PASSWORD_BCRYPT, $opciones);

   try{
    $stmt= $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?,?,?)");
    $stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
    //ejecuto el stmt
    $stmt->execute(); 
    //inserto una rta
    $id_registro= $stmt->insert_id;
    if( $id_registro>0){
        $respuesta= array(
            'respuesta'=> 'exito',
            'id_admin'=>$id_registro //regresa la info
        );
    }else{
        $respuesta= array(
            'respuesta'=> 'error, no se cargo',
            
        );
    }
    $stmt->close();
    $conn->close();

   }catch(Exception $e){
       echo "Error: " .$e->getMessage();
   }
   die(json_encode($respuesta));
}

   //***********LOGIIIN***** */
    
   if(isset($_POST['login-admin'])){
  
    $usuarioPost= $_POST['usuario'];
    $passwordPost= $_POST['password'];
    try{
        include_once 'funciones/funciones.php';
        $stmt= $conn->prepare("SELECT usuario,password,nombre,id_admin FROM admins WHERE usuario=?;");
    $stmt->bind_param("s", $usuarioPost);
    //ejecuto el stmt
    $stmt->execute();
    $stmt->bind_result($usuario,$password,$nombre,$id_admin);
    if($stmt->affected_rows){
        $existe = $stmt->fetch();
        if($existe){
           
            if(password_verify($passwordPost, $password)){
               
                $respuesta= array(
                    'respuesta'=>'exitoso',
                    'usuario'=> $nombre,
                );
                die(json_encode($respuesta));
            }else{
                $respuesta= array(
                    'respuesta'=>'clave incorrecta'
                    
                );
            }
           
        }else{
            $respuesta= array(
                'respuesta'=>'no existe'
            );
        }
    }
    }catch(Exception $e){
        echo "Error: " .$e->getMessage();
    }
    die(json_encode($respuesta));
  }