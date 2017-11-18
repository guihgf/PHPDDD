<?php
    namespace Presentation\Controllers;

    use Api\Rest;
    use Infra\Ioc;
    use Application\Interfaces\IContaApp as IContaApp;
    
    class ContaController extends Rest\Rest {
    	private $app;
    	
        function __construct(IContaApp $app){
            $this->app=$app;
			$this->middleware('auth');
        }

		/**
		 * @GET
		 */
        function index(){
 			$usuario=$_SESSION["usuario"];
 			
 			$contas=$this->convertToArray($this->app->listar($usuario));
 			
        	$dados=array("contas"=>$contas);

        	$this->view_with_masterpage("Shared/menu", "Contas/index", $dados);
        }

		/**
		 * @GET
		 */
        function nova(){
        	$this->view_with_masterpage("Shared/menu", "Contas/cadastrar");
        }

		/**
		 * @POST
		 */
        function cadastrar(){
        	$nome=$_POST["nome"];
        	$padrao= $_POST["padrao"];
        	
        	try{
        		$this->app->cadastrar($nome,$padrao, $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Conta salva com sucesso.";
        		$this->redirect("contas", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();

        		$dados=array("conta"=>array("nome"=>$nome,"padrao"=>$padrao));
        		
        		$this->view_with_masterpage("Shared/menu", "Contas/cadastrar",$dados);
        	}
        }

		/**
		 * @POST
		 */
		function alterar(){
			$codigo=$_POST["codigo"];
			$nome=$_POST["nome"];
			$padrao= $_POST["padrao"];
		
			try{
				$this->app->alterar($codigo,$_SESSION["usuario"],$nome,$padrao);
				$_SESSION["msg_ok"]="Conta alterada com sucesso.";
				$this->redirect("contas", "index");
			}
			catch (\Exception $e){
				$_SESSION["msg_erro"]=$e->getMessage();

				$dados=array("conta"=>array("id"=>$codigo,"nome"=>$nome,"padrao"=>$padrao));

				$this->view_with_masterpage("Shared/menu", "Contas/cadastrar",$dados);
			}
		}

		/**
		 * @GET
		 */
        function editar(){
        	$id=$_GET["id"];
        	
        	try{
        		$conta=$this->app->buscar($id, $_SESSION["usuario"]);
        		
        		$conta=$this->convertToArray($conta);
        	        		
        		$dados=array("conta"=>$conta[0]);
        		
        		$this->view_with_masterpage("Shared/menu","Contas/cadastrar",$dados);
        	}
        	catch(\Exception $e){
        		$_SESSION["msg_erro"]="Não foi possivel buscar a conta";
        		
        		$this->redirect("contas", "index");
        	}
        }

		/**
		 * @GET
		 */
        function alterarStatus(){
        	try{
        		$this->app->alterarStatus($_GET["id"], $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Status alterado com sucesso.";
        		$this->redirect("contas", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();
        		$this->redirect("contas", "index");
        	}
        }

    }


    
        
