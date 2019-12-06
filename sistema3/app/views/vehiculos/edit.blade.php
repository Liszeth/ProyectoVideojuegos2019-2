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
  			<h4>Editar Vehiculo</h4>
  		</div>

  		<div class="panel-body">
        @if (!empty($vehiculo))
        <form method="post" action="/sistema3/public/vehiculos/update/{{ $vehiculo->id }}">
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
                      <td><input name="txt_placa" type="text" id="txt_placa" size="15" required placeholder="AAA-000" value="{{ $vehiculo->placa }}" class="form-control"></td>
                      <td><select name="cmb_marca" id="cmb_marca" class="form-control">
                        <option VALUE="CH"<?php if($vehiculo['marca']=='CH') echo 'selected' ; ?>>Chevrolette</option>   
                    
                        <option VALUE="RN"<?php if($vehiculo['marca']=='RN') echo 'selected' ; ?>>Renault</option>
                    
                        <option VALUE="MZ"<?php if($vehiculo['marca']=='MZ') echo 'selected' ; ?>>Mazda</option>
                   
                      </select></td>
                      <td><select name="cmb_linea" id="cmb_linea" class="form-control">
                      <option VALUE="1"<?php if($vehiculo['linea']=='1') echo 'selected' ; ?>>Spark</option>
                      <option VALUE="2"<?php if($vehiculo['linea']=='2') echo 'selected' ; ?>>Sail</option>
                      <option VALUE="3"<?php if($vehiculo['linea']=='3') echo 'selected' ; ?>>Logan</option>
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
                      <td height="28"><input name="txt_modelo" type="number" id="txt_modelo" size="20" value="{{ $vehiculo->modelo}}" required class="form-control"></td>
                      <td><input name="int_chasis" type="text" id="int_chasis" size="20" value="{{ $vehiculo->chasis}}" class="form-control"></td>
                      <td><input name="int_color" type="color" id="int_color" size="20" value="{{ $vehiculo->color}}" class="form-control"></td>
                      <td><p>
                        <label>
                          <input name="rdb_trans" type="radio" VALUE="AT"<?php if($vehiculo['trasmision']=='AT') echo 'checked' ; ?>>
                          AT</label>
                        <label>
                          <input type="radio" name="rdb_trans" VALUE="MA"<?php if($vehiculo['trasmision']=='MA') echo 'checked' ; ?> >
                          MA</label>
                        <br>
                      </p></td>
                    </tr>
                    <tr>
                    <td width="24%" height="23" class="tituloCampo">Propietario --></td>
                    <td>
                    <!--CReamos un select para escoger cual propietario es dueño del vehiculo-->
                    <select class="form-control" name="propietario_id">                      
                    @foreach($users as $user)                    
                      <option value="{{$user->id}}" <?php if($user['id']==$vehiculo['propietario_id']) echo 'selected' ; ?>>{{$user->nombre.' '.$user->apellido}}</option>                                       
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
                      <p>&nbsp; </p>
                      <p>
                        <input type="submit" value="Guardar" class="btn btn-success">
@else </p>
                      <p> No existe información para éste vehiculo. </p>
@endif <a href="/sistema3/public/vehiculos/lista" class="btn btn-success">Regresar</a>                    </div></td>
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