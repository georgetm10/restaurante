function guardar()
{
	id=$('#id').val();
	NumComensales=$('#NumComensales').val();
	ubicacion=$('#ubicacion').val();

	datos="id="+id+"&NumComensales="+NumComensales+"&ubicacion="+ubicacion+"&accion=guardar";
	$.ajax({
		type:'post',
		url:'../controller/cmesa.php',
		data:datos,
		success:function(ht)
		{
			alert('MESA REGISTRADA');
			limpiar();
		}
	});
	
}
function limpiar()
	{
	
	document.getElementById('NumComensales').value= ""; 
	document.getElementById('ubicacion').value= ""; 
}
	