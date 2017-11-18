<?php
	namespace Infra\Data\Repositories;
	
	use Domain\Interfaces\Repositories\IParticipanteRepository as IParticipanteRepository;
	use Domain\Entities\Participante as Participante;
	use Infra\Data\EntityConfig;
	
	class ParticipanteRepository extends RepositoryBase implements IParticipanteRepository {

		protected static $factory="Infra\\Data\\Factories\\ParticipanteFactory";

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

		function cadastrar(Participante $participante)
		{
			$this->add($participante);
		}

		function alterar(Participante $participante)
		{
			$this->update($participante);
		}
		
	}