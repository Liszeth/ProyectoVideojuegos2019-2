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
  			<h4>Información del Propietario</h4>
  			<form name="form1" method="post" action="">
		  </form>
  		</div>

  		<div class="panel-body">
  		  <p>@if (!empty($user))
          </p>
  		  <table width="760" border="0" align="center">
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
                  <td><select name="cmb_tipoId" id="cmb_tipoId" class="form-control" disabled>
                    <option VALUE="<?php echo $user['tipoiden']; ?>"<?php if($user['tipoiden']=='TI') echo 'selected' ; ?>>Tarjeta de Identificación</option>
                    <option VALUE="<?php echo $user['tipoiden']; ?>"<?php if($user['tipoiden']=='CD') echo 'selected' ; ?>>Cedula</option>
                    <option VALUE="<?php echo $user['tipoiden']; ?>"<?php if($user['tipoiden']=='PT') echo 'selected' ; ?>>Pasaporte</option>
                  </select></td>
                  <td><input name="int_identificacion" type="text" class="form-control" id="int_identificacion" value="{{ $user->identificacion}}" size="20" readonly></td>
                  <td><input name="txt_nombre" type="text" class="form-control" id="txt_nombre" value="{{ $user->nombre}}" size="20" readonly></td>
                  <td><input name="txt_apellido" type="text" class="form-control" id="txt_apellido" value="{{ $user->apellido}}" size="20" readonly></td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td class="tituloCampo">Celular</td>
                  <td class="tituloCampo">Email</td>
                  <td class="tituloCampo">Fecha de nacimiento</td>
                </tr>
                <tr>
                  <td><input name="int_celular" type="number" id="int_celular" disabled value="{{ $user->celular}}" size="20" class="form-control"></td>
                  <td><input name="txt_email" type="email" id="txt_email" disabled size="20" class="form-control" value="{{ $user->email}}"></td>
                  <td><input name="txt_fecha" type="date" id="txt_fecha"  disabled size="20" class="form-control" value="{{ $user->fechanacimiento}}" ></td>
                </tr>
                <tr>
                  <td colspan="3"><div align="center">
                    <p>@else </p>
                    <p> No existe información para éste propietario. </p>
                    <p>@endif <a href="/sistema3/public/users/lista" class="btn btn-success">Regresar</a></p>
                  </div></td>
                </tr>
              </table></td>
          </tr>
        </table>
  		</div>
	</div>
</body>
</html>