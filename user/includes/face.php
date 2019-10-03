<?php
define('cood',TRUE);
//转换成硬路径
require dirname(__FILE__).'/comment.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>头像选择</title>
		<link rel="stylesheet" type="text/css" href="face.css"/>

<?php
//转换成硬路径
require dirname(__FILE__).'/title.php';
?>
	<script type="text/javascript" src="../fjs.js"></script>

	</head>
	<body>
		
<div id='face'>
	<h3>选择头像</h3>
	<dl>
		<?php foreach(range(0, 9)as $num) {?>
		<dd><img src="../Head portrait/0<?php echo $num; ?>.jpg"/> </dd>
		<?php  }?>
	</dl>
	<dl><?php foreach(range(10, 19)as $num) {?>
		<dd><img src="../Head portrait/<?php echo $num; ?>.jpg"></dd>
		<?php  }?>

		
	</dl>
	
	
</div>
			
	</body>
</html>


