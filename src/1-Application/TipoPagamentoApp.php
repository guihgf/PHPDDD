<?php
namespace Application;

use Application\Interfaces\ITipoPagamentoApp;
use Domain\Entities\TipoPagamento as TipoPagamento;
use Domain\Interfaces\Repositories\ITipoPagamentoRepository;

class TipoPagamentoApp implements ITipoPagamentoApp{
	private $repo;
	
	public function __construct(ITipoPagamentoRepository $repo) {
		$this->repo=$repo;
	}
	
	public function listar($usuario){
		return $this->repo->listar($usuario);
	}
	
	public function listarAtivos($usuario){
		$tipos=[];
		foreach($this->repo->listar($usuario) as $tipo){
			if($tipo->getDataDesativacao()==null)
				array_push($tipos,$tipo);
		}
		return $tipos;
	}
	
	public function buscar($id,$usuario){
		return $this->repo->buscar($id,$usuario);
	}
	
	public function cadastrar($nome,$usuario){
		$tipoPagamento=new TipoPagamento();

		$tipoPagamento->setNome($nome);
		$tipoPagamento->setUsuario($usuario);

		$this->repo->cadastrar($tipoPagamento);
		
	}
	
	public function alterar($id,$usuario,$nome){
		$tipoPagamento=$this->repo->buscar($id,$usuario);
		$tipoPagamento->setNome($nome);
		$this->repo->alterar($tipoPagamento);
		
	}
	
	public function alterarStatus($id,$usuario){
		$tipoPagamento=$this->repo->buscar($id,$usuario);
		$tipoPagamento->alterarStatus();
		$this->repo->alterar($tipoPagamento);
		
	}
}