<?php
 include_once 'funciones/funciones.php';//conecto a la bd
 
//creo las variables 
$titulo= $_POST['titulo_evento'];
$categoria_id= $_POST['categoria_evento'];
$invitado_id= $_POST['invitado'];
//para obtener la fecha
$fecha= $_POST['fecha_evento'];
//formatear la fecha
$fecha_formateada= date('Y-m-d', strtotime($fecha));
$hora= $_POST['hora_evento'];
$id_registro = $_POST['id_registro']; 
/***********NUEEEEVOOO*******/
 if($_POST['registro'] == 'nuevo'){
    
    try{
        $stmt = $conn->prepare("INSERT INTO eventos(nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssii', $titulo, $fecha_formateada, $hora, $categoria_id, $invitado_id);
        $stmt->execute();
       
    
        if ($stmt->affected_rows) {
          
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    }
    catch(Exception $e){
        $respuesta=array(
            'respuesta'=> $e->getMessage()
        );
    }
  die(json_encode($respuesta));
}
 
//***********EDITAR***** */
  if($_POST['registro']=='actualizar'){
   
    
    try{
       
        //compruebo q la clave no este vacia , now para tomar la hora
        if(empty($_POST['password'])){
            $stmt= $conn->prepare('UPDATE admins SET usuario=?, nombre=?, editado= NOW() WHERE id_admin= ? ');
            $stmt->bind_param("ssi", $usuario,$nombre,$id_registro);
        }
        else{
            $opciones= array(
                'cost'=>12
            );
            $hash_password= password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stmt= $conn->prepare('UPDATE admins SET usuario=?, nombre=?,password=?, editado= NOW() WHERE id_admin= ?');
            $stmt->bind_param("sssi", $usuario,$nombre,$hash_password,$id_registro);
        }
       
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

//*******ELIMINAR******* */
if($_POST['registro']=='eliminar'){
    $id_borrar= $_POST['id'];

    try{
        $stmt= $conn->prepare('DELETE FROM admins WHERE id_admin= ?');
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