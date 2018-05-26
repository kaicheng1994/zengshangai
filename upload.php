	<?php
/**
 * 
 * @authors chengkai chengkaivip1@163.com
 * @date    2018-05-25
 */
header("content-type:text/html;charset=utf-8");
echo "<pre>";
require_once('./mysql.php');
$title=$_POST['title'];
$type=$_POST['type'];
	$author=$_POST['author'];
	$is_show=$_POST['is_show'];
	$description=$_POST['description'];
	$content=$_POST['content'];
	
function upload_single_image($arr=[]){
// 判断是否为空
if(empty($arr)){
	die("文件超过了8M");
}
// 判断错误类型
$error=$arr['error'];
switch($error){
	case 0:echo "上传没有错误";break;
	case 1:echo "文件超过了2M";break;
	case 2:echo "文件超过了8M";break;
	case 3:echo "上传了部分文件";break;
	case 4:echo "没有上传文件";break;
	case 6:echo "临时文件不存在";break;
	case 7:echo "文件写入错误";break;
	default:die;
}
// 是否是post上传的文件
if(!is_uploaded_file($arr['tmp_name'])){
	die("不是post上传的文件");
}
$max_size=1*1024*1024;
if($arr['size']>$max_size){
	die('您上传的文件太大了');
}
// 移动文件，默认在脚本结束后就会删除文件
 $dst_path='./uploads/';
if(!file_exists($dst_path)){
	mkdir(uploads);
}



//文件存在-》不为空，不为0，
// while($arr['photo']['name'])
// 拼接文件名
$name=date('YmdHis',time().mt_rand(100,999));
$file_ext=$arr['name'];
$result=strrchr($file_ext, '.');
$dst_path=$dst_path.$name.$result;

setcookie('dst_path',"$dst_path");	
// 文件的类型
$res=finfo_open(FILEINFO_MIME_TYPE);
$real_type=finfo_file($res,$arr['tmp_name']);
// echo $arr['name'];
// $type=$arr['type'];
$allow_type=["image/jpg","image/png","image/jpeg","image/gif"];
if(!in_array($real_type, $allow_type)){
	die("您上传的类型不符合要求");
}



move_uploaded_file($arr['tmp_name'], $dst_path);
}
?>