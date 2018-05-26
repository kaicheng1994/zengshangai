<html>
<head>
	<title>文章网</title>
</head>
<body>
<p><a href="./add.html">添加文章</a></p>
<table border="1px " width="600px" >
<tr><td>id</td><td>标题</td><td>作者</td><td>描述</td><td>操作</td></tr>
<?php 
header("content-type:text/html;charset=utf-8");
require_once './mysql.php';
$sql="select * from article";
$res=my_query($sql);
if(!$res){
	die('查询失败');
}

while ($row=mysql_fetch_assoc($res)) {
	
 ?>
 <tr><td name='id'><?php echo $row['id'];?></td>
 <td name='title'><?php echo $row['title'];?></td>
 <td name='author'><?php echo $row['author'];?></td>
 <td name='description'><?php echo $row['description'];?></td>
 <td ><a href="./update.html?id=<?php echo $row['id']?>" name="update">修改</a>||<a href="./delete.php?id=<?php echo $row['id']?>"  name="delete">删除</a></td>
 </tr>
 <?php 
}
 ?>
</table>
</body>
</html>