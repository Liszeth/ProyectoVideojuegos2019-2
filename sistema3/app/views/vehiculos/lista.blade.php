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
        			<li ><a href="/sistema3/public/users">Inicio</a></li>
        			<li class="active"><a href="/sistema3/public/vehiculos/lista">Lista de Vehiculos</a></li>
        			<li><a href="/sistema3/public/vehiculos/create">Nuevo Vehiculo</a></li>
   			  </ul>
  		  </div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista de Vehiculos</h4>
  		</div>

  		<div class="panel-body">
    		<table width="802" class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Placa</th>
						<th>Marca</th>						
						<th>Funciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($vehiculos as $vehiculo)
						<tr>
							<td>{{ $vehiculo->id }}</td>
							<td>{{ $vehiculo->placa }}</td>
							<td>{{ $vehiculo->marca }}</td>
							<td>
								<a href="/sistema3/public/vehiculos/show/{{ $vehiculo->id }}">Ver</span></a>
								<a href="/sistema3/public/vehiculos/edit/{{ $vehiculo->id }}">Editar</span></a>
								<a href="{{ url('/vehiculos/destroy',$vehiculo->id) }}">Eliminar</span></a>
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