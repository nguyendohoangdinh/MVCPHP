<?php
	class Database
	{
		public function __construct()
		{
			$this->connect = mysqli_connect("localhost","root","123","myweb");
		}
		public function selectAll()
		{
			$sql = "SELECT * FROM user";
			$query = mysqli_query($this->connect,$sql);
			return $query;
		}
		public function update()
		{

		}
		public function delete()
		{

		}
	}