<?php 	
    namespace app\controllers;

    /**
    * 
    */
    class HomeController 
    {
    	
    	function __construct()
    	{
    		// echo 'HomeController';
    	}

    	function index($list,$page){

    		echo "Home index";
    		echo $page;
    		echo $list;
    	}
    }
 
 ?>	