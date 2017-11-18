<?php

namespace Infra\Data\EntityConfig;

	class UsuarioConfig extends \Spot\Entity{
		
		protected static $table = 'usuarios';
		
		//M�todo do spot para mapear colunas
		public static function fields()
		{
			return [
			'id'=> ['type' => 'integer', 'primary' => true,'model'=>'id'],
			'email'=> ['type' => 'string','model'=>'email'],
			'nome'=> ['type' => 'string','model'=>'nome'],
			'senha'=>['type'=>'string','model'=>'senha'],
			'data_cadastro' => ['type' => 'datetime','model'=>'dataCadastro'],
			'data_cancelamento' => ['type' => 'datetime','model'=>'dataCancelamento'],
			'data_reativacao'=>['type'=>'datetime','model'=>'dataReativacao'],
			'status'=>['type'=>'integer','model'=>'status']
			];
		}
	}

