<?php
	class Bootstrap
	{
		public function __construct()
		{

		}
		public function init()
		{
			$controller = isset($_GET['c'])?$_GET['c']:"home";
			$action = isset($_GET['a'])?$_GET['a']:"index";
			$file = APP_PATH.'/'.CONTROLLERS_PATH.'/'.$controller."_Controller.php";
			if(!file_exists($file))
			{
				echo $file;
				return;
			}
			require($file);
			if(!class_exists($controller))
			{
				echo "error";
				return;
			}
			$c = new $controller();
			if (!method_exists($c, $action)){
				echo "error";
				return;
			}
			$c->loadModel($controller);
			$c->{$action}();
			
		}
	}
