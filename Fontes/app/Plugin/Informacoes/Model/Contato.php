<?php 

App::uses('InformacoesAppModel', 'Informacoes.Model');

class Contato extends InformacoesAppModel {

	public $name = 'Contato';

	public $useTable = false;

	public $validate = array(
        'nome' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O Nome não pode ser deixado em branco.'
            )
        ),
        'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O E-mail não pode ser deixado em branco.'
            ),
            'email' => array(
                'rule' => 'email',
                'message' => 'Informe um endereço de E-mail válido'
            ),
        ),
        'assunto' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'O Assunto não pode ser deixado em branco.'
            )
        ),
        'descricao' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'A Descrição não pode ser deixada em branco.'
            )
        ),
    );
}