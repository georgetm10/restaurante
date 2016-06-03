var m=new Array();
var row=-1;
//Variables para la paginación
var tamanho=$('#tam').val();
//Variables de busqueda
var campo;
var operador;
var valor;
function guardar()
{
	id=$('#id').html();
	fechaFactura=$('#fechaFactura').val();
	id_cliente=$('#id_cliente').val();
	id_mesa=$('#id_mesa').val();
	id_Camarero=$('#id_Camarero').val();
	ID_USUARIO=$('#ID_USUARIO').val();
	datos="id="+id+"&fechaFactura="+fechaFactura+"&id_cliente="+id_cliente+"&id_mesa="+id_mesa+"&id_Camarero="+id_Camarero+"&ID_USUARIO="+ID_USUARIO+"&accion=guardar";
	$.ajax({
		type:'post',
		url:'../controller/cfactura.php',
		data:datos,
		success:function(ht)
		{
			alert('FACTURA REGISTRADA');
			limpiar();
			tablaBusqueda();
		}
	});
	
}
function limpiar()
	{
	
	document.getElementById('fechaFactura').value= ""; 
	document.getElementById('id_cliente').value= ""; 
	document.getElementById('id_mesa').value= ""; 
	document.getElementById('id_Camarero').value= ""; 	
	document.getElementById('ID_USUARIO').value= ""; 
	}

function buscar(ini,n)
{	
	campo=$('#campo').val();
	operador=$('#operador').val();
	valor=$('#valor').val();
	datos="campo="+campo+"&operador="+operador+"&valor="+valor+"&accion=buscar&tipo=0&ini="+ini+"&n="+n;
	$.ajax({
		type:'post',
		url:'../controller/cfactura.php',
		dataType:'json',
		data:datos,
		success:function(ht)
		{	m=ht;
			tablaBusqueda();
		}
	});
}
function getTotalRegs(inicio)
{	n=tamanho;
	campo=$('#campo').val();
	operador=$('#operador').val();
	valor=$('#valor').val();
	datos="campo="+campo+"&operador="+operador+"&valor="+valor+"&accion=buscar&tipo=1";
	$.ajax({
		type:'post',
		url:'../controller/cfactura.php',
		data:datos,
		success:function(tregs)
		{	tp=tregs/tamanho;
			totalpags=Math.ceil(tp);
			getFooter(totalpags);
			buscar(inicio,n);
			//
			$('#tregs').html(tregs);
		}
	});
}
function getFooter(np)
{	htm="";
	ini=0;
	for(i=1;i<=np;i++)
	{	fin=i*tamanho-1;
		htm=htm+"<a href='#' onclick='buscar("+ini+","+tamanho+")'>&nbsp; "+i+" &nbsp;</a>";
		ini=i*tamanho;
	}
	$('#pages').html(htm);
}
function tablaBusqueda()
{	nm=m.length;
	html="<table align='center' class='table table-striped'><tr><th>No</th><th>fechaFactura</th><th>id_cliente</th><th>id_mesa</th><th>id_Camarero</th><th>ID_USUARIO</th><th>Acci&oacute;n</th></tr>";
	c=1;
	for(i=0;i<nm;i++)
	{	html+="<tr><td>"+c+"</td><td>"+m[i]['fechaFactura']+"</td><td>"+m[i]['nomCliente']+"</td><td>"+m[i]['NumeroMaxComensales']+"</td><td>"+m[i]['nomCamarero']+"</td><td>"+m[i][6]+"</td><td><button class='glyphicon glyphicon-pencil' onclick='mostrarDatos("+i+")'></button> <button class='glyphicon glyphicon-remove' onclick='eliminar("+m[i][0]+","+i+")'></button><td/></tr>";
		c++;
	}
	html+="</table>";
	$('#results').html(html);
}
function eliminar(id,fila)
{	row=fila;
	if (confirm("Deseas eliminar este registro"))
	{	$.ajax({
			type:'post',
			url:'../controller/cfactura.php',
			data:"id="+id+"&accion=eliminar",
			success:function(ht)
			{	$('#id').html(ht);
				m.splice(row,1);
				tablaBusqueda();	
			}
		});
	}	
}
function mostrarDatos(fila)
{	$('#id').html(m[fila][0]);
	$('#fechaFactura').val(m[fila][1]);
	$('#id_cliente').val(m[fila][2]);
	$('#id_mesa').val(m[fila][3]);
	$('#id_Camarero').val(m[fila][4]);
	$('#ID_USUARIO').val(m[fila][5]);
	row=fila;
}

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
	
	html = "<select id='id_cliente'>";
	for(x in data){
		html += "<option value='" + data[x].id_cliente + "'>" + data[x].Nombre + " " + data[x].apellido1+"</option>"
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
	
	html = "<select id='id_mesa'>";
	for(x in data){
		html += "<option value='" + data[x].id_mesa + "'>" + data[x].NumeroMaxComensales + " " +"</option>"
	}
	html += "</select>";

	$('#mesas').html(html);

}
function getUsuarios() {

	datos="&accion=getUsuarios";
	$.ajax({
		type:'post',
		url:'../controller/cusuario.php',
		dataType:'json',
		data:datos,
		success:function(ht)
		{
			crearComboUsuarios(ht);
		}
	});
}

function crearComboUsuarios(data) {
	
	html = "<select id='ID_USUARIO'>";
	for(x in data){
		html += "<option value='" + data[x].ID_USUARIO + "'>" + data[x].USUARIO + " " +"</option>"
	}
	html += "</select>";

	$('#usuarios').html(html);

}
function getCamareros() {

	datos="&accion=getCamareros";
	$.ajax({
		type:'post',
		url:'../controller/ccamarero.php',
		dataType:'json',
		data:datos,
		success:function(ht)
		{
			crearComboCamareros(ht);
		}
	});
}

function crearComboCamareros(data) {
	
	html = "<select id='id_Camarero'>";
	for(x in data){
		html += "<option value='" + data[x].id_Camarero + "'>" + data[x].nombre + " " +"</option>"
	}
	html += "</select>";

	$('#camareros').html(html);

}
