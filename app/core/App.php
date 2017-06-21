<?php 
   require_once(dirname(__FILE__).'/Router.php');
   require_once(dirname(__FILE__).'/../controllers/HomeController.php');
   class App
   {
   	 private $router;
   	function __construct()
   	{
       $this->router = new Router;

       $this->router->get('/{list}/{page}','HomeController@index');
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
   	function run(){
   		$this->router->run();
   	}

   }
 ?>