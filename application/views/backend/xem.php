<?php if (isset($query)) {
	$result = mysqli_fetch_assoc($query);
}?>
<h3><?php  echo $result['post_title'];?></h3>
<img src="upload/<?php echo $result['img_name'];?>" width="50%" height="50%"><br/>
<?php 
	echo $result['post_content'];
?>