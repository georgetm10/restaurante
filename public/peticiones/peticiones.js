function enviar(){
	id=$('#id').val();
	Usuario=$('#Usuario').val();
	Contra=$('#Contra').val();
	Nombre=$('#Nombre').val();
	Apellidos=$('#Apellidos').val();
	DNI=$('#DNI').val();
	Email=$('#email').val();
	Sexo=$('#Sexo').val();
	Telefono=$('#Telefono').val();
	Direccion=$('#Direccion').val();
	datos="id="+id+"&Usuario="+Usuario+"&Contrasena="+Contra+"&Nombre="+Nombre+"&Apellidos="+Apellidos+"&DNI="+DNI+"&email="+Email+"&Sexo="+Sexo+"&Telefono="+Telefono+"&Direccion="+Direccion+"&accion=guardar";
	$.ajax({
		type:'post',
		url:'../controller/cusuario.php',
		data:datos,
		success:function(ht)
		{
			alert('USUARIO REGISTRADO')
			limpiar()
		}
	});
	
}
function buscarUsuario(){
	
	Usuario=$('#Usuario').val();
	Contra=$('#Con').val();
	datos="Usuario="+Usuario+"&Con="+Contra+"&accion=buscarUsuario";
	$.ajax({
		type:'post',
		url:'controller/cusuario.php',
		dataType:'json',
		data:datos,
		success:function(ht)
		{
			if( (typeof ht === "object") && (ht !== null) )
			{
			    window.location.href = 'views/panelAdmin.html';
			}
			else
				alert('Este Usuario no está registrado');				
		}
	});
}
function limpiar()
	{
	
	document.getElementById('Usuario').value= ""; 
	document.getElementById('Contra').value= ""; 
	document.getElementById('Nombre').value= ""; 
	document.getElementById('Apellidos').value= ""; 
	document.getElementById('DNI').value= ""; 
	document.getElementById('email').value= ""; 
	document.getElementById('Sexo').value= ""; 
	document.getElementById('Telefono').value= ""; 
	document.getElementById('Direccion').value= ""; 
}
