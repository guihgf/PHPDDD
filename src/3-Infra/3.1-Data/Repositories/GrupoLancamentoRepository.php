<?php
	namespace Infra\Data\Repositories;
	
	use Domain\Interfaces\Repositories\IGrupoLancamentoRepository as IGrupoLancamentoRepository;
	use Domain\Entities\GrupoLancamento as GrupoLancamento;
	use Infra\Data\EntityConfig;
	
	class GrupoLancamentoRepository extends RepositoryBase implements IGrupoLancamentoRepository {

		protected static $factory="Infra\\Data\\Factories\\GrupoLancamentoFactory";

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

		function cadastrar(GrupoLancamento $grupoLancamento)
		{
			$this->add($grupoLancamento);
		}

		function alterar(GrupoLancamento $grupoLancamento)
		{
			$this->update($grupoLancamento);
		}
	}