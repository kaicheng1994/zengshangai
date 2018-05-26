<?php
/**
 * 
 * @authors chengkai chengkaivip1@163.com
 * @date    2018-05-26
 */

require_once('./upload.php');
$id=$_POST['id'];
$dst_path=$_COOKIE['dst_path'];
echo $dst_path;
foreach ($_FILES['photo']['name'] as $key => $value) {
	 $name=$_FILES['photo']['name'][$key];
	 $type=$_FILES['photo']['type'][$key];
	 $size=$_FILES['photo']['size'][$key];
	$error=$_FILES['photo']['error'][$key];
	 $tmp_name=$_FILES['photo']['tmp_name'][$key];
	 $temp=[
		"name"=>$name,
		"type"=>$type,
		"size"=>$size,
		"error"=>$error,
		"tmp_name"=>$tmp_name
	];
	upload_single_image($temp);
		$sql="update article set title='$title',author='$author',type='$type',is_show='$is_show',description='$description',content='$content',pic_path='$dst_path' where id=$id";
		// echo $sql;
		$res=my_query($sql);
			if($res){
		echo "修改成功";
		header('localtion:./index.php');
	}else{
		echo "修改失败";
}
}
