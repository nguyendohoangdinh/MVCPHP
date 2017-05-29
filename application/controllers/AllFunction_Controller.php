<?php
	session_start();
	class AllFunction extends Controller
	{

		public function __construct()
		{
			parent::__construct();
		}
		public function ThemBaiViet()
		{
			if(isset($_SESSION)){

				$query = $this->model->getUserName($_SESSION['USERNAME']);
				$user = mysqli_fetch_assoc($query);
			}
			if (isset($_POST['submit'])) {
				if ($_POST['tieude']=='') {
					$error = "Chưa Nhập Tiêu Đề Bài Viết";
				}else if ($_POST['theloai']=='') {
					$error = "Chưa Chọn Thể Loại";
				}elseif ($_POST['noidung']=='') {
					$error = "Chưa Nhập Nội Dung";
				}elseif ($_FILES['img']['name'] == '') {
					$error = "Chưa Chọn Ảnh";
				}else{
					require_once('libs/upload_img.php');
					$upload = new Upload_Img();
					$upload->Upload("img");
					$data = array(
							'post_title'=>$_POST['tieude'],
							'category_id'=>$_POST['theloai'],
							'user_id'=>$user['id'],
							'post_content'=>$_POST['noidung'],
							'img_name'=>$_FILES['img']['name'],
						);
					$this->model->insert($data);
					$error = "Thêm Bài Viết Thành Công";
				}
			}else{
				$error = NULL;
			}
			$data = array('path2' =>'thembaiviet','pathx'=>'menu','error'=>$error);
			$this->view->render('index',$data);
		}
		public function QuanLyBaiViet()
		{
			if(isset($_SESSION)){

				$query = $this->model->getUserName($_SESSION['USERNAME']);
				$user = mysqli_fetch_assoc($query);
				$query = $this->model->get_post_by_userID($user['id']);
			}
			$data = array(	'path2' => 'quanlybaiviet',
							'pathx'=>'menu',
							'query'=>$query
							);
			$this->view->render('index',$data);
		}
		public function XemBaiViet()
		{
			if(isset($_SESSION)){

				$query = $this->model->getUserName($_SESSION['USERNAME']);
				$user = mysqli_fetch_assoc($query);
				$query = $this->model->get_post_by_userID($user['id']);
			}
			$id = $_GET['id'];
			$query = $this->model->get_post_by_postID($id);
			$data = array('path2' => 'xem',
							'pathx'=>'menu',
							'query'=>$query);
			$this->view->render('index',$data);
		}
		public function SuaBaiViet()
		{
			$id = $_GET['id'];
			$query = $this->model->get_post_by_postID($id);
			$data = array('path2' => 'suabaiviet',
							'pathx'=>'menu',
							'query'=>$query);
			$this->view->render('index',$data);
			//sử lý sửa bài viết
		}
		public function XoaBaiViet()
		{
			$id = $_GET['id'];
			$query = $this->model->get_post_by_postID($id);
			$result= mysqli_fetch_assoc($query);
			@unlink('upload/'.$result['img_name']);
			$this->model->deletePost($id);
			header("location:index.php?c=allfunction&a=quanlybaiviet");
		}
	}