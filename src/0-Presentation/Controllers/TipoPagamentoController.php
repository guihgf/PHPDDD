<?php
    namespace Presentation\Controllers;

    use Api\Rest;
	use Application\Interfaces\ITipoPagamentoApp;
	use Infra\Ioc;
    
    class TipoPagamentoController extends Rest\Rest {
    	private $app;
    	
        function __construct(ITipoPagamentoApp $app){
            $this->app=$app;
			$this->middleware('auth');
        }

		/**
		 * @GET
		 */
        function index(){
 			$usuario=$_SESSION["usuario"];
 			
 			$tipoPagamentos=$this->convertToArray($this->app->listar($usuario));
 			
        	$dados=array("tipoPagamentos"=>$tipoPagamentos);

        	$this->view_with_masterpage("Shared/menu", "TipoPagamentos/index", $dados);
        }

		/**
		 * @GET
		 */
        function nova(){
        	$this->view_with_masterpage("Shared/menu", "TipoPagamentos/cadastrar");
        }

		/**
		 * @POST
		 */
        function cadastrar(){
        	$nome=$_POST["nome"];

        	try{
        		$this->app->cadastrar($nome, $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Tipo de pagamento salvo com sucesso.";
        		$this->redirect("tipopagamentos", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();

        		$dados=array("tipopagamento"=>array("nome"=>$nome));
        		
        		$this->view_with_masterpage("Shared/menu", "TipoPagamentos/cadastrar",$dados);
        	}
        }

		/**
		 * @POST
		 */
		function alterar(){
			$codigo=$_POST["codigo"];
			$nome=$_POST["nome"];
		
			try{
				$this->app->alterar($codigo,$_SESSION["usuario"],$nome);
				$_SESSION["msg_ok"]="Tipo de pagamento alterado com sucesso.";
				$this->redirect("tipopagamentos", "index");
			}
			catch (\Exception $e){
				$_SESSION["msg_erro"]=$e->getMessage();

				$dados=array("tipopagamento"=>array("id"=>$codigo,"nome"=>$nome));

				$this->view_with_masterpage("Shared/menu", "TipoPagamentos/cadastrar",$dados);
			}
		}

		/**
		 * @GET
		 */
        function editar(){
        	$id=$_GET["id"];
        	
        	try{
        		$tipoPagamento=$this->app->buscar($id, $_SESSION["usuario"]);

				$tipoPagamento=$this->convertToArray($tipoPagamento);
        	        		
        		$dados=array("tipopagamento"=>$tipoPagamento[0]);
        		
        		$this->view_with_masterpage("Shared/menu","TipoPagamentos/cadastrar",$dados);
        	}
        	catch(\Exception $e){
        		$_SESSION["msg_erro"]="Não foi possivel buscar o tipo de pagamento";
        		
        		$this->redirect("tipopagamentos", "index");
        	}
        }

		/**
		 * @GET
		 */
        function alterarStatus(){
        	try{
        		$this->app->alterarStatus($_GET["id"], $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Status alterado com sucesso.";
        		$this->redirect("tipopagamentos", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();
        		$this->redirect("tipopagamentos", "index");
        	}
        }

    }


    
        
