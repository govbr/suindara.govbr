<?php 

App::uses('MidiasAppModel', 'Midias.Model');

class MidiasConteudo extends MidiasAppModel {

	public $name = 'MidiasConteudo';

	public $order = 'posicao asc';

	public $useTable = 'midias_pn';

	public $findMethods = array('posicao' =>  true);

	private $deleted;

	public $belongsTo = array(
		'Midias.Midia',
		'Noticias.Noticia'
	);

	public function beforeSave($options = array()) {
		if(!isset($this->data['MidiasConteudo']['posicao']) || $this->data['MidiasConteudo']['posicao'] == null) {
			$midia = $this->Midia->findById($this->data['MidiasConteudo']['midia_id']);
			$noticia_id = (isset($this->data['MidiasConteudo']['noticia_id'])) ? $this->data['MidiasConteudo']['noticia_id'] : 0;
			$pagina_id = (isset($this->data['MidiasConteudo']['pagina_id'])) ? $this->data['MidiasConteudo']['pagina_id'] : 0;
			$tipos = ($midia['Midia']['tipo_id'] == ARQUIVO) ? ARQUIVO : array(IMAGEM,AUDIO,VIDEO);
			$this->data['MidiasConteudo']['posicao'] = $this->find('posicao', array(
		    			'conditions' => array(
		    				'MidiasConteudo.noticia_id' => $noticia_id,
		    				'MidiasConteudo.pagina_id' => $pagina_id,
		    				'Midia.tipo_id' => $tipos
		    			)
		    		)
		    	);
		}
		return true;
	}

	protected function _findPosicao($state, $query, $results = array()) {
		if ($state === 'before') {
			$query['fields'] = array('MidiasConteudo.posicao');
			$query['limit']  = 1;
			$query['order']  = 'posicao desc';
            return $query;
        } elseif ($state === 'after') {
			if (empty($results)) {
				return 1;
			}
			return ($results[0]['MidiasConteudo']['posicao'] + 1);
        }
	}

	public function moveUp($id) {
		$this->id = $id;
    	if($this->exists()) {
    		$midiaConteudo = $this->read();
    		$tipos = ($midiaConteudo['Midia']['tipo_id'] == ARQUIVO) ? ARQUIVO : array(IMAGEM,AUDIO,VIDEO);
    		$neighbors = $this->find('neighbors', array(
    			'field' => 'posicao',
    			'value' => $midiaConteudo['MidiasConteudo']['posicao'],
    			'fields' => array('id', 'posicao'),
    			'conditions' => array(
    				'AND' => array(
    					'MidiasConteudo.noticia_id' => $midiaConteudo['MidiasConteudo']['noticia_id'],
    					'MidiasConteudo.pagina_id' => $midiaConteudo['MidiasConteudo']['pagina_id'],
    					'Midia.tipo_id' => $tipos
    					)
    				)
    			)
    		);

    		$prev = $neighbors['prev'];

    		if($prev == null)
    			return;
    		$actualPosition = $midiaConteudo['MidiasConteudo']['posicao'];
    		$prevPosition = $prev['MidiasConteudo']['posicao'];

	    	$prev['MidiasConteudo']['posicao'] = $actualPosition;
	    	$midiaConteudo['MidiasConteudo']['posicao'] = $prevPosition;

			$this->save($midiaConteudo);
			$this->save($prev);

			return true;
		}
		return false;
	}

	public function moveDown($id) {
		$this->id = $id;
    	if($this->exists()) {
    		$midiaConteudo = $this->read();
    		$tipos = ($midiaConteudo['Midia']['tipo_id'] == ARQUIVO) ? ARQUIVO : array(IMAGEM,AUDIO,VIDEO);
    		$neighbors = $this->find('neighbors', array(
    			'field' => 'posicao',
    			'value' => $midiaConteudo['MidiasConteudo']['posicao'],
    			'fields' => array('id', 'posicao'),
    			'conditions' => array(
    				'AND' => array(
    					'MidiasConteudo.noticia_id' => $midiaConteudo['MidiasConteudo']['noticia_id'],
    					'MidiasConteudo.pagina_id' => $midiaConteudo['MidiasConteudo']['pagina_id'],
    					'Midia.tipo_id' =>  $tipos
    					)
    				)
    			)
    		);

    		$next = $neighbors['next'];

    		if($next == null)
    			return;
    		$actualPosition = $midiaConteudo['MidiasConteudo']['posicao'];
    		$nextPosition = $next['MidiasConteudo']['posicao'];

	    	$next['MidiasConteudo']['posicao'] = $actualPosition;
	    	$midiaConteudo['MidiasConteudo']['posicao'] = $nextPosition;

			$this->save($midiaConteudo);
			$this->save($next);

			return true;
		}
		return false;
	}

	public function beforeDelete($cascade = true) {
		$this->deleted = $this->read();
		$midia = $this->Midia->read(array('tipo_id'),$this->deleted['MidiasConteudo']['midia_id']);
		$this->deleted['Tipos'] = ($midia['Midia']['tipo_id'] == ARQUIVO) ? ARQUIVO : array(IMAGEM,AUDIO,VIDEO);
		return true;
	}

	public function afterDelete() {
    	$this->reorder();
		return true;
	}

	private function reorder($deleted = null) {
		if($deleted)
			$this->deleted = $deleted;
		$midiasConteudo = $this->find('all', array(
    			'conditions' => array(
    				'AND' => array(
    					'MidiasConteudo.noticia_id' => $this->deleted['MidiasConteudo']['noticia_id'],
    					'MidiasConteudo.pagina_id' => $this->deleted['MidiasConteudo']['pagina_id'],
    					'Midia.tipo_id' =>  $this->deleted['Tipos']
    					)
    				),
    			'order' => 'MidiasConteudo.posicao asc',
    			'recursive' => 1
    			)
    		);
		foreach ($midiasConteudo as $key => $midiaConteudo) {
			$newPos = ($key + 1);
			if($midiaConteudo['MidiasConteudo']['posicao'] != $newPos) {
				$midiaConteudo['MidiasConteudo']['posicao'] = $newPos;
				$this->save($midiaConteudo['MidiasConteudo']);
			}
		}
	}
}