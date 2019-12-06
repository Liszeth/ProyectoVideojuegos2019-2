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
        			<li class="active"><a href="/sistema3/public/vehiculos/create">Nuevo Vehiculo</a></li>
        			<li ><a href="/sistema3/public/vehiculos/lista">Lista de Vehiculos </a></li>
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
				        <td colspan="2" class="subtitulo">Datos Vehiculo</td>
			          </tr>
				      <tr>
				      <td width="77%"><table width="100%" border="0">
				          <tr>
				            <td width="35%" class="tituloCampo">Placa</td>
				            <td width="28%" class="tituloCampo">Marca</td>
				            <td width="37%" class="tituloCampo">Linea</td>
			              </tr>
				          <tr>
				            <td><input name="txt_placa" type="text" id="txt_placa" size="15" required placeholder="AAA-000" class="form-control"></td>
				            <td><select name="cmb_marca" id="cmb_marca" class="form-control">
				              <option value="CH">Chevrolette</option>
				              <option value="MZ">Mazda</option>
				              <option value="RN">Renault</option>
				              </select></td>
				            <td><select name="cmb_linea" id="cmb_linea" class="form-control">
				              <option value="1">Spark</option>
				              <option value="2">Sail</option>
				              <option value="3">Logan</option>
				              </select></td>
			              </tr>
				          </table></td>
			          </tr>
				      <tr>
				        <td height="73"><table width="100%" border="0">
				          <tr>
				            <td width="24%" height="23" class="tituloCampo">Modelo</td>
				            <td width="24%" class="tituloCampo">Chasis</td>
				            <td width="26%" class="tituloCampo">Color</td>
				            <td width="26%" class="tituloCampo">Transmisión</td>
			              </tr>
				          <tr>
				            <td height="28"><input name="txt_modelo" type="number" id="txt_modelo" size="20" required class="form-control"></td>
				            <td><input name="int_chasis" type="text" id="int_chasis" size="20" class="form-control"></td>
				            <td><input name="int_color" type="color" id="int_color" size="20" class="form-control"></td>
				            <td><p>
				              <label>
				                <input name="rdb_trans" type="radio" id="rdb_trans_0" value="AT" checked  align:center>
				                AT</label>
				              <label>
				                <input type="radio" name="rdb_trans" value="MA" id="rdb_trans_1" >
				                MA</label>
				            </p></td>
			              </tr>
				          <tr>
				            <td width="24%" height="23" class="tituloCampo">Propietario --></td>
				            <td>
				            <!--CReamos un select para escoger cual propietario es dueño del vehiculo-->
							  <select class="form-control" name="propietario_id">					             
								@foreach($users as $user)
								<option value="{{$user->id}}">{{$user->nombre.' '.$user->apellido}}</option>
								@endforeach									
		                      </select></td>		                  	 
				            <td>&nbsp;</td>
				            <td>&nbsp;</td>
			              </tr>
				          </table></td>
			          </tr>			            
				      </table>
				      <table width="100%" border="0">
				        <tr>
				          <td><div align="center">
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