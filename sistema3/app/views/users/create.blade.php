<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Laravel CRUD</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		body {
			width: 800px;
			margin: 50px auto;
		}
		.badge {
			float: right;
		}
	.subtitulo {	color: #3C763D;
	background-color:#A5DE8D;
	font-weight:bold;
	text-align:center
}
.titulo {	color: #000066;
	background-color:#FFCC33;
	text-align:center;
	font-size:larger
}
.tituloCampo {	color: #FFFFFF;
	background-color:#54AD54;
	text-align:center
}
    </style>
</head>
<body>
	<h1>&nbsp;</h1>
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
  		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   			  <ul class="nav navbar-nav">
        			<li><a href="/sistema3/public/users">Inicio</a></li>
        			<li class="active"><a href="/sistema3/public/users/create">Nuevo Propietario</a></li>
        			<li><a href="/sistema3/public/users/lista">Lista de Propietarios</a></li>        			
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo Vehiculo</h4>
  		</div>

  		<div class="panel-body">
  		  <form method="post" action="store">
  		  <table width="758" border="0" align="center">
	    <tr bgcolor="#AADFFF">
				    <td width="772" bgcolor="#D8EDCF"><table width="100%" border="0">
			          <tr>
				          <td colspan="4" class="subtitulo">Propietario</td>
			            </tr>
				        <tr>
				          <td class="tituloCampo">Tipo de identificación</td>
				          <td class="tituloCampo">Identificación</td>
				          <td class="tituloCampo">Nombre</td>
				          <td class="tituloCampo">Apellidos</td>
			            </tr>
				        <tr>
				          <td><select name="cmb_tipoId" id="cmb_tipoId" class="form-control">
				            <option value="TI">Tarjeta de Identificación</option>
				            <option value="CD">Cedula</option>
				            <option value="PT">Pasaporte</option>
				            </select></td>
				          <td><input name="int_identificacion" type="text" id="int_identificacion" size="20" required class="form-control"></td>
				          <td><input name="txt_nombre" type="text" id="txt_nombre" size="20" class="form-control"></td>
				          <td><input name="txt_apellido" type="text" id="txt_apellido" size="20" class="form-control"></td>
			            </tr>
			          </table>
				      <table width="100%" border="0">
				        <tr>
				          <td class="tituloCampo">Celular</td>
				          <td class="tituloCampo">Email</td>
				          <td class="tituloCampo">Fecha de nacimiento</td>
			            </tr>
				        <tr>
				          <td><input name="int_celular" type="number" id="int_celular" size="20" class="form-control"></td>
				          <td><input name="txt_email" type="email" id="txt_email" size="20" class="form-control" placeholder="ejemplo@ejemplo.com"></td>
				          <td><input name="txt_fecha" type="date" id="txt_fecha" size="20" class="form-control" ></td>
			            </tr>
				        <tr>
				          <td colspan="3"><div align="center">
				            <p>&nbsp;			                </p>
				            <p>
				              <input type="submit" value="Guardar" class="btn btn-success">
				              <input type="reset" name="btn_reset" id="btn_reset" value="Restablecer" class="btn btn-success">
			                </p>
				            </div></td>
			            </tr>
          </table></td>
			      </tr>
			  </table> 				
			</form>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif   
</body>
</html>