<?php
	session_start();
?>
<?php
	class User extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function signup()
		{
			if (isset($_POST['submit'])) {
				if($_POST['username']!= '' && $_POST['password']!=''&& $_POST['fullname'])
				{
					$query = $this->model->getUserName($_POST['username']);
					$result = mysqli_fetch_assoc($query);
					if($result['username'] == $_POST['username'])
					{
						$error = "Username Bị Trùng";
					}else{
						$data = array('username' =>$_POST['username'] ,'password'=>$_POST['password'],'fullname'=>$_POST['fullname'] );
						$this->model->Insert($data);
						$error = "Đăng ký thành công";
					}
				}
				else
				{
					$error = "Không Nhập đủ thông tin";
				}
			}else{
				$error = "";
			}
			$myData = array('path' =>'signup','message'=>$error);
			$this->view->render("index",$myData);
		}
		public function login()
		{
			if (!isset($_SESSION['USERNAME'])) {
			if (isset($_POST['submit'])) {
				if($_POST['username']!= '' && $_POST['password']!='')
				{
					$data = $_POST['username'];
					$query = $this->model->getUserName($data);
					$result = mysqli_fetch_assoc($query);
					if($result['password'] == $_POST['password']){
						$_SESSION['USERNAME'] = $result['username'];
						$_SESSION['FULLNAME'] = $result['fullname'];
						$data = array(	'path'=>'hello',
										'pathx'=>'menu',
										'username' => $_SESSION['USERNAME'],
										'fullname'=>$_SESSION['FULLNAME'],
										);
						$this->view->render("index",$data);
					}else{
						$error = "Đăng Nhập Thất Bại";
						$myData = array('path' =>'login','message'=>$error);
						$this->view->render("index",$myData);
					}		
				}
				else
				{
					$error = "Không Nhập đủ thông tin";
					$myData = array('path' =>'login','message'=>$error);
					$this->view->render("index",$myData);
				}
			}else{

				$error = "";
				$myData = array('path' =>'login','message'=>$error);
				$this->view->render("index",$myData);
			}
		}else{
			$data = array('path'=>'hello','pathx'=>'menu','username' => $_SESSION['USERNAME'],'fullname'=>$_SESSION['FULLNAME']);
			$this->view->render("index",$data);
		}
			//$myData = array('path' =>'login','message'=>$error);
			//$this->view("index",$myData);
			
		}
		public function logout()
		{
			$myData = array('path' =>'logout');
			$this->view->render("index",$myData);
		}
	}