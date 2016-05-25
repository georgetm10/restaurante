function guardar()
{
	id=$('#id').val();
	nombre=$('#nombre').val();
	apellido1=$('#apellido1').val();
	apellido2=$('#apellido2').val();
	datos="id="+id+"&nombre="+nombre+"&apellido1="+apellido1+"&apellido2="+apellido2+"&accion=guardar";
	$.ajax({
		type:'post',
		url:'../controller/ccamarero.php',
		data:datos,
		success:function(ht)
		{

		}
	});
	
}