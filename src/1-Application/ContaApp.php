<?php
namespace Application;

use Domain\Interfaces\Repositories\IContaRepository as IContaRepository;
use Application\Interfaces\IContaApp as IContaApp;
use Domain\Entities\Conta as Conta;

class ContaApp implements IContaApp{
	private $repo;
	
	public function __construct(IContaRepository $repo) {
		$this->repo=$repo;
	}
	
	public function listar($usuario){
		return $this->repo->listar($usuario);
	}
	
	public function listarAtivas($usuario){
		$contas=[];
		foreach($this->repo->listar($usuario) as $conta){
			if($conta->getDataDesativacao()==null)
				array_push($contas,$conta);
		}
		return $contas;
	}
	
	public function buscar($id,$usuario){
		return $this->repo->buscar($id,$usuario);
	}
	
	public function cadastrar($nome,$padrao,$usuario){
		$conta=new Conta();
		
		$conta->setNome($nome);
		$conta->setPadrao($padrao);
		$conta->setUsuario($usuario);
		
		$this->alterarPadrao($usuario);
		
		$this->repo->cadastrar($conta);
		
	}
	
	public function alterar($id,$usuario,$nome,$padrao){
		$conta=$this->repo->buscar($id,$usuario);
		$conta->setNome($nome);
		$conta->setPadrao($padrao);
		$this->alterarPadrao($usuario,$id);	
		$this->repo->alterar($conta);
		
	}
	
	public function alterarStatus($id,$usuario){
		$conta=$this->repo->buscar($id,$usuario);
		$conta->alterarStatus();
		$this->repo->alterar($conta);
		
	}
	
	private function alterarPadrao($usuario,$id=null){
		
		$contaPadrao=$this->repo->buscarContaPadrao($usuario);
		
		if(isset($contaPadrao) && $contaPadrao->getId()!=$id){
			$contaPadrao->setPadrao(1); //Não será mais padrão
			$this->repo->alterar($contaPadrao);
		}
	}

}