<?php
define('cood',TRUE);

//转换成硬路径
require dirname(__FILE__).'/includes/comment.php';


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Chinese Dynasty</title>
        <?php
		require ROOT_PATH.'includes/title.php';
		?>
	</head>
	<body>
		
		<?php
		require ROOT_PATH.'includes/header.inc.php';
		?>
		
		<div id="list">
			<h2>帖子列表</h2>
		</div>
		
		<div id="user">
			<h2>会员活动</h2>
		</div>
		
		<div id="pic">
			<h2>最新图片</h2>
		</div>
		
      	<?php
		require ROOT_PATH.'includes/foot.inc.php';

		?>
			
	</body>
</html>
