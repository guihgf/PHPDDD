<?php
namespace Infra\Data\EntityConfig;

	class ParticipanteConfig extends \Spot\Entity{
		
		protected static $table = 'participantes';
		
		//Método do spot para mapear colunas
		public static function fields()
		{
			return [
				'codigo'=> ['type' => 'integer', 'primary' => true, 'model' => 'id'],
				'nome'=>['type'=>'string','model' => 'nome'],
				'telefone'=>['type'=>'string','model' => 'telefone'],
				'celular'=>['type'=>'string','model' => 'celular'],
				'email'=>['type'=>'string','model' => 'email'],
				'rua'=>['type'=>'string','model' => 'rua'],
				'numero'=>['type'=>'string','model' => 'numero'],
				'bairro'=>['type'=>'string','model' => 'bairro'],
				'complemento'=>['type'=>'string','model' => 'complemento'],
				'cidade'=>['type'=>'string','model' => 'cidade'],
				'data_cadastro' => ['type' => 'datetime', 'model' => 'dataCadastro'],
				'data_desativacao' => ['type' => 'datetime','model' => 'dataDesativacao'],
				'usuario_id'=>['type'=>'integer','model' => 'usuario']
			];
		}

	}

