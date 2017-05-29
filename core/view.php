<?php
	class View
	{
		public function __construct()
		{

		}
		public function render($viewName,$data=NULL)
		{
			if ($data!= NULL) {
				foreach ($data as $key => $value) {
				$$key = $value;
				}
			}
			$file = APP_PATH.'/'.VIEWS_PATH.'/'."frontend/".$viewName.".php";
			if(file_exists($file))
			{
				require_once($file);
			}
		}
	}