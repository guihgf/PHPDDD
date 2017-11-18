<?php
namespace Infra\Data\EntityConfig;

	class GrupoLancamentoConfig extends \Spot\Entity{
		
		protected static $table = 'grupos_lancamentos';
		
		//Método do spot para mapear colunas
		public static function fields()
		{
			return [
				'codigo'=> ['type' => 'integer', 'primary' => true, 'model' => 'id'],
				'nome'=>['type'=>'string','model' => 'nome'],
				'data_cadastro' => ['type' => 'datetime', 'model' => 'dataCadastro'],
				'data_desativacao' => ['type' => 'datetime','model' => 'dataDesativacao'],
				'tipo'=>['type'=>'integer','model' => 'tipo'],
				'usuario_id'=>['type'=>'integer','model' => 'usuario']
			];
		}

	}


