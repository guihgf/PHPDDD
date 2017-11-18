<?php
    namespace Presentation\Controllers;

    use Api\Rest;
	use Application\Interfaces\ILancamentoApp;
	use Application\Interfaces\IContaApp;
	use Application\Interfaces\IGrupoLancamentoApp;
	use Application\Interfaces\IParticipanteApp;
	use Application\Interfaces\ITipoPagamentoApp;
	use Infra\Ioc;
    
    class LancamentoController extends Rest\Rest {
    	private $app;
    	private $appConta;
    	private $appGrupo;
    	private $appParticipante;
    	private $appTipoPagamento;
    	
        function __construct(ILancamentoApp $app,IContaApp $appConta,IGrupoLancamentoApp $appGrupo,IParticipanteApp $appParticipante,
        					ITipoPagamentoApp $appTipoPagamento){
            $this->app=$app;
            $this->appConta=$appConta;
            $this->appGrupo=$appGrupo;
            $this->appParticipante=$appParticipante;
            $this->appTipoPagamento=$appTipoPagamento;
			$this->middleware('auth');
        }

		/**
		 * @GET
		 */
        function index(){
 			$usuario=$_SESSION["usuario"];
 			
 			$lancamentos=$this->convertToArray($this->app->listar($usuario));
 			
        	$dados=array("lancamentos"=>$lancamentos);

        	$this->view_with_masterpage("Shared/menu", "Lancamentos/index", $dados);
        }

		/**
		 * @GET
		 */
        function nova(){
        	$contas=$this->convertToArray($this->appConta->listarAtivas($_SESSION["usuario"]));
        	$participantes=$this->convertToArray($this->appParticipante->listarAtivos($_SESSION["usuario"]));
        	$tipos=$this->convertToArray($this->appTipoPagamento->listarAtivos($_SESSION["usuario"]));
        	$grupos=$this->appGrupo->listarGruposDespesas($_SESSION["usuario"]);
        	
        	$dados=array("contas"=>$contas,
        				 "participantes"=>$participantes,
    					 "tipos"=>$tipos,
    					 "grupos"=>$grupos);
			
        	$this->view_with_masterpage("Shared/menu", "Lancamentos/cadastrar",$dados);
        }

		/**
		 * @POST
		 */
        function cadastrar(){
			$tipo=$_POST["tipo"];
			$nome=$_POST["nome"];
			$dataVencimento=$_POST["data_vencimento"];
			$dataPagamento=$_POST["data_pagamento"];
			$valor=$_POST["valor"];
			$conta=$_POST["conta"];
			$grupo=$_POST["grupo"];
			$participante=$_POST["participante"];
			$tipoPagamento=$_POST["tipo_pagamento"];
        	
        	try{
        		$this->app->cadastrar($tipo, $nome, $dataVencimento, $dataPagamento, $valor,$observacao, $conta, $grupo, $participante, $tipoPagamento, $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Lançamento salvo com sucesso.";
        		$this->redirect("lancamentos", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();

        		$dados=array("lancamento"=>array("tipo"=>$tipo,
												 "nome"=>$nome,
					 							 "data_vencimento"=>$dataVencimento,
												 "data_pagamento"=>$dataPagamento,
												 "valor"=>$valor,
												 "observacao"=>$observacao,
												 "conta"=>$conta,
												 "grupo"=>$grupo,
												 "participante"=>$participante,
												 "tipo_pagamento"=>$tipoPagamento
					));
        		
        		$this->view_with_masterpage("Shared/menu", "Lancamentos/cadastrar",$dados);
        	}
        }

		/**
		 * @POST
		 */
		function alterar(){
			$codigo=$_POST["codigo"];
			$tipo=$_POST["tipo"];
			$nome=$_POST["nome"];
			$dataVencimento=$_POST["data_vencimento"];
			$dataPagamento=$_POST["data_pagamento"];
			$valor=$_POST["valor"];
			$conta=$_POST["conta"];
			$grupo=$_POST["grupo"];
			$participante=$_POST["participante"];
			$tipoPagamento=$_POST["tipo_pagamento"];
		
			try{
				$this->app->alterar($codigo,$_SESSION["usuario"],$tipo, $nome, $dataVencimento, $dataPagamento, $valor,$observacao, $conta, $grupo, $participante, $tipoPagamento);
				$_SESSION["msg_ok"]="Lançamento alterado com sucesso.";
				$this->redirect("lancamentos", "index");
			}
			catch (\Exception $e){
				$_SESSION["msg_erro"]=$e->getMessage();

				$dados=array("lancamento"=>array("id"=>$codigo,
												"tipo"=>$tipo,
												"nome"=>$nome,
												"data_vencimento"=>$dataVencimento,
												"data_pagamento"=>$dataPagamento,
												"valor"=>$valor,
												"observacao"=>$observacao,
												"conta"=>$conta,
												"grupo"=>$grupo,
												"participante"=>$participante,
												"tipo_pagamento"=>$tipoPagamento));

				$this->view_with_masterpage("Shared/menu", "Contas/cadastrar",$dados);
			}
		}

		/**
		 * @GET
		 */
        function editar(){
        	$id=$_GET["id"];
        	
        	try{
        		$lancamento=$this->app->buscar($id, $_SESSION["usuario"]);

				$lancamento=$this->convertToArray($lancamento);
        	        		
        		$dados=array("lancamento"=>$lancamento[0]);
        		
        		$this->view_with_masterpage("Shared/menu","Lancamentos/cadastrar",$dados);
        	}
        	catch(\Exception $e){
        		$_SESSION["msg_erro"]="Não foi possivel buscar o lançamento";
        		
        		$this->redirect("lancamentos", "index");
        	}
        }

		/**
		 * @GET
		 */
        function excluir(){
        	try{
        		$this->app->excluir($_GET["id"], $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Lançamento removido com sucesso.";
        		$this->redirect("lancamentos", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();
        		$this->redirect("lancamentos", "index");
        	}
        }

    }


    
        
