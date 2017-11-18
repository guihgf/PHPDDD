<?php
	namespace Domain\Entities;
	
	use Domain\Util\Validacoes as Validacoes;
	
	class Lancamento{
		private $id;
		private $tipo;
		private $nome;
		private $dataCadastro;
		private $dataVencimento;
		private $dataPagamento;
		private $valor;
		private $observacao;
		private $conta;
		private $grupo;
		private $participante;
		private $tipoPagamento;
		private $usuario;
		
		public function __construct(){
			$this->dataCadastro=new \DateTime();
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setNome($nome){
			Validacoes::validarTamanhoMinMax($nome, "Nome do lançamento", 5, 100);
			$this->nome=$nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getDataCadastro(){
			return $this->dataCadastro;
		}
		
		public function getDataDesativacao(){
			return $this->dataDesativacao;
		}
		/**
		 * @return mixed
		 */
		public function getTipo()
		{
			return $this->tipo;
		}

		/**
		 * @param mixed $tipo
		 */
		public function setTipo($tipo)
		{
			Validacoes::validarNulos($tipo,"Tipo de lançamento");
			$this->tipo = $tipo;
		}

		/**
		 * @return mixed
		 */
		public function getDataVencimento()
		{
			return $this->dataVencimento;
		}

		/**
		 * @param mixed $dataVencimento
		 */
		public function setDataVencimento($dataVencimento)
		{
			Validacoes::validarNulos($dataVencimento,"Data de vencimento");
			$this->dataVencimento = Validacoes::converterData($dataVencimento);
		}

		/**
		 * @return mixed
		 */
		public function getDataPagamento()
		{
			return $this->dataPagamento;
		}

		/**
		 * @param mixed $dataPagamento
		 */
		public function setDataPagamento($dataPagamento)
		{
			if($dataPagamento!=null)
				$this->dataPagamento = Validacoes::converterData($dataPagamento);
		}

		/**
		 * @return mixed
		 */
		public function getValor()
		{
			return $this->valor;
		}

		/**
		 * @param mixed $valor
		 */
		public function setValor($valor)
		{
			Validacoes::validarNulos($valor,"Valor");
			$this->valor = $valor;
		}
		
		public function getObservacao()
		{
			return $this->observacao;
		}

		public function setObservacao($observacao)
		{
			$this->observacao = $observacao;
		}
		
		/**
		 * @return mixed
		 */
		public function getConta()
		{
			return $this->conta;
		}

		/**
		 * @param mixed $conta
		 */
		public function setConta($conta)
		{
			Validacoes::validarNulos($conta,"Conta");
			$this->conta = $conta;
		}

		/**
		 * @return mixed
		 */
		public function getGrupo()
		{
			return $this->grupo;
		}

		/**
		 * @param mixed $grupo
		 */
		public function setGrupo($grupo)
		{
			$this->grupo = $grupo;
		}

		/**
		 * @return mixed
		 */
		public function getParticipante()
		{
			return $this->participante;
		}

		/**
		 * @param mixed $participante
		 */
		public function setParticipante($participante)
		{
			$this->participante = $participante;
		}

		/**
		 * @return mixed
		 */
		public function getTipoPagamento()
		{
			return $this->tipoPagamento;
		}

		/**
		 * @param mixed $tipoPagamento
		 */
		public function setTipoPagamento($tipoPagamento)
		{
			$this->tipoPagamento = $tipoPagamento;
		}
		


		public function setUsuario($id){
			Validacoes::validarNulos($id,"Usuário");
			$this->usuario=$id;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
	} 