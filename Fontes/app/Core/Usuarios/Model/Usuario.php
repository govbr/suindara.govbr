<?php 

App::uses('UsuariosAppModel', 'Usuarios.Model');
App::uses('AuthComponent', 'Controller/Component');

class Usuario extends UsuariosAppModel {
	public $name = 'Usuario';

	public $displayField = 'nome';

	public $order = 'Usuario.nome asc';

    public $findMethods = array('instituicoes' =>  true, 'departamentos' =>  true);

    public $actsAs = array('Authorize.HabtmAcl' => array('type' => 'requester'));

	public $hasAndBelongsToMany = array(
		'Perfil' => array(
			'className'  => 'Perfis.Perfil',
			'joinTable' => 'usuario_perfis',
		) 
	);

    public $belongsTo = array(
        'Fonte' => array(
            'className'  => 'Usuarios.Fonte'
        ),
        'Contraste' => array(
            'className'  => 'Usuarios.Contraste'
        )
    );

	public $validate = array(
        'nome' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O Nome não pode ser deixado em branco.'
            )
        ),
        'telefone' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O Telefone não pode ser deixado em branco.'
            ),
            'phone' => array(
                'rule' => array('phone', '/^[0-9]{0,14}$/')
            )
        ),
        'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O E-mail não pode ser deixado em branco.'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Outro usuário com o mesmo E-mail já existe'
            ),
            'email' => array(
                'rule' => 'email',
                'message' => 'Informe um endereço de E-mail válido'
            ),
        ),
        'senha' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'on' => 'create',
                'message' => 'A Senha não pode ser deixada em branco.'
            ),
            'confirma' => array(
                'rule' => 'confirma',
                'message' => 'A senha e confirmação não conferem'
            )
        ),
        'confirmacao' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'on' => 'create',
                'message' => 'A Confirmação de Senha não pode ser deixada em branco.'
            ),
        ),


        'tamanho_fonte' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O Nome não pode ser deixado em branco.'
            ),
            'naturalNumber' => array(
                'rule' => 'naturalNumber',
                'message' => 'Valor incorreto para o campo'
            )
        ),
        'Perfil' => array(
            'multiple' => array( 
                'rule' => 'quantidadePerfil',
                'message' => 'Selecione pelo menos um perfil para o usuário'
            )
        ),
    );

    public function quantidadePerfil(){

        if (empty($this->data)) {
            return null;
        }

        if($this->data['Usuario']['nome'] = 'admin'){
            return true;
        }else{
            $qunt = count($this->data['Perfil']);
            if( $qunt >= 1 ){
                return true;
            }else{
                return false;
            }
        }
    }

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        $groupId = false;

        if(empty($this->data))
            $this->data = $this->read();

        if (isset($this->data['Perfil'])) {
            $groupId = array();
            $groups = (isset($this->data['Perfil']['Perfil'])) ? $this->data['Perfil']['Perfil'] : $this->data['Perfil'];
            foreach ($groups as $group) {
                $groupId[] = (isset($group['id'])) ? $group['id'] : $group;
            }
        }
        
        if (!$groupId) {
            return null;
        } else {
            return array('Perfil' => array('id' => $groupId));
        }
    }

    public function confirma() {
        if(!isset($this->data['Usuario']['senha']) && !isset($this->data['Usuario']['confirmacao']))
            return true;

        $senha = $this->data['Usuario']['senha'];
        $confirma = $this->data['Usuario']['confirmacao'];

        if ($senha === $confirma) {
            return true;
        } else {
            $this->invalidate('senha', 'A senha e confirmação não conferem');
            return true;
        }
    }

    protected function _findInstituicoes($state, $query, $results = array()) {
        if ($state === 'before') {
            $query['fields'] = array('Usuario.instituicao','Usuario.instituicao');
            $list = array("{n}.Usuario.instituicao", "{n}.Usuario.instituicao", null);
            $query['recursive'] = -1;
            list($query['list']['keyPath'], $query['list']['valuePath'], $query['list']['groupPath']) = $list;
            return $query;
        } elseif ($state === 'after') {
            if (empty($results)) {
                return array();
            }
            return Hash::combine($results, $query['list']['keyPath'], $query['list']['valuePath'], $query['list']['groupPath']);
        }
    }

    protected function _findDepartamentos($state, $query, $results = array()) {
        if ($state === 'before') {
            $query['fields'] = array('Usuario.departamento','Usuario.departamento');
            $list = array("{n}.Usuario.departamento", "{n}.Usuario.departamento", null);
            $query['recursive'] = -1;
            list($query['list']['keyPath'], $query['list']['valuePath'], $query['list']['groupPath']) = $list;
            return $query;
        } elseif ($state === 'after') {
            if (empty($results)) {
                return array();
            }
            return Hash::combine($results, $query['list']['keyPath'], $query['list']['valuePath'], $query['list']['groupPath']);
        }
    }

    public function beforeValidate($options = array())
    {
        parent::beforeValidate($options);

        if (isset($this->data['Usuario']['telefone']))
        {
            $search = array('(', ')', ' ', '-');
            foreach ($search as $s)
            {
                $this->data['Usuario']['telefone'] = str_replace($s, '', $this->data['Usuario']['telefone']);
            }
        }
    }

	public function beforeSave($options = array()) {
        parent::beforeSave($options);

        if (isset($this->data['Usuario']['senha']) && trim($this->data['Usuario']['senha']) != '') {
            $this->data['Usuario']['senha'] = AuthComponent::password($this->data['Usuario']['senha']);
        } else {
            unset($this->data['Usuario']['senha']);
        }

        foreach (array_keys($this->hasAndBelongsToMany) as $model){
            if(isset($this->data[$this->name][$model])){
                $this->data[$model][$model] = $this->data[$this->name][$model];
                unset($this->data[$this->name][$model]);
            }
        }
        return true;
    }

}