<?php
    namespace Presentation\Controllers;

    use Api\Rest;
	use Application\Interfaces\IGrupoLancamentoApp;
	use Infra\Ioc;
    use Application\Interfaces\IContaApp as IContaApp;
    
    class GrupoLancamentoController extends Rest\Rest {
    	private $app;
    	
        function __construct(IGrupoLancamentoApp $app){
            $this->app=$app;
			$this->middleware('auth');
        }

		/**
		 * @GET
		 */
        function index(){
 			$usuario=$_SESSION["usuario"];
 			
 			$gruposLancamentos=$this->convertToArray($this->app->listar($usuario));

        	$dados=array("gruposlancamentos"=>$gruposLancamentos);

        	$this->view_with_masterpage("Shared/menu", "GruposLancamentos/index", $dados);
        }

		/**
		 * @GET
		 */
        function nova(){
        	$this->view_with_masterpage("Shared/menu", "GruposLancamentos/cadastrar");
        }

		/**
		 * @POST
		 */
        function cadastrar(){
        	$nome=$_POST["nome"];
        	$tipo= $_POST["tipo"];
        	
        	try{
        		$this->app->cadastrar($nome,$tipo, $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Grupo de lançamento salvo com sucesso.";
        		$this->redirect("gruposlancamentos", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();

        		$dados=array("grupolancamento"=>array("nome"=>$nome,"tipo"=>$tipo));
        		
        		$this->view_with_masterpage("Shared/menu", "GruposLancamentos/cadastrar",$dados);
        	}
        }

		/**
		 * @POST
		 */
		function alterar(){
			$codigo=$_POST["codigo"];
			$nome=$_POST["nome"];
			$tipo= $_POST["tipo"];
		
			try{
				$this->app->alterar($codigo,$_SESSION["usuario"],$nome,$tipo);
				$_SESSION["msg_ok"]="Grupo de lançamento alterado com sucesso.";
				$this->redirect("gruposlancamentos", "index");
			}
			catch (\Exception $e){
				$_SESSION["msg_erro"]=$e->getMessage();

				$dados=array("grupolancamento"=>array("id"=>$codigo,"nome"=>$nome,"tipo"=>$tipo));

				$this->view_with_masterpage("Shared/menu", "GruposLancamentos/cadastrar",$dados);
			}
		}

		/**
		 * @GET
		 */
        function editar(){
        	$id=$_GET["id"];
        	
        	try{
        		$grupoLancamento=$this->app->buscar($id, $_SESSION["usuario"]);

				$grupoLancamento=$this->convertToArray($grupoLancamento);
        	        		
        		$dados=array("grupolancamento"=>$grupoLancamento[0]);
        		
        		$this->view_with_masterpage("Shared/menu","GruposLancamentos/cadastrar",$dados);
        	}
        	catch(\Exception $e){
        		$_SESSION["msg_erro"]="Não foi possível buscar o grupo de lançamento.";
        		
        		$this->redirect("gruposlancamentos", "index");
        	}
        }

		/**
		 * @GET
		 */
        function alterarStatus(){
        	try{
        		$this->app->alterarStatus($_GET["id"], $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Status alterado com sucesso.";
        		$this->redirect("gruposlancamentos", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();
        		$this->redirect("gruposlancamentos", "index");
        	}
        }
        
        /**
         * @GET
         */
        function listarGruposDespesas(){
        	try{
        		echo json_encode($this->app->listarGruposDespesas($_SESSION["usuario"]));
        	}
        	catch(\Exception $e){
        		echo $e->getMessage();
        	}
        } 
        
        /**
         * @GET
         */
        function listarGruposReceitas(){
        	try{
        		echo json_encode($this->app->listarGruposReceitas($_SESSION["usuario"]));
        	}
        	catch(\Exception $e){
        		echo $e->getMessage();
        	}
        }
        

    }


    
        
