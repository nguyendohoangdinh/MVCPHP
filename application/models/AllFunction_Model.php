<?php
	class AllFunction_Model extends Model
	{
		public function Insert($data)
		{
			$sql = "INSERT INTO post(category_id,user_id,post_title,post_content,img_name) VALUE ('".$data['category_id']."',
				'".$data['user_id']."','".$data['post_title']."','".$data['post_content']."','".$data['img_name']."')";
			$query = mysqli_query($this->db->connect,$sql);
			return $query;
		}
		public function getUserName($username)
		{
			$sql = "SELECT * FROM user WHERE username = '$username'";
			$query = mysqli_query($this->db->connect,$sql);
			return $query;
		}
		public function get_post_by_userID($id)
		{
			$sql = "SELECT * FROM post WHERE user_id = $id";
			return mysqli_query($this->db->connect,$sql);
		}
		public function get_post_by_postID($id)
		{
			$sql = "SELECT * FROM post WHERE post_id = $id";
			return mysqli_query($this->db->connect,$sql);
		}
		public function deletePost($id)
		{
			$sql = "DELETE FROM post WHERE post_id = $id";
			mysqli_query($this->db->connect,$sql);
		}
	
	}