<?php
	namespace Domain\Entities;
	
	use Domain\Util\Validacoes as Validacoes;

	class Usuario{
		private $id;
		private $email;
		private $senha;
		private $nome;
		private $dataCadastro;
		private $dataCancelamento;
		private $dataReativacao;
		private $status;
		
		public function __construct(){
			$this->status=1;
			$this->id=0;
			$this->dataCadastro=new \DateTime();
		}
		public function getId(){
			return $this->id;
		}
		
		public function setEmail($email){
			Validacoes::validarTamanho($email, "Email", 5, 150);
			Validacoes::validarEmail($email);
			$this->email=$email;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setNome($nome){
			Validacoes::validarTamanho($nome,"Nome",5,150);
			$this->nome=$nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getDataCadastro(){
			return $this->dataCadastro;
		}
		
		public function setDataCancelamento($data_cancelamento){
			Validacoes::validarNulos($data_cancelamento,"Data Cancelamento");
			$this->dataCancelamento=Validacoes::converterData($data_cancelamento);
		}
			
		public function getDataCancelamento(){
			return $this->dataCancelamento;
		}
		
		public function setDataReativacao($data_reativacao){
			Validacoes::validarNulos($data_reativacao,"Data Reativação");
			$this->dataReativacao=Validacoes::converterData($data_reativacao);
		}
		
		public function getDataReativacao(){
			return $this->dataReativacao;
		}
		
		public function gerarSenha($senha){
			Validacoes::validarTamanho($senha, "Senha", 5, 20);			
			$this->senha=md5($senha);
		}
		
		public function verificarSenha($senha){
			if($this->senha!=md5($senha))
				throw  new \Exception("Usuário ou senha inválidos.");
		}
		
		public function setStatus($status){
			Validacoes::validarNulos($status,"Status");
			$this->status=$status;
		}
		
		public function getStatus(){
			return $this->status;
		}

		public function getSenha(){
			return $this->senha;
		}
		
		
	}

?>