<?php
namespace Infra\Data\EntityConfig;

	class TipoPagamentoConfig extends \Spot\Entity{
		
		protected static $table = 'tipos_pagamentos';
		
		//Método do spot para mapear colunas
		public static function fields()
		{
			return [
				'codigo'=> ['type' => 'integer', 'primary' => true, 'model' => 'id'],
				'nome'=>['type'=>'string','model' => 'nome'],
				'data_cadastro' => ['type' => 'datetime', 'model' => 'dataCadastro'],
				'data_desativacao' => ['type' => 'datetime','model' => 'dataDesativacao'],
				'usuario_id'=>['type'=>'integer','model' => 'usuario']
			];
		}

	}


