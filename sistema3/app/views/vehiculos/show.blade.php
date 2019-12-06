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
  			<h4>Información del Vehiculo</h4>
  			<form name="form1" method="post" action="">
		  </form>
  		</div>

  		<div class="panel-body">
  		  <p>@if (!empty($vehiculo))
          </p>
  		  <table width="760" border="0" align="center">
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
                    <td><input name="txt_placa" type="text" class="form-control" id="txt_placa" value="{{ $vehiculo->placa }}" size="15" readonly></td>
                    <td><select name="cmb_marca" id="cmb_marca" class="form-control" disabled>
                     
                      <option VALUE="<?php echo $vehiculo['marca']; ?>"<?php if($vehiculo['marca']=='CH') echo 'selected' ; ?>>Chevrolette</option>   
                    
                      <option VALUE="<?php echo $vehiculo['marca']; ?>"<?php if($vehiculo['marca']=='RN') echo 'selected' ; ?>>Renault</option>
                    
                      <option VALUE="<?php echo $vehiculo['marca']; ?>"<?php if($vehiculo['marca']=='MZ') echo 'selected' ; ?>>Mazda</option>
                   
                    </select></td>
                    <td><select name="cmb_linea" id="cmb_linea" class="form-control" disabled>
                      <option VALUE="<?php echo $vehiculo['linea']; ?>"<?php if($vehiculo['linea']=='1') echo 'selected' ; ?>>Spark</option>
                      <option VALUE="<?php echo $vehiculo['linea']; ?>"<?php if($vehiculo['linea']=='2') echo 'selected' ; ?>>Sail</option>
                      <option VALUE="<?php echo $vehiculo['linea']; ?>"<?php if($vehiculo['linea']=='3') echo 'selected' ; ?>>Logan</option>
                    </select></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="65"><table width="100%" border="0">
                  <tr>
                    <td width="24%" height="23" class="tituloCampo">Modelo</td>
                    <td width="24%" class="tituloCampo">Chasis</td>
                    <td width="26%" class="tituloCampo">Color</td>
                    <td width="26%" class="tituloCampo">Transmisión</td>
                  </tr>
                  <tr>
                    <td height="28"><input disabled name="txt_modelo" type="number" id="txt_modelo" size="20" value="{{ $vehiculo->modelo}}" class="form-control"></td>
                    <td><input name="int_chasis" type="text" class="form-control" id="int_chasis" value="{{ $vehiculo->chasis}}" size="20" readonly></td>
                    <td><input name="int_color2" disabled type="color" id="int_color2" size="20" value="{{ $vehiculo->color}}" class="form-control"></td>
                    <td><p>
                      <label>
                        <input name="rdb_trans" type="radio" id="rdb_trans_0" VALUE="<?php echo $vehiculo['trasmision']; ?>"<?php if($vehiculo['trasmision']=='AT') echo 'checked' ; ?> disabled >
                        AT</label>
                      <label>
                        <input type="radio" name="rdb_trans"  VALUE="<?php echo $vehiculo['trasmision']; ?>"<?php if($vehiculo['trasmision']=='MA') echo 'checked' ; ?> disabled>
                        MA</label>
                      <br>
                    </p></td>
                  </tr>
                   <tr>
                    <td width="24%" height="23" class="tituloCampo">Propietario --></td>
                    <td>
                    <!--CReamos un select para escoger cual propietario es dueño del vehiculo-->
                    <select class="form-control" name="propietario_id" disabled>    
                    @foreach($users as $user)
                      @if($user->id == $vehiculo->propietario_id)
                        <option value="{{$user->id}}">{{$user->nombre.' '.$user->apellido}}</option>
                      @endif
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
                    <p>&nbsp;</p>
                    <p>@else </p>
                    <p> No existe información para éste vehiculo. </p>
                    <p>@endif <a href="/sistema3/public/vehiculos/lista" class="btn btn-success">Regresar</a></p>
                  </div></td>
                </tr>
              </table></td>
          </tr>
        </table>
  		</div>
	</div>
</body>
</html>