$(document).ready(function(){  
    var form_count = 1, previous_form, next_form, total_forms;
    total_forms = $("fieldset").length;  
    $(".next-form").click(function(){
      previous_form = $(this).parent();
      next_form = $(this).parent().next();
      next_form.show();
      previous_form.hide();
      setProgressBarValue(++form_count);
    });  
    $(".previous-form").click(function(){
      previous_form = $(this).parent();
      next_form = $(this).parent().prev();
      next_form.show();
      previous_form.hide();
      setProgressBarValue(--form_count);
    });
    setProgressBarValue(form_count);  
    function setProgressBarValue(value){
      var percent = parseFloat(100 / total_forms) * value;
      percent = percent.toFixed();
      $(".progress-bar")
        .css("width",percent+"%")
        .html(percent+"%");   
    } 
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
      if(!$("#Nac").val()) {
        error_message+="<br>Please Fill Nacionalidad";
      }
      if(!$("#Sex").val()) {
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
      if(!$("#numExt").val()) {
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