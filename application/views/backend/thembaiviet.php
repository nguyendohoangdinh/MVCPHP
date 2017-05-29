<h1>Thêm Bài Viết</h1>
<form action="" method="post" enctype="multipart/form-data">
	<?php if (isset($error)){
		echo "<h4>$error</h4>";
	}
	?>
	<label>Tiêu Đề</label><br/>
	<input type="text" name="tieude"/><br/>
	<label>Thể Loại</label><br/>
	<select name="theloai">
		<option value="1">Java</option>
		<option value="2">PHP</option>
	</select><br/>
	<label>Nội Dung</label><br/>
	<textarea rows="10" cols="100" name="noidung"></textarea><br/>
	<label>Upload Img</label><br/>
	<input type="file" name="img"/><br/>
	<input type="submit" name="submit" value="Thêm Bài Viết"/>
</form>