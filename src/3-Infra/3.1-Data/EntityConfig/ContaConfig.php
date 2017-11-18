<?php
namespace Infra\Data\EntityConfig;

	class ContaConfig extends \Spot\Entity{
		
		protected static $table = 'contas';
		
		//Método do spot para mapear colunas
		public static function fields()
		{
			return [
				'codigo'=> ['type' => 'integer', 'primary' => true, 'model' => 'id'],
				'nome'=>['type'=>'string','model' => 'nome'],
				'data_cadastro' => ['type' => 'datetime', 'model' => 'dataCadastro'],
				'data_desativacao' => ['type' => 'datetime','model' => 'dataDesativacao'],
				'padrao'=>['type'=>'integer','model' => 'padrao'],
				'usuario_id'=>['type'=>'integer','model' => 'usuario']
			];
		}

	}


