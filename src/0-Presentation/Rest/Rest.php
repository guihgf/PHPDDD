<?php

namespace Api\Rest;

class Rest {

	public $_allow = array();
	public $_content_type = "application/json";
	public $_request = array();

	private $_method = "";
	private $_code = 200;
	private $middleware;

	public function __construct(){
		$this->inputs();
	}

	public function processApi(){

		$nome_url=explode('/',$_SERVER['REQUEST_URI']);

		$action =$nome_url[count($nome_url)-1];

		if($action =="")
			$action =$nome_url[count($nome_url)-2];

		$action  = explode('?',$action );

		if(count($action )>0)
			$action =$action[0];

		if((int)method_exists($this,$action ) > 0) {

			$this->validate_request($action);
			if($this->middleware!=null)
				$this->middleware->exec($action);

			$this->$action();
		}
		else{
			$this->validate_request('index');
			if($this->middleware!=null)
				$this->middleware->exec('index');
			$this->index();
		}

	}

	public function view($view,$data=null){
		include($GLOBALS['base_project']."Views/".$view.".php");
	}

	public function view_with_masterpage($masterpage,$page,$data=null){
		$page=$GLOBALS['base_project']."Views/".$page.".php";

		include($GLOBALS['base_project']."/Views/".$masterpage.".php");
	}

	public function redirect($controller,$method){
		header("Location:".$GLOBALS['base_site'].$controller."/".$method);
	}

	function convertToArray($values){
		$obj=array();

		if(count($values)>0){
			foreach ($values as $data){
				$destinationReflection = new \ReflectionObject($data);
				$destinationProperties = $destinationReflection->getProperties();

				$prop=array();
				foreach ($destinationProperties as $destinationProperty) {
					$name = $destinationProperty->getName();
					$propDest = $destinationReflection->getProperty($name);
					$propDest->setAccessible(true);
					$prop[$name]=$propDest->getValue($data);
				}

				array_push($obj, $prop);
			}

			if($obj==array()){
				$data=$values;
				$destinationReflection = new \ReflectionObject($data);
				$destinationProperties = $destinationReflection->getProperties();

				$prop=array();
				foreach ($destinationProperties as $destinationProperty) {
					$name = $destinationProperty->getName();
					$propDest = $destinationReflection->getProperty($name);
					$propDest->setAccessible(true);
					$prop[$name]=$propDest->getValue($data);
				}

				array_push($obj, $prop);
			}
		}


		return $obj;
	}
	public function get_referer(){
		return $_SERVER['HTTP_REFERER'];
	}

	public function response($data,$status){
		$this->_code = ($status)?$status:200;
		$this->set_headers();
		echo $data;
		exit;
	}

	private function get_status_message(){
		$status = array(
			100 => 'Continue',
			101 => 'Switching Protocols',
			200 => 'OK',
			201 => 'Created',
			202 => 'Accepted',
			203 => 'Non-Authoritative Information',
			204 => 'No Content',
			205 => 'Reset Content',
			206 => 'Partial Content',
			300 => 'Multiple Choices',
			301 => 'Moved Permanently',
			302 => 'Found',
			303 => 'See Other',
			304 => 'Not Modified',
			305 => 'Use Proxy',
			306 => '(Unused)',
			307 => 'Temporary Redirect',
			400 => 'Bad Request',
			401 => 'Unauthorized',
			402 => 'Payment Required',
			403 => 'Forbidden',
			404 => 'Not Found',
			405 => 'Method Not Allowed',
			406 => 'Not Acceptable',
			407 => 'Proxy Authentication Required',
			408 => 'Request Timeout',
			409 => 'Conflict',
			410 => 'Gone',
			411 => 'Length Required',
			412 => 'Precondition Failed',
			413 => 'Request Entity Too Large',
			414 => 'Request-URI Too Long',
			415 => 'Unsupported Media Type',
			416 => 'Requested Range Not Satisfiable',
			417 => 'Expectation Failed',
			500 => 'Internal Server Error',
			501 => 'Not Implemented',
			502 => 'Bad Gateway',
			503 => 'Service Unavailable',
			504 => 'Gateway Timeout',
			505 => 'HTTP Version Not Supported');
		return ($status[$this->_code])?$status[$this->_code]:$status[500];
	}

	public function get_request_method(){
		return $_SERVER['REQUEST_METHOD'];
	}

	private function inputs(){
		switch($this->get_request_method()){
			case "POST":
				$this->_request = $this->cleanInputs($_POST);
				break;
			case "GET":
			case "DELETE":
				$this->_request = $this->cleanInputs($_GET);
				break;
			case "PUT":
				parse_str(file_get_contents("php://input"),$this->_request);
				$this->_request = $this->cleanInputs($this->_request);
				break;
			default:
				$this->response('',406);
				break;
		}
	}

	private function cleanInputs($data){
		$clean_input = array();
		if(is_array($data)){
			foreach($data as $k => $v){
				$clean_input[$k] = $this->cleanInputs($v);
			}
		}else{
			if(get_magic_quotes_gpc()){
				$data = trim(stripslashes($data));
			}
			$data = strip_tags($data);
			$clean_input = trim($data);
		}
		return $clean_input;
	}

	private function set_headers(){
		header("HTTP/1.1 ".$this->_code." ".$this->get_status_message());
		header("Content-Type:".$this->_content_type);
	}

	private function validate_request($metodo){
		$c = new \ReflectionClass($this);
		$m = $c->getMethod($metodo);
		$s = $m->getDocComment();
		$s = str_replace('/*', '', $s);
		$s = str_replace('*/', '', $s);
		$s = str_replace('*', '', $s);
		$aTags = explode('@', $s);

		if($this->get_request_method() != preg_replace('/\s+/', '', $aTags[1]))
		{
			$this->response('Requisi��o inv�lida!',406);
		}
	}

	protected function middleware($middleware)
	{
		include($GLOBALS['base_project'].'Middleware/'.ucwords($middleware).'Mid.php');

		$middleware='Presentation\\Middleware\\'.ucwords($middleware).'Mid';

		$this->middleware=new $middleware();

		return $this->middleware;

	}
}

?>