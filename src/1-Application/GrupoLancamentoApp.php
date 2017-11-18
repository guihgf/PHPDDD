<?php
namespace Application;

use Application\Interfaces\IGrupoLancamentoApp;
use Domain\Entities\GrupoLancamento;
use Domain\Interfaces\Repositories\IGrupoLancamentoRepository;

class GrupoLancamentoApp implements IGrupoLancamentoApp{
	private $repo;
	
	public function __construct(IGrupoLancamentoRepository $repo) {
		$this->repo=$repo;
	}
	
	public function listar($usuario){
		return $this->repo->listar($usuario);
	}
	
	public function listarAtivos($usuario){
		$grupos=[];
		foreach($this->repo->listar($usuario) as $grupo){
			if($grupo->getDataDesativacao()==null)
				array_push($grupos,$grupo);
		}
		return $grupos;
	}
	
	public function listarGruposDespesas($usuario){
		$grupos=[];
		
		foreach($this->listarAtivos($usuario) as $grupo){
			if($grupo->getTipo()!=2)
				array_push($grupos,["id"=>$grupo->getId(),"nome"=>$grupo->getNome()]);
		}

		return $grupos;
	}
	
	public function listarGruposReceitas($usuario){
		$grupos=[];
		
		foreach($this->listarAtivos($usuario) as $grupo){
			if($grupo->getTipo()!=1)
				array_push($grupos,["id"=>$grupo->getId(),"nome"=>$grupo->getNome()]);
		}
		
		return $grupos;
	}

	public function buscar($id,$usuario){
		return $this->repo->buscar($id,$usuario);
	}
	
	public function cadastrar($nome,$tipo,$usuario){
		$grupoLancamento=new GrupoLancamento();

		$grupoLancamento->setNome($nome);
		$grupoLancamento->setTipo($tipo);
		$grupoLancamento->setUsuario($usuario);

		$this->repo->cadastrar($grupoLancamento);
		
	}
	
	public function alterar($id,$usuario,$nome,$tipo){
		$grupoLancamento=$this->repo->buscar($id,$usuario);
		$grupoLancamento->setNome($nome);
		$grupoLancamento->setTipo($tipo);
		$this->repo->alterar($grupoLancamento);
		
	}
	
	public function alterarStatus($id,$usuario){
		$grupoLancamento=$this->repo->buscar($id,$usuario);
		$grupoLancamento->alterarStatus();
		$this->repo->alterar($grupoLancamento);
		
	}
}