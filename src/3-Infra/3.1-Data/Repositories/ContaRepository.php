<?php
	namespace Infra\Data\Repositories;
	
	use Domain\Interfaces\Repositories\IContaRepository as IContaRepository;
	use Domain\Entities\Conta as Conta;
	use Infra\Data\EntityConfig;
	
	class ContaRepository extends RepositoryBase implements IContaRepository {

		protected static $factory="Infra\\Data\\Factories\\ContaFactory";

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

		function cadastrar(Conta $conta)
		{
			$this->add($conta);
		}

		function alterar(Conta $conta)
		{
			$this->update($conta);
		}
		
		function buscarContaPadrao($usuario){
			return $this->getByWhereFirst(['usuario_id'=>$usuario,'padrao'=>'2']);
		}

	}