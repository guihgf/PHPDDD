<?php
	namespace Infra\Data\Repositories;
	
	use Domain\Entities\Lancamento;
	use Domain\Interfaces\Repositories\ILancamentoRepository;
	use Infra\Data\EntityConfig;
	
	class LancamentoRepository extends RepositoryBase implements ILancamentoRepository {

		protected static $factory="Infra\\Data\\Factories\\LancamentoFactory";

		function __construct(){
			parent::__construct();
		}

		function listar($usuario){
			return $this->getByWhere(['usuario_id'=>$usuario],['padrao'=>'desc']);
		
		}

		function buscar($id, $usuario)
		{
			return $this->getByWhereFirst(['codigo'=>$id,'usuario_id'=>$usuario]);
		}

		function cadastrar(Lancamento $lancamento)
		{
			$this->add($lancamento);
		}

		function alterar(Lancamento $lancamento)
		{
			$this->update($lancamento);
		}
		
		function excluir($id,$usuario_id){
			$lancamento=$this->buscar($id,$usuario_id);
			if($lancamento!=null)
				$this->remove($lancamento->getId());
		}

	}