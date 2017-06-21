<?php 
   require_once(dirname(__FILE__).'/Router.php');
   // require_once(dirname(__FILE__).'/../controllers/HomeController.php');
   require_once(dirname(__FILE__).'/Autoload.php');

   use app\core\Router;
   class App
   {
   	private $router;

    public static $config;
   	function __construct()
   	{
       new Autoload;
       $this->router = new Router;

       $this->router->get('/','HomeController@index');
       $this->router->get('/{id}',function(){
       	 echo 'day la tran App';
       });
       $this->router->get('/user',function(){
       	 echo 'day la tran user';
       });
       $this->router->any('/news/',function($cate,$page){
       	 echo 'cate: '.$cate;
       	 echo 'page: '.$page;
       });
       $this->router->get('/product/{category}/{page}',function($cate,$page){
       	  echo 'cate: '.$cate.'<br/>';
       	  echo 'page: '.$page;
       });
       $this->router->any('*',function(){
       	echo '<h1>404 notfound</h1>';
       }); 
   	}
    public static function setConfig($config){
      self::$config = $config;
    }
    public static function getConfig(){
      return self::$config;
    }
   	function run(){
   		$this->router->run();
   	}

   }
 ?>