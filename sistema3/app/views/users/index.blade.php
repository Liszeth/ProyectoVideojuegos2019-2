<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
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
	</style>
</head>
<body>
	<h1>&nbsp;</h1>
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
  		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   			  <ul class="nav navbar-nav">
        			<li class="active"><a href="/sistema3/public/users">Inicio</a></li>
        			<li><a href="/sistema3/public/users/create">Nuevo Propietario</a></li>
        			<li><a href="/sistema3/public/vehiculos/create">Nuevo Vehiculo</a></li>
   			  </ul>
  		  </div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista de Propietarios y Vehiculos</h4>
  		</div>

  		<div class="panel-body">
    		<table width="802" class="table">
				<thead>
					<tr>
						
						<th width="198">Nombre</th>
						<th width="212">Apellido</th>						
						<th width="376">Vehiculos</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							
							<td>{{ $user->nombre }}</td>
							<td>{{ $user->apellido }}</td>
							<td>
								<ul class="list-group">
						 	 		<!-- Aqui listamos todos los vehiculos de un propietario -->
						 	 		@foreach($user->vehiculos as $vehiculo)
						 	 		<table width="291" border="0" class="list-group-item">
						 	 		  <tr>
						 	 		    <td width="174">
						 	 		      <p align="center"><strong>Placa</strong></p>
					 	 		        </td>
						 	 		    <td width="278">
						 	 		      <p align="center"><strong>Modelo</strong></p>
					 	 		        </td>
					 	 		      </tr>
						 	 		  <tr>
						 	 		    <td ><div align="center">{{$vehiculo->placa}}</div></td>
						 	 		    <td> <div align="center">{{$vehiculo->modelo}}</div></td>
					 	 		      </tr>
					 	 		  </table>
						 	 		@endforeach
                              </ul>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	  </div>
  	</div>

  	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</body>
</html>