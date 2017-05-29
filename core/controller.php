<?php
	class Controller
	{
		public function __construct()
		{
			$this->view = new View();
		}
		public function loadModel($name)
		{
			$path = 'application/models/'.$name.'_Model.php';
			if (file_exists($path)) {
				require_once($path);
				$modelName = $name."_Model";
				$this->model = new $modelName();
			}
		}
	}
