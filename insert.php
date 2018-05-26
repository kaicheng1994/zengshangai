<?php
/**
 * 
 * @authors chengkai chengkaivip1@163.com
 * @date    2018-05-25
 */
header("content-type:text/html;charset=utf-8");
echo "<pre>";
require_once('./mysql.php');
require_once('./upload.php');
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
		$sql="insert into article values('','$title','$author','$type
		','$is_show','$description','$content','$dst_path',default);";
		// echo $sql;
		$res=my_query($sql);
			if($res){
		echo "添加成功";
		header('localtion:./index.php');
	}else{
		echo "添加失败";
}

}

 ?>
