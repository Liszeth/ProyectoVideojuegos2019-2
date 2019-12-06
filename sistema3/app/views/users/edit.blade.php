<!doctype html>
<html lang="en">
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
	.subtitulo {color: #3C763D;
	background-color:#A5DE8D;
	font-weight:bold;
	text-align:center
}
.tituloCampo {color: #FFFFFF;
	background-color:#54AD54;
	text-align:center
}
    </style>
</head>
<body>
	<h1>&nbsp;</h1>	
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Editar Propietario</h4>
  		</div>

  		<div class="panel-body">
        @if(!empty($user))
        <form method="post" action="/sistema3/public/users/update/{{ $user->id }}">
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
                        <option VALUE="TI"<?php if($user['tipoiden']=='TI') echo 'selected' ; ?>>Tarjeta de Identificación</option>
                        <option VALUE="CD"<?php if($user['tipoiden']=='CD') echo 'selected' ; ?>>Cedula</option>
                        <option VALUE="PT"<?php if($user['tipoiden']=='PT') echo 'selected' ; ?>>Pasaporte</option>                
                    </select></td>
                    <td><input name="int_identificacion" type="text" id="int_identificacion" size="20" value="{{ $user->identificacion}}" required class="form-control"></td>
                    <td><input name="txt_nombre" type="text" id="txt_nombre" size="20" value="{{ $user->nombre}}" class="form-control"></td>
                    <td><input name="txt_apellido" type="text" id="txt_apellido" size="20" value="{{ $user->apellido}}" class="form-control"></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="tituloCampo">Celular</td>
                    <td class="tituloCampo">Email</td>
                    <td class="tituloCampo">Fecha de nacimiento</td>
                  </tr>
                  <tr>
                    <td><input name="int_celular" type="number" id="int_celular" value="{{ $user->celular}}" size="20" class="form-control"></td>
                    <td><input name="txt_email" type="email" id="txt_email" size="20" class="form-control"  value="{{ $user->email}}" placeholder="ejemplo@ejemplo.com"></td>
                    <td><input name="txt_fecha" type="date" id="txt_fecha" size="20"  value="{{ $user->fechanacimiento}}" class="form-control" ></td>
                  </tr>
                  <tr>
                    <td colspan="3"><div align="center">
                      <p>&nbsp; </p>
                      <p>
                        <input type="submit" value="Guardar" class="btn btn-success">
@else </p>
                      <p> No existe información para éste vehiculo. </p>
@endif <a href="/sistema3/public/users/lista" class="btn btn-success">Regresar</a>                    </div></td>
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