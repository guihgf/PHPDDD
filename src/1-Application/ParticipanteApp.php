<?php
namespace Application;

use Domain\Interfaces\Repositories\IParticipanteRepository as IParticipanteRepository;
use Application\Interfaces\IParticipanteApp as IParticipanteApp;
use Domain\Entities\Participante as Participante;

class ParticipanteApp implements IParticipanteApp{
	private $repo;
	
	public function __construct(IParticipanteRepository $repo) {
		$this->repo=$repo;
	}
	
	public function listar($usuario){
		return $this->repo->listar($usuario);
	}
	
	public function listarAtivos($usuario){
		$participantes=[];
		foreach($this->repo->listar($usuario) as $participante){
			if($participante->getDataDesativacao()==null)
				array_push($participantes,$participante);
		}
		return $participantes;
	}
	
	public function buscar($id,$usuario){
		return $this->repo->buscar($id,$usuario);
	}
	
	public function cadastrar($nome,$telefone,$celular,$email,$rua,$numero,$bairro,$complemento,$cidade,$usuario){
		$participante=new Participante();
		
		$participante->setNome($nome);
		$participante->setTelefone($telefone);
		$participante->setCelular($celular);
		$participante->setEmail($email);
		$participante->setRua($rua);
		$participante->setNumero($numero);
		$participante->setBairro($bairro);
		$participante->setComplemento($complemento);
		$participante->setCidade($cidade);
		$participante->setUsuario($usuario);
		
		$this->repo->cadastrar($participante);
		
	}
	
	public function alterar($id,$usuario,$nome,$telefone,$celular,$email,$rua,$numero,$bairro,$complemento,$cidade){
		$participante=$this->repo->buscar($id,$usuario);
		$participante->setNome($nome);
		$participante->setTelefone($telefone);
		$participante->setCelular($celular);
		$participante->setEmail($email);
		$participante->setRua($rua);
		$participante->setNumero($numero);
		$participante->setBairro($bairro);
		$participante->setComplemento($complemento);
		$participante->setCidade($cidade);
		$this->repo->alterar($participante);
		
	}
	
	public function alterarStatus($id,$usuario){
		$participante=$this->repo->buscar($id,$usuario);
		$participante->alterarStatus();
		$this->repo->alterar($participante);
		
	}
}