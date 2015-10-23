<?php 

	class CategoriaFixture extends CakeTestFixture {

		public $useDbConfig = 'test';
		
		public $fields = array(
				'id'    	=> array('type' => 'integer', 'key' => 'primary', 'null' => false),
				'titulo' 	=> array('type' => 'text', 'length' => 45, 'null' => false),
				'descricao' => array('type' => 'text', 'length' => 250, 'null' => false),
				'parent_id' => array('type' => 'integer', 'length' => 11),
				'site_id' 	=> array('type' => 'integer', 'length' => 11),
				'lft' 		=> array('type' => 'integer', 'length' => 11),
				'rght' 		=> array('type' => 'integer', 'length' => 11)
		);
		
		public $records = array(
			array(
				'id' 		=> 1, 
				'titulo' 	=> 'Tutorial', 
				'descricao' => 'a testeha heuh',
				'parent_id' => null,
			),
			
			array(
				'id' 		=> 2, 
				'titulo' 	=> 'PHP', 
				'descricao' => ' aueh teste loko',
				'parent_id' => 1
			),
			
			array(
				'id' 		=> 3, 
				'titulo' 	=> 'Java',
				'descricao' => 'loko teste',
				'parent_id' => 1
			),
			
			array(
				'id' 		=> 4, 
				'titulo' 	=> 'JavaScript', 
				'descricao' => 'hmm huaeha',
				'parent_id' => 3
			),

			array(
				'id' 		=> 5, 
				'titulo' 	=> 'C', 
				'descricao' => 'hmm huaeha', 
				'parent_id' => 1
			),

			array(
				'id' 		=> 6, 
				'titulo' 	=> 'Banco', 
				'descricao' => 'hmm huaeha', 
				'parent_id' => 2
			),

			array(
				'id' 		=> 7, 
				'titulo' 	=> 'MySQL', 
				'descricao' => 'hmm huaeha', 
				'parent_id' => 5
			),

			array(
				'id' 		=> 8, 
				'titulo' 	=> 'Linguagem', 
				'descricao' => 'hmm huaeha', 
				'parent_id' => 1
			)
		);

	}


