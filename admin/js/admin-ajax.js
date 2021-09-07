
$(document).ready(function(){
  
    $('#guardar-registro').on('submit', function(e){
        e.preventDefault(); //evito q se abra el archivo del action, solo lo cargo
        
        //para obtener los datos
        var datos = $(this).serializeArray();
        //crea el ajax
        $.ajax({
            //lo leo
            type: $(this).attr('method'),
            //datos a enviar
            data: datos,
            //a donde enviar
            url:$(this).attr('action'),
            dataType:'json',
            //respuesta
            success: function(data){
                var resultado= data;
                if(resultado.respuesta == 'exito'){
                    swal(
                        'Correcto',
                        'Se guardo correctamente',
                        'success'
                    )
                }else{
                    swal(
                        'Error',
                        'hubo un error, no se pudo cargar',
                        'error'
                    )
                }
            }
        })
    });
    /*****GUARDAR ARCHIVOS CON IMAGNEES *****/
    $('#guardar-registro-archivo').on('submit', function(e){
        e.preventDefault(); //evito q se abra el archivo del action, solo lo cargo
        
        //para obtener los datos
        var datos =new FormData(this);
        //crea el ajax
        $.ajax({
            //lo leo
            type: $(this).attr('method'),
            //datos a enviar
            data: datos,
            //a donde enviar
            url:$(this).attr('action'),
            dataType:'json',
            //para las imagenes
            contentType:false,
            processData: false,
            async: true,
            cache: false,
            //respuesta
            success: function(data){
                var resultado= data;
                if(resultado.respuesta == 'exito'){
                    swal(
                        'Correcto',
                        'Se guardo correctamente',
                        'success'
                    )
                }else{
                    swal(
                        'Error',
                        'hubo un error, no se pudo cargar',
                        'error'
                    )
                }
            }
        })
    });
    /***LOGIIN ******/
    $('#login-admin').on('submit', function(e){
        e.preventDefault(); //evito q se abra el archivo del action, solo lo cargo
      
        //para obtener los datos
        var datos = $(this).serializeArray();
        
        //crea el ajax
        $.ajax({
            //lo leo
            type: $(this).attr('method'),
            //datos a enviar
            data: datos,
            //a donde enviar
            url:$(this).attr('action'),
            dataType:'json',
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

    //AGREGO ELIMINAR UN REGISTRO 
$('.borrar-registro').on('click', function (e) {
    e.preventDefault(); // cancelo la ejecucion
    console.log("entre");
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    // card de confirmacionsweat
    swal({
        title: 'Esta seguro que desea eliminar?',
        Text: "registro eliminado",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar'

    }).then(function () {
        $.ajax({
            type: 'post',
            data: {
                id: id,
                registro: 'eliminar'
            },
            url: 'modelo-' + tipo + '.php',
            success: function (data) {
                console.log(data);
                var resultado = JSON.parse(data);
                if(resultado.respuesta == 'exito'){
                    swal(
                        'Eliminado',
                        'registro eliminado',
                        'success'
                    )
                    jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                }else{
                    swal(
                        'Error',
                        'no se pudo eliminar',
                        'error'
                    )
                }
               
            }
        })
    });
});


});