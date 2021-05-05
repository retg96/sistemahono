function validadias(dias) {


if (confirm("¿Estas seguro de eliminar el registro seleccionado? Todas las materias asociadas a este se eliminarán también")){
    
    	window.location.assign("carrera_borrar.php?id="+dias)
 
    }else{
 
        alert("Operacion cancelada");
 
    }


}
