<?php
	class Upload_Img
	{
		public function Upload($name)
		{
			if($_FILES[$name]['name'] == '')
			{

			}else{
				$path = "upload/";
				move_uploaded_file($_FILES[$name]['tmp_name'], $path.$_FILES[$name]['name']);
			}
		}
	}
