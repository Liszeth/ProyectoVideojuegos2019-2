<?php

class VehiculoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$vechiculos = Vehiculo::orderBy('id','DESC')->get();

		return View::make('vehiculos.lista')->with('vehiculos',$vehiculos);
	}
	public function getLista()
	{
		$vehiculos = Vehiculo::orderBy('id','DESC')->get();

		return View::make('vehiculos.lista')->with('vehiculos',$vehiculos);
	} 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('vehiculos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$vehiculo = new Vehiculo;

		$vehiculo->placa = Input::get('txt_placa');
		$vehiculo->marca = Input::get('cmb_marca');
		$vehiculo->linea = Input::get('cmb_linea');
		$vehiculo->modelo = Input::get('txt_modelo');		
		$vehiculo->chasis = Input::get('int_chasis');
		$vehiculo->color = Input::get('int_color');
		$vehiculo->trasmision = Input::get('rdb_trans');
		$vehiculo->propietario_id = Input::get('propietario_id');		


		if ($vehiculo->save()) {
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('vehiculos/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id = null)
	{
		$vehiculo = Vehiculo::find($id);	
		$users = User::orderBy('id','DESC')->get();	
		
		return View::make('vehiculos.show')->with('vehiculo',$vehiculo)->with(array('users' => $users));
	}	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id = null)
	{
		$vehiculo = Vehiculo::find($id);
		$users = User::orderBy('id','DESC')->get();

		return View::make('vehiculos.edit')->with('vehiculo',$vehiculo)->with(array('users' => $users));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$vehiculo = Vehiculo::find($id);

		$vehiculo->placa = Input::get('txt_placa');
		$vehiculo->marca = Input::get('cmb_marca');
		$vehiculo->linea = Input::get('cmb_linea');
		$vehiculo->modelo = Input::get('txt_modelo');		
		$vehiculo->chasis = Input::get('int_chasis');
		$vehiculo->color = Input::get('int_color');
		$vehiculo->trasmision = Input::get('rdb_trans');
		$vehiculo->propietario_id = Input::get('propietario_id');
		

		if ($vehiculo->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('vehiculos/edit/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$vehiculo = Vehiculo::find($id);

		if ($vehiculo->delete()) {
			Session::flash('message','Eliminado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('vehiculos/lista');
	}

}