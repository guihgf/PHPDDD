<?php
    namespace Presentation\Controllers;

    use Api\Rest;
    use Infra\Ioc;
    use Application\Interfaces\IParticipanteApp as IParticipanteApp;
	use Spot\Exception;

	class ParticipanteController extends Rest\Rest {
    	private $app;
    	
        function __construct(IParticipanteApp $app){
            $this->app=$app;
			$this->middleware('auth');
        }

		/**
		 * @GET
		 */
        function index(){
 			$usuario=$_SESSION["usuario"];
 			
 			$participantes=$this->convertToArray($this->app->listar($usuario));
 			
        	$dados=array("participantes"=>$participantes);

        	$this->view_with_masterpage("Shared/menu", "Participantes/index", $dados);
        }

		/**
		 * @GET
		 */
        function nova(){
        	$this->view_with_masterpage("Shared/menu", "Participantes/cadastrar");
        }

		/**
		 * @POST
		 */
        function cadastrar(){
        	$nome=$_POST["nome"];
        	$telefone=$_POST["telefone"];
        	$celular=$_POST["celular"];
        	$email=$_POST["email"];
        	$rua=$_POST["rua"];
        	$numero=$_POST["numero"];
        	$bairro=$_POST["bairro"];
        	$complemento=$_POST["complemento"];
        	$cidade=$_POST["cidade"];
        	
        	try{
        		$this->app->cadastrar($nome,$telefone,$celular,$email,$rua,$numero,$bairro,$complemento,$cidade, $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Participante salvo com sucesso.";
        		$this->redirect("participantes", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();

        		$dados=array("participante"=>array("nome"=>$nome,
        										   "telefone"=>$telefone,
        										   "celular"=>$celular,
        										   "email"=>$email,
        										   "rua"=>$rua,
        										   "numero"=>$numero,
        										   "bairro"=>$bairro,
        										   "complemento"=>$complemento,
        										   "cidade"=>$cidade
        											));
        		
        		$this->view_with_masterpage("Shared/menu", "Participantes/cadastrar",$dados);
        	}
        }

		/**
		 * @POST
		 */
		function alterar(){
			$codigo=$_POST["codigo"];
			$nome=$_POST["nome"];
        	$telefone=$_POST["telefone"];
        	$celular=$_POST["celular"];
        	$email=$_POST["email"];
        	$rua=$_POST["rua"];
        	$numero=$_POST["numero"];
        	$bairro=$_POST["bairro"];
        	$complemento=$_POST["complemento"];
        	$cidade=$_POST["cidade"];
		
			try{
				$this->app->alterar($codigo,$_SESSION["usuario"],$nome,$telefone,$celular,$email,$rua,$numero,$bairro,$complemento,$cidade);
				$_SESSION["msg_ok"]="Participante alterado com sucesso.";
				$this->redirect("participantes", "index");
			}
			catch (\Exception $e){
				$_SESSION["msg_erro"]=$e->getMessage();

				$dados=array("participante"=>array("id"=>$codigo,
											"nome"=>$nome,
										   "telefone"=>$telefone,
										   "celular"=>$celular,
										   "email"=>$email,
										   "rua"=>$rua,
										   "numero"=>$numero,
										   "bairro"=>$bairro,
										   "complemento"=>$complemento,
										   "cidade"=>$cidade));

				$this->view_with_masterpage("Shared/menu", "Participantes/cadastrar",$dados);
			}
		}

		/**
		 * @GET
		 */
        function editar(){
        	$id=$_GET["id"];
        	
        	try{
        		$participante=$this->app->buscar($id, $_SESSION["usuario"]);
        		
        		$participante=$this->convertToArray($participante);
        	        		
        		$dados=array("participante"=>$participante[0]);
        		
        		$this->view_with_masterpage("Shared/menu","Participantes/cadastrar",$dados);
        	}
        	catch(\Exception $e){
        		$_SESSION["msg_erro"]="Não foi possivel buscar o participante";
        		
        		$this->redirect("participantes", "index");
        	}
        }

		/**
		 * @GET
		 */
        function alterarStatus(){
        	try{
        		$this->app->alterarStatus($_GET["id"], $_SESSION["usuario"]);
        		$_SESSION["msg_ok"]="Status alterado com sucesso.";
        		$this->redirect("participantes", "index");
        	}
        	catch (\Exception $e){
        		$_SESSION["msg_erro"]=$e->getMessage();
        		$this->redirect("participantes", "index");
        	}
        }

    }


    
        
