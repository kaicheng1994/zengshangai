<?php


function my_conn($host="127.0.0.1",$port="3306",$user="root",$pwd="root"){
	$link=mysql_connect("$host:$port",$user,$pwd);
	if(!$link){
	die('我给你准备好了，把饭前付了吧');
	}
	return $link;

}
function my_charset($charset='utf8'){
	$sql="set names $charset";
	$result=mysql_query($sql);
	if(!$result){

	echo "错误信息是：",mysql_error(),"<br/>";
	echo "错误代码是：",mysql_errno(),"<br/>";
	}
}
function my_select_db($db_name='wenzhangwang'){
	$sql="use $db_name";
	$result=mysql_query($sql);
	return $result;
}
function my_query($sql){
	if($sql==''){
	return false;
	}
	$result=mysql_query($sql);
	if(!$result){
	echo "错误信息是：",mysql_error(),"<br/>";
	echo "错误代码是:",mysql_errno(),"<br/>";
	}
	return $result;
}

my_conn();
my_charset();
my_select_db();

?>