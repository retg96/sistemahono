$(document).ready(function(){  
    var form_count = 1, previous_form, next_form, total_forms;
    total_forms = $("fieldset").length;  
    $(".next-form").click(function(){
      previous_form = $(this).parent();
      next_form = $(this).parent().next();
      next_form.show();
      previous_form.hide();
      // setProgressBarValue(++form_count);
    });  
    $(".previous-form").click(function(){
      previous_form = $(this).parent();
      next_form = $(this).parent().prev();
      next_form.show();
      previous_form.hide();
      setProgressBarValue(--form_count);
    });
    // Handle form submit and validation
    $( "#register_form" ).submit(function(event) {    
      var error_message = '';
      if(!$("#sie").val()) {
        error_message+="Please Fill SIE Input";
    }
      if(!$("#nombre").val()) {
          error_message+="Please Fill Name Input";
      }
      if(!$("#apPat").val()) {
          error_message+="<br>Please Fill Apellido Paterno";
      }
      if(!$("#apMat").val()) {
          error_message+="<br>Please Fill Apellido Paterno";
      }
      if(!$("#titAbre").val()) {
        error_message+="<br>Please Fill Titulo Abreviado";
      }
      if(!$("#fecNac").val()) {
        error_message+="<br>Please Fill Fecha Nacimiento";
      }
      if(!$("#nacionalidad").find(":selected").text()) {
        error_message+="<br>Please Fill Nacionalidad";
      }

      if(!$("#sexo").val()) {
        error_message+="<br>Please Fill Sexo";
      }
      if(!$("#rfc").val()) {
        error_message+="<br>Please Fill RFC";
      }
      if(!$("#curp").val()) {
        error_message+="<br>Please Fill CURP";
      }
      if(!$("#mobile").val()) {
        error_message+="<br>Please Fill Mobile";
      }
      if(!$("#address").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#numExt").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#numInt").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#fracc").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#cp").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#ciudad").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#estado").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#email").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#nivelEstudio").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#profe").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#funcion").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#regimen").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#interno").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#claveP").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#tipopersona").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#areaacademica").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#departamento").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#evaluacionDepartamento").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#evaluacionAlumno").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#gobiernoF").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#sep").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#rama").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#sni").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#fecIng").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }
      if(!$("#estatus").val()) {
        error_message+="<br>Please Fill Numero Exterior";
      }


      // Display error if any else submit form
      if(error_message) {
          $('.alert-success').removeClass('hide').html(error_message);
          return false;
      } else {
          return true;	
      }    
    });  
  });