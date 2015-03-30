<?php 

App::uses('MidiasAppModel', 'Midias.Model');

class Tipo extends MidiasAppModel {
	public $name = 'Tipo';

	public $displayField = 'nome';

	public $order = 'nome asc';
}