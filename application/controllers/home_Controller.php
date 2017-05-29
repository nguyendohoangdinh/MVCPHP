<?php 
	session_start();
?>
<?php
	class Home extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
				$myData = array('path' =>'gioithieu');
				$this->view->render('index',$myData);
		}
	}
