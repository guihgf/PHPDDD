<?php
    namespace Presentation\Controllers;

    use Api\Rest;
    use Infra\Ioc;
    
    class HomeController extends Rest\Rest {

        function __construct(){
            $this->middleware('auth');
        }

        /**
         * @GET
         */
        function index(){

        	$this->view_with_masterpage("Shared/menu", "Home/index");
        
        }
    }


    
        
