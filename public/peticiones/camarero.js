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
			alert('CAMARERO REGISTRADO');
			limpiar();
			tablaBusqueda();
		}
	});
	
}
function limpiar()
	{
	
	document.getElementById('nombre').value= ""; 
	document.getElementById('apellido1').value= ""; 
	document.getElementById('apellido2').value= ""; 	
	}

function buscar(ini,n)
{	datos="campo="+campo+"&operador="+operador+"&valor="+valor+"&accion=buscar&tipo=0&ini="+ini+"&n="+n;
	$.ajax({
		type:'post',
		url:'../controller/ccamarero.php',
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
		url:'../controller/ccamarero.php',
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
	html="<table align='center' class='table table-striped'><tr><th>No</th><th>nombre</th><th>apellido1</th><th>apellido2</th><th>Acci&oacute;n</th></tr>";
	c=1;
	for(i=0;i<nm;i++)
	{	html+="<tr><td>"+c+"</td><td>"+m[i][1]+"</td><td>"+m[i][2]+"</td><td>"+m[i][3]+"</td><td><button class='glyphicon glyphicon-pencil' onclick='mostrarDatos("+i+")'></button> <button class='glyphicon glyphicon-remove' onclick='eliminar("+m[i][0]+","+i+")'></button><td/></tr>";
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
			url:'../controller/ccamarero.php',
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
	$('#nombre').val(m[fila][1]);
	$('#apellido1').val(m[fila][2]);
	$('#apellido2').val(m[fila][3]);
	row=fila;
}
