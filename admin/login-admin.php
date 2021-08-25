<?php 
if(isset($_POST['login-admin'])){
    $usuario= $_POST['usuario'];
    $password= $_POST['password'];

    try{
        include_once 'funciones/funciones.php';//conecto a la bd
        $stmt= $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
        $stmt->bind_param("s", $usuario );
        $stmt->execute(); 
       //regresa el rdo// 
        $stmt-> bind_result($id_admin, $usuario, $nombre, $password,$editado);

        if($stmt->affected_rows){
            $existe= $stmt->fetch();//guardo los valores
            if($existe){
               if(password_verify($password, $password_admin)){
                   session_start();
                   $_SESSION['usuario']= $usuario;
                   $_SESSION['nombre']= $nombre;
                   
                    $respuesta= array(
                        'respuesta'=> 'exito',//exitoso//
                        'usuario'=> $usuario
                    );
               }
               else{
                   $respuesta= array(
                        'respuesta'=> 'error'
                   );
               }
            }else{
                $respuesta= array(
                    'respuesta' => 'error'
                );
            }
        }
        $stmt->close();
        $conn->close();
    }catch(Exception $e){
        $respuesta= array(
        'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));

    
}