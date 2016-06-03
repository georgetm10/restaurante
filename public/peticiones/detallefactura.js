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
	plato=$('#plato').val();
	importe=$('#importe').val();
	id_Cocinero=$('#id_Cocinero').val();
	id_factura=$('#id_factura').val();
	datos="id="+id+"&plato="+plato+"&importe="+importe+"&id_Cocinero="+id_Cocinero+"&id_factura="+id_factura+"&accion=guardar";
	$.ajax({
		type:'post',
		url:'../controller/cdetallefactura.php',
		data:datos,
		success:function(ht)
		{
			alert('DETALLE DE FACTURA REGISTRADA');
			limpiar();
			tablaBusqueda();
		}
	});
	
}
function limpiar()
	{
	
	document.getElementById('plato').value= ""; 
	document.getElementById('importe').value= ""; 
	document.getElementById('id_cocinero').value= ""; 
	document.getElementById('id_factura').value= "";  
	}
function buscar(ini,n)
{	
	campo=$('#campo').val();
	operador=$('#operador').val();
	valor=$('#valor').val();
	datos="campo="+campo+"&operador="+operador+"&valor="+valor+"&accion=buscar&tipo=0&ini="+ini+"&n="+n;
	$.ajax({
		type:'post',
		url:'../controller/cdetallefactura.php',
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
		url:'../controller/cdetallefactura.php',
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
	html="<table align='center' class='table table-striped'><tr><th>No</th><th>plato</th><th>importe</th><th>id_cocinero</th><th>id_factura</th><th>Acci&oacute;n</th></tr>";
	c=1;
	for(i=0;i<nm;i++)
	{	html+="<tr><td>"+c+"</td><td>"+m[i][1]+"</td><td>"+m[i][2]+"</td><td>"+m[i][3]+"</td><td>"+m[i][4]+"</td><td><button class='glyphicon glyphicon-pencil' onclick='mostrarDatos("+i+")'></button> <button class='glyphicon glyphicon-remove' onclick='eliminar("+m[i][0]+","+i+")'></button><td/></tr>";
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
			url:'../controller/cdetallefactura.php',
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
	$('#plato').val(m[fila][1]);
	$('#importe').val(m[fila][2]);
	$('#id_cocinero').val(m[fila][3]);
	$('#id_factura').val(m[fila][4]);
	row=fila;
}

function getCocineros() {

	datos="&accion=getCocineros";
	$.ajax({
		type:'post',
		url:'../controller/ccocinero.php',
		dataType:'json',
		data:datos,
		success:function(ht)
		{
			crearComboCocineros(ht);
		}
	});
}

function crearComboCocineros(data) {
	
	html = "<select id='id_Cocinero'>";
	for(x in data){
		html += "<option value='" + data[x].id_Cocinero + "'>" + data[x].nombre + " " + data[x].apellido1+"</option>"
	}
	html += "</select>";

	$('#cocineros').html(html);

}
function getFacturas() {

	datos="&accion=getFacturas";
	$.ajax({
		type:'post',
		url:'../controller/cfactura.php',
		dataType:'json',
		data:datos,
		success:function(ht)
		{
			crearComboFacturas(ht);
		}
	});
}

function crearComboFacturas(data) {
	
	html = "<select id='id_factura'>";
	for(x in data){
		html += "<option value='" + data[x].id_factura + "'>" + data[x].fechaFactura + " " +"</option>"
	}
	html += "</select>";

	$('#facturas').html(html);

}