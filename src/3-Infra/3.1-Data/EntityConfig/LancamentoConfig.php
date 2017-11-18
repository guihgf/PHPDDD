<?php
namespace Infra\Data\EntityConfig;

	class LancamentoConfig extends \Spot\Entity{
		
		protected static $table = 'lancamentos';
		
		//Método do spot para mapear colunas
		public static function fields()
		{
			return [
				'codigo'=> ['type' => 'integer', 'primary' => true, 'model' => 'id'],
				'tipo'=> ['type' => 'integer', 'model' => 'tipo'],
				'nome'=>['type'=>'string','model' => 'nome'],
				'data_cadastro' => ['type' => 'datetime', 'model' => 'dataCadastro'],
				'data_vencimento' => ['type' => 'datetime', 'model' => 'dataVencimento'],
				'data_pagamento' => ['type' => 'datetime', 'model' => 'dataPagamento'],
				'valor' => ['type' => 'double', 'model' => 'valor'],
				'observacao' => ['type' => 'string', 'model' => 'observacao'],
				'conta_id'=>['type'=>'integer','model' => 'conta'],
				'grupo_id'=>['type'=>'integer','model' => 'grupo'],
				'participante_id'=>['type'=>'integer','model' => 'participante'],
				'tipo_pagamento_id'=>['type'=>'integer','model' => 'tipoPagamento'],
				'usuario_id'=>['type'=>'integer','model' => 'usuario']
			];
		}

	}



