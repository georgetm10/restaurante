function getClientes() {

	datos="&accion=getClientes";
	$.ajax({
		type:'post',
		url:'../controller/ccliente.php',
		dataType:'json',
		data:datos,
		success:function(ht)
		{
			crearComboClientes(ht);
		}
	});
}

function crearComboClientes(data) {
	
	html = "<select id='cliente_id'>";
	for(x in data){
		html += "<option value='" + data[x].id_Cliente + "'>" + data[x].Nombre + " " + data[x].apellido1+"</option>"
	}
	html += "</select>";

	$('#clientes').html(html);

}
function getMesas() {

	datos="&accion=getMesas";
	$.ajax({
		type:'post',
		url:'../controller/cmesa.php',
		dataType:'json',
		data:datos,
		success:function(ht)
		{
			crearComboMesas(ht);
		}
	});
}

function crearComboMesas(data) {
	
	html = "<select id='mesa_id'>";
	for(x in data){
		html += "<option value='" + data[x].id_Mesa + "'>" + data[x].NumeroMaxComensales + " " +"</option>"
	}
	html += "</select>";

	$('#mesas').html(html);

}