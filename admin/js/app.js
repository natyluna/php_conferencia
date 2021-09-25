$(document).ready(function() {
    $('.sidebar-menu').tree()

    $('#registros').DataTable({
      'paging': true,//muestra la paginacion, los num de pag//
      'pageLength': 10, //cantidad de registros que deseo mostrar
      'lengthChange': false,
      'searching': true,//habilita el buscador
      'ordering': true,
      'info': true,
      'autoWidth': false,
      //para TRADUCIR
      'language':{
        paginate: {
            next: 'Siguiente',
            previous: 'Anterior',
            last: 'Ultimo',
            first: 'Primero'
        },
        info: "Mostrando _START_ a _END_ de _TOTAL_ resultados",
        emptyTable: 'No hay registros', //CUANDO LA TABLA ESTA VACIA 
        infoEmpty: '0 registros',
        search: 'Buscar'
      }
    });
 

  $('#crear_registro_admin').attr('disabled', true);//deshabilito el boton hasta q complete bien los datos
  //PARA VALIDAR LAS CONTRASEÑAS
  $('input#repetir_password').on('input', function(){

    var password_nuevo= $('#password').val(); //valor del password nuevo
    if($(this).val()== password_nuevo){
        $('#resultado_password').text('la clave es correcta');
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#crear_registro_admin').attr('disabled', false); //habilito el btn si las claves coinciden
    }else{
        $('#resultado_password').text('Las claves no coinciden');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('#crear_registro_admin').attr('disabled', true);
    }

});


    //Date picker
    $('#fecha').datepicker({
      autoclose: true
    });
     //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  });
   //Initialize Select2 Elements
 $('.seleccionar').select2();

 $('#icono').iconpicker();
 
 $.getJSON('servicio-registrados.php', function(data){
    //EJECUTA EL GRAFICO DE LINE CHART
  var line = new Morris.Line({
    element: 'grafica-registros',
    resize: true,
    data: data,
    xkey: 'fecha',
    ykeys: ['cantidad'],
    labels: ['Item 1'],
    lineColors: ['#3c8dbc'],
    hideHover: 'auto'
  });
 });
  

 //CHECKBOX DE color
 $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})
});
 

 