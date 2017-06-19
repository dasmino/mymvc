<?php 
   require_once(dirname(__FILE__).'/Router.php');
   class App
   {
   	 private $router;
   	function __construct()
   	{
       $this->router = new Router;
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
       	echo '404 notfound';
       }); 
   	}
   	function run(){
   		$this->router->run();
   	}

   }
 ?>