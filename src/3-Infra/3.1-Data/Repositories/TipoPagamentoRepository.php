<?php
	namespace Infra\Data\Repositories;
	
	use Domain\Interfaces\Repositories\ITipoPagamentoRepository as ITipoPagamentoRepository;
	use Domain\Entities\TipoPagamento as TipoPagamento;
	use Infra\Data\EntityConfig;
	
	class TipoPagamentoRepository extends RepositoryBase implements ITipoPagamentoRepository {

		protected static $factory="Infra\\Data\\Factories\\TipoPagamentoFactory";

		function __construct(){
			parent::__construct();
		}

		function listar($usuario){
			return $this->getByWhere(['usuario_id'=>$usuario],['codigo'=>'desc']);
		
		}

		function buscar($id, $usuario)
		{
			return $this->getByWhereFirst(['codigo'=>$id,'usuario_id'=>$usuario]);
		}

		function cadastrar(TipoPagamento $tipoPagamento)
		{
			$this->add($tipoPagamento);
		}

		function alterar(TipoPagamento $tipoPagamento)
		{
			$this->update($tipoPagamento);
		}

	}