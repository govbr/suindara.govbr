<?php 

App::uses('BannersAppModel', 'Banners.Model');

class BmTipo extends BannersAppModel{

	public $name = 'BmTipo';

	public $displayField = 'nome';

	public $order = 'nome asc';
}