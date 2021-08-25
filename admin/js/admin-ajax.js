
$(document).ready(function(){
    
    $('#guardar-registro').on('submit', function(e){
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

    //AGREGO ELIMINAR UN ADMIN 
$('.borrar_registro').on('click', function (e) {
    e.preventDefault(); // cancelo la ejecucion
    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');
    // card de confirmacionsweat
    swal({
        title: 'Esta seguro que desea eliminar',
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
                'id': id,
                'registro': 'eliminar'
            },
            url: 'modelo-' + tipo + '.php',
            success: function (data) {
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