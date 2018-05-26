<?php
/**
 * 
 * @authors chengkai chengkaivip1@163.com
 * @date    2018-05-26
 */
header('content-type:text/html;charset=utf-8');
require_once('./mysql.php');
$id=isset($_GET['id'])?$_GET['id']:"";
$sql="delete from article where id = '$id'";
$res=my_query($sql);
var_dump($res);
if($res){
	echo "删除成功";
	header('refresh:2;url=./index.php');
}else{
	echo "删除失败";
	header('refresh:2;url=./index.php');
}
