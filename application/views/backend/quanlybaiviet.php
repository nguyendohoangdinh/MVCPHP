<h3>Danh Sách Bài Viết của</h3>
<h4>Tổng Số Bài Viết</h4>
<table border="1px" bordercolor="black" width="100%">
	<tr>
		<td width = "5%">STT</td>
		<td  width = "50%">Tiêu Đề</td>
		<td>Mô Tả</td>
		<td width = "5%">Lượt Xem</td>
		<td width = "5%">Xem</td>
		<td width = "5%">Sửa</td>
		<td width = "5%">Xóa</td>
	</tr>
	<?php
		if (isset($query)) {
			$i=0;
			while($result = mysqli_fetch_assoc($query)){
				$str = "
				<tr>
				<td>$i</td>
				<td>".$result['post_title']."</td>
				<td>".$result['post_content']."</td>
				<td>0</td>
				<td><a href='index.php?c=allfunction&a=xembaiviet&id=".$result['post_id']."'>Xem</a></td>
				<td><a href='index.php?c=allfunction&a=suabaiviet&id=".$result['post_id']."'</a>Sửa</td>
				<td><a href='index.php?c=allfunction&a=xoabaiviet&id=".$result['post_id']."'</a>Xóa</td>
				</tr>
				";
				echo $str;
				$i++;
			}
		}
	?>
</table>