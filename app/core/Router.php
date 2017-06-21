<?php 
class Router{
 
     private $routers = [];
	function __construct(){

	}
	private function getRequestUrl(){
		$basePath = App::getConfig()['basePath'];
		$url =  isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
		$url = str_replace($basePath, '', $url);
		$url = $url === '' || empty($url) ? '/' : $url;
		return $url;
	}
	private function getRequestMethod(){
		$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
		return $method;
	}
	
	private function addRouter($method,$url,$action){
       $this->routers[] = [$method,$url,$action];
	}
	public function get($url,$action){
       $this->addRouter('GET',$url,$action);
	}
	public function post($url,$action){
       $this->addRouter('POST',$url,$action);
      
	}
	public function any($url,$action){
       $this->addRouter('GET|POST',$url,$action);
      
	}
	public function map(){
		$checkRoute = false;
		$params = [];
		$requestURL = $this->getRequestURL();
		// echo $requestURL.'<br>';
		$requestMethod = $this->getRequestMethod();
		$routers = $this->routers;
		foreach ($routers as  $route) {
			list($method,$url,$action) = $route;
		// echo $url.'<br>';

			if(strrpos($method, $requestMethod) === FALSE){
				  continue;
			}

			if($url === '*'){
				$checkRoute = true;
			}elseif(strrpos($url, '{') === FALSE){
               if( strcmp(strtolower($url), strtolower($requestURL)) === 0 ){
               		$checkRoute = true;
               }else{
                  	continue;
               }
			}elseif(strrpos($url, '}') === FALSE){
               	    continue;
	           }else{
	           	$routeParams = explode('/', $url);
	           	$requestParams = explode('/', $requestURL);
	           	if(count($routeParams) !== count($requestParams)){
	           		continue;
	           	}
	           	foreach ($routeParams as $k => $rp) {
	           		if( preg_match('/^{\w+}$/', $rp)){
	           			$params[] = $requestParams[$k];
	           		}
	           	}
                $checkRoute = true;
	           }
            

			if($checkRoute === true){
				if(is_callable($action)){
					call_user_func_array($action, $params);
				}
				elseif(is_string($action)){
					$this->compieRoute($action,$params);
				}
				return;
			}
		}
		return;
	}

	private function compieRoute($action, $params){
		if (count(explode('@', $action)) !==2) {
			die('Router error !!!');
		}
		$className = explode('@', $action)[0];
		$MethodName = explode('@', $action)[1];
		
		$classNamespace = 'app\\controllers\\'.$className;

		if( class_exists($classNamespace)){
			$object = new $classNamespace;
			if( method_exists($classNamespace, $MethodName)){
				call_user_func_array([$object,$MethodName], $params);
			}else{
				die('<h1>class'.$MethodName.'not found</h1>');
			}
			}else{
				die('<h1>class'.$classNamespace.'not found</h1>');
		}
	}
	function run(){
		// echo "Router Running";
		// $method = $this->getRequestMethod();
		// echo $method;
		// echo '<pre>';
		// print_r($this->routers);
		$this->map();
	}

}

?>