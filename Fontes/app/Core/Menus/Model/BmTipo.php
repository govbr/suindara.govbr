<?php 

App::uses('MenusAppModel', 'Menus.Model');

class BmTipo extends MenusAppModel{
	

	public $name = 'BmTipo';

	public $displayField = 'nome';

	public $order = 'nome asc';
}