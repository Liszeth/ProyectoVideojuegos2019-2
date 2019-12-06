<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$users = User::orderBy('id','DESC')->get();

		return View::make('users.index')->with('users',$users);
	}
	public function getLista()
	{
		$users = User::orderBy('id','DESC')->get();

		return View::make('users.lista')->with('users',$users);
	}
	public function mostrarPropietarios(){
       $users = User::all();
        // obtenemos todos los propietarios y los pasamos a la vista 
        return View::make('vehiculos.create', array('users' => $users));
    }	
     	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;		
		$user->tipoiden = Input::get('cmb_tipoId');
		$user->identificacion = Input::get('int_identificacion');
		$user->nombre = Input::get('txt_nombre');
		$user->apellido = Input::get('txt_apellido');
		$user->celular = Input::get('int_celular');
		$user->email = Input::get('txt_email');
		$user->fechanacimiento = Input::get('txt_fecha');


		if ($user->save()) {
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('users/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id = null)
	{
		$user = User::find($id);

		return View::make('users.show')->with('user',$user);
	}	
	
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id = null)
	{
		$user = User::find($id);

		return View::make('users.edit')->with('user',$user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$user->tipoiden = Input::get('cmb_tipoId');
		$user->identificacion = Input::get('int_identificacion');
		$user->nombre = Input::get('txt_nombre');
		$user->apellido = Input::get('txt_apellido');
		$user->celular = Input::get('int_celular');
		$user->email = Input::get('txt_email');
		$user->fechanacimiento = Input::get('txt_fecha');

		if ($user->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('users/edit/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		if ($user->delete()) {
			Session::flash('message','Eliminado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('users/lista');
	}

}