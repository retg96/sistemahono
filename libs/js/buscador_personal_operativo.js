$(buscar_datos_operativos());
function buscar_datos_operativos(consulta){
	$.ajax({
		url: 'buscar_tabla_personal_operativo.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos_operativos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

$(document).on('keyup','#search_operativos', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos_operativos(valor);
	}else{
		buscar_datos_operativos();
	}
});











