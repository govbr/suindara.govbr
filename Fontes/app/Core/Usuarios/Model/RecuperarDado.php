<?php 

App::uses('UsuariosAppModel', 'Usuarios.Model');

class RecuperarDado extends UsuariosAppModel {

	public $name = 'RecuperarDado';
	
	public $useTable = 'recuperar_dados';

	public $primaryKey = 'usuario_id';

	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuarios.Usuario',
			'foreignKey' => 'usuario_id'
		)
	);
}