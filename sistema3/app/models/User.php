<?php

class User extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';	
	public $timestamps = false;	
	public function vehiculos(){
        // creamos una relación con el modelo de vehiculo
        return $this->hasMany('vehiculo', 'propietario_id');
    }

}
