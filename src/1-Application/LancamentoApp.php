<?php
namespace Application;


use Application\Interfaces\ILancamentoApp;
use Domain\Entities\Lancamento;
use Domain\Interfaces\Repositories\ILancamentoRepository;

class LancamentoApp implements ILancamentoApp{
	private $repo;
	
	public function __construct(ILancamentoRepository $repo) {
		$this->repo=$repo;
	}
	
	public function listar($usuario){
		return $this->repo->listar($usuario);
	}
	
	public function buscar($id,$usuario){
		return $this->repo->buscar($id,$usuario);
	}
	
	public function cadastrar($tipo, $nome, $dataVencimento, $dataPagamento, $valor,$observacao, $conta, $grupo, $participante, $tipoPagamento, $usuario){
		$lancamento=new Lancamento();
		
		$lancamento->setTipo($tipo);
		$lancamento->setNome($nome);
		$lancamento->setDataVencimento($dataVencimento);
		$lancamento->setDataPagamento($dataPagamento);
		$lancamento->setValor($valor);
		$lancamento->setObservacao($observacao);
		$lancamento->setConta($conta);
		$lancamento->setGrupo($grupo);
		$lancamento->setParticipante($participante);
		$lancamento->setTipoPagamento($tipoPagamento);
		$lancamento->setUsuario($usuario);
		
		$this->repo->cadastrar($lancamento);
		
	}
	
	public function alterar($id,$usuario,$tipo, $nome, $dataVencimento, $dataPagamento, $valor,$observacao, $conta, $grupo, $participante, $tipoPagamento){
		$lancamento=$this->repo->buscar($id,$usuario);
		$lancamento->setTipo($tipo);
		$lancamento->setNome($nome);
		$lancamento->setDataVencimento($dataVencimento);
		$lancamento->setDataPagamento($dataPagamento);
		$lancamento->setValor($valor);
		$lancamento->setObservacao($observacao);
		$lancamento->setConta($conta);
		$lancamento->setGrupo($grupo);
		$lancamento->setParticipante($participante);
		$lancamento->setTipoPagamento($tipoPagamento);

		$this->repo->alterar($lancamento);
	}

	public  function excluir($id,$usuario_id){
		$this->repo->excluir($id,$usuario_id);
	}
	


}