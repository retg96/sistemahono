function ConfirmBorrarCarrera(id) {
		  
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? Todas las materias asociadas a este se eliminarán también")){
    
    	window.location.assign("carrera_borrar.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarMateria(id) {
		  
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? ")){
    
    	window.location.assign("materia_borrar.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}

function ConfirmBorrarSubdireccion(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? ")){
    
        window.location.assign("subdireccion_borrar.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}

function ConfirmBorrarDepartamento(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? ")){
    
        window.location.assign("departamento_borrar.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}


function ConfirmBorrarUsuario(id) {
          
    if (confirm("¿Estas seguro de eliminar este usuario seleccionado? ")){
    
        window.location.assign("usuario_borrar.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}

function ConfirmBorrarHorario(horario,nosie) {
          
    if (confirm("¿Estas seguro de eliminar el registro del horario seleccionado? ")){
    
       window.location.assign("horario_borrar.php" + "?horario=" + horario + "&nosie=" + nosie)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}

function ConfirmBorrarHorarioOperativo(horario,idconvenio) {
          
    if (confirm("¿Estas seguro de eliminar el registro del horario seleccionado? ")){
    
       window.location.assign("horario_operativo_borrar.php" + "?horario=" + horario + "&idconvenio=" + idconvenio)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}

function ConfirmBorrarPersonalOperativo(id) {
          
    if (confirm("¿Estas seguro de eliminar el personal operativo seleccionado? ")){
    
       window.location.assign("eliminar_personal_operativo.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}


function ConfirmBorrarPersonal(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro <"+id+">? Todas la informacion a este se eliminarán también")){
    
        window.location.assign("eliminar_personal.php?id="+id);
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}

function ConfirmBorrarConvenio(id,idpersonal) {
          
    if (confirm("¿Estas seguro de eliminar el registro <"+id+">? Todas la informacion a este se eliminarán también")){
    
        window.location.assign("eliminar_convenio.php?id="+id+"&idpersonal="+idpersonal);
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}

function ConfirmBorrarFechaNoPago(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? ")){
    
        window.location.assign("eliminar_fecha_no_pago.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}

function ConfirmBorrarFechaPago(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? ")){
    
        window.location.assign("eliminar_fecha_pago.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}




function ConfirmBorrarPuesto(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla puesto")){
    
        window.location.assign("eliminar_puesto.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarAreaAcademica(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla de área académica")){
    
        window.location.assign("eliminar_area_academica.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarGrupoJerarquico(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla de grupo jerarquico")){
    
        window.location.assign("eliminar_grupo_jerarquico.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarModalidad(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla modalidad")){
    
        window.location.assign("eliminar_modalidad.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarAusencia(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla motivo de ausencia")){
    
        window.location.assign("eliminar_motivo_ausencia.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarNacionalidad(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla nacionalidad")){
    
        window.location.assign("eliminar_nacionalidad.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarNivelEstudio(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla nivel de estudios")){
    
        window.location.assign("eliminar_nivel_estudio.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarRegimen(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla régimen")){
    
        window.location.assign("eliminar_regimen.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarSNI(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla tipo de SNI")){
    
        window.location.assign("eliminar_SNI.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarTipoCarrera(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla tipo de carrera")){
    
        window.location.assign("eliminar_tipo_carrera.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarTipoPersona(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro "+id+" de la tabla tipo de persona")){
    
        window.location.assign("eliminar_tipo_persona.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarSemestre(id) {
          
    if (confirm("¿Estas seguro de eliminar el semestre con el id "+id)){
    
        window.location.assign("eliminar_semestre.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarConvenioOperativo(id,idpersonal) {
          
    if (confirm("¿Estas seguro de eliminar el registro <"+id+">? Todas la informacion a este se eliminarán también")){
    
        window.location.assign("eliminar_convenio_operativo.php?id="+id+"&idpersonaloperativo="+idpersonal);
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarFechaPagoOperativo(id,idconvenio) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? "+id)){
    
        window.location.assign("eliminar_fecha_pago_operativo.php?id="+id+"&idconvenio="+idconvenio)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarFechaNoPagoOperativo(id,idconvenio) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? "+id)){
    
        window.location.assign("eliminar_fecha_no_pago_operativo.php?id="+id+"&idconvenio="+idconvenio)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarFormatoConvenio(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? "+id)){
    
        window.location.assign("eliminar_formato_convenio.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
function ConfirmBorrarPeriodoPago(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? "+id)){
    
        window.location.assign("eliminar_periodo_pago.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}


function ConfirmBorrarRangoNoPago(id) {
          
    if (confirm("¿Estas seguro de eliminar el registro seleccionado? "+id)){
    
        window.location.assign("eliminar_periodo_no_pago.php?id="+id)
 
    }else{
 
        alert("Operacion cancelada");
 
    }
}
