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
        			<li><a href="/sistema3/public/users">Inicio</a></li>
        			<li class="active"><a href="/sistema3/public/users">Lista Propietarios</a></li>
        			<li><a href="/sistema3/public/users/create">Nuevo Propietario</a></li>
   			  </ul>
  		  </div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista de Propietarios</h4>
  		</div>

  		<div class="panel-body">
    		<table width="802" class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>						
						<th>Funciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->nombre }}</td>
							<td>{{ $user->apellido }}</td>
							<td>
								<a href="/sistema3/public/users/show/{{ $user->id }}">Ver</span></a>
								<a href="/sistema3/public/users/edit/{{ $user->id }}">Editar</span></a>
								<a href="{{ url('/users/destroy',$user->id) }}">Eliminar</span></a>
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