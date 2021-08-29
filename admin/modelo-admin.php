<?php

 include_once 'funciones/funciones.php';//conecto a la bd
//PARA COMPROBAR SI ESTA CONECTADA A LA BASE DE DATOS
/* if($conn->ping()){
    echo "conectado";
}else{
    echo "no conectado";
}  */
//SE UTILIZA PARA TODOS LOS ARCHIVOS
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password= $_POST['password'];
$id_registro= $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
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
 
//***********EDITAR***** */
  if($_POST['registro']=='actualizar'){
   
    $opciones= array(
        'cost'=>12
    );
    try{
        
        $hash_password= password_hash($password, PASSWORD_BCRYPT, $opciones);
        $stmt= $conn->prepare('UPDATE admins SET usuario=?, nombre=?,password=? WHERE id_admin= ?');
        $stmt->bind_param("sssi", $usuario,$nombre,$hash_password,$id_registro);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta= array(
                'respuesta'=> 'exito',
                'id_actualizado'=>$stmt->insert_id
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
   //***********LOGIIIN***** */
    
   if(isset($_POST['login-admin'])){
    $usuarioPost= $_POST['usuario'];
    $passwordPost= $_POST['password'];
    $opciones= array(
        'cost'=>12
    );
   
    try{  
        $stmt= $conn->prepare("SELECT usuario,password,nombre,id_admin FROM admins WHERE usuario=?");
    $stmt->bind_param("s", $usuarioPost);
    //ejecuto el stmt
    $stmt->execute();
    $stmt->bind_result($usuario,$password,$nombre,$id_admin);
    if($stmt->affected_rows){
        $existe = $stmt->fetch();
        if($existe){
            if(password_verify($passwordPost,$password))
            {
                session_start();
                $_SESSION['usuario']= $usuario;
                $_SESSION['nombre']= $nombre;
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