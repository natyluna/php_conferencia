/* $(document).ready(function(){

    $('#login-admin').on('submit', function(e){
        e.preventDefault(); //evito q se abra el archivo, solo lo cargo
    
        //para obtener los datos
        var datos = $(this).serializeArray();
        //crea el ajax
        $.ajax({
            type: $(this).attr('method'),
            //datos a enviar
            data: datos,
            //a donde enviar
            url:$(this).attr('action'),
            dataType:'json',
            //respuesta
            success: function(data){
                console.log(data);
                var resultado= data;
                if(resultado.respuesta == 'exitoso'){
                    swal(
                        'Login Correcto',
                        'Bienvenido/a ' + resultado.usuario+' !! ',
                        'success'
                    )
                    //redirecciono, espera un tiempo antes de ejecutarse
                    setTimeout(function(){
                       window.location.href = 'admin-area.php';
                    }, 2000);
                }else{
                    swal(
                        'Error',
                        'Usuario o Password Incorrectos',
                        'error'
                    )
                }
                
            }
        })
    });
}); */