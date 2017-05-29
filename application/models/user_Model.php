<?php
	class User_Model extends Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getUserName($username)
		{
			$sql = "SELECT * FROM user WHERE username = '$username'";
			$query = mysqli_query($this->db->connect,$sql);
			return $query;
		}
		public function Insert($data)
		{
			foreach ($data as $key => $value) {
				$$key = $value;
			}
			$sql = "INSERT INTO user(username,password,fullname) VALUES ('$username','$password','$fullname')";
			mysqli_query($this->db->connect,$sql);
		}
		
	}