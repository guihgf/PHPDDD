<?php
    namespace Presentation\Controllers;

    use Api\Rest;
    use Infra\Ioc;
    use Application\Interfaces\IUsuarioApp as IUsuarioApp;

    
    class UsuarioController extends Rest\Rest {
    	private $app;
    	
        function __construct(IUsuarioApp $app){
            $this->app=$app;
			$this->middleware("auth")->only('encerrar_sessao');
        }

		/**
		 * @GET
		 */
		function index(){
            if (isset($_SESSION["usuario"]))
                $this->redirect("home", "index");
            else
			    $this->view("Login/index");
        }

        /**
         * @POST
         */
        function autenticar(){
			$email=$_POST["email"];
			$senha=$_POST["senha"];
			
			try{
				$usuario=$this->app->autenticar($email, $senha);

				if($usuario!=null){
					$_SESSION["usuario"]= $usuario->getId();
					$_SESSION["nome"]= $usuario->getNome();
					$_SESSION["email"]= $usuario->getEmail();
					$_SESSION["facebook_user"]= "N";

                    $this->redirect("home", "index");
				}
			}
			catch(\Exception $e){
				$dados=["erro"=>$e->getMessage(),"email"=>$email];
				$this->view("Login/index",$dados);
			}

        }

        /**
         * @GET
         */
        function encerrar_sessao(){
            session_destroy();
            $this->redirect("login","index");
        }
    }



    
        
