		<?php 
		session_start();
		define('cood',TRUE);
         require dirname(__FILE__).'/includes/comment.php';
		
		//测试新增是否成功
		//mysql_query("INSERT INTO user(username) values('尛尛雨')") or die('SQL执行失败'.mysql_error());
		
		 if($_GET['action']=='register')
		 {
		 	//防止恶意注册 或 跨站攻击
		 	if(!$_POST['code']==$_SESSION['code'])
			{
				_alert_back('验证码错误');
			}		
			//引入文件
			include ROOT_PATH.'includes/register.func.php';
			
			//创建一个空数组 用来存放提交过来的合法数据
			$clean = array();
			
			//通过唯一标识符防止恶意注册，伪装表单跨站攻击等
            $clean['uniqid'] = _check_uniqid($_POST['uniqid'],$_SESSION['uniqid']);
            
			//激活用户
			$clean['active']= sha1_uniqid();
			
            $clean['name'] = _check_username($_POST['name'],2,20);
			$clean['password']=_check_password($_POST['password'],$_POST['notpassword'],6);
			$clean['sex']=_check_sex($_POST['sex']);
			$clean['face']=_check_face($_POST['face']);
			$clean['QQ'] = _check_QQ($_POST['QQ']);
			$clean['phone-number'] = _check_phone($_POST['phone-number'],11);
		    $clean['email'] = _check_email($_POST['email']);
			
			//新增用户 //在双引号哩，直接放变量是允许的，但如果是数组，就必须加上{}
			mysql_query(
			"INSERT INTO user(
			             
			             uniqid,
			             active,
			             username,
			             password,
			             sex,
			             email,
			             QQ,
			             phone,
			             face,
			             register_time,
			             last_load_time,
			             load_IP
			             ) 
			             values
			             (
			             '{$clean['uniqid']}',
			             '{$clean['active']}',
			             '{$clean['name']}',
			             '{$clean['password']}',
			             '{$clean['sex']}',
			             '{$clean['email']}',
			             '{$clean['QQ']}',
			             '{$clean['phone-number']}',
			             '{$clean['face']}',
			             NOW(),
			             NOW(),
			             '{$_SERVER["REMOTE_ADDR"]}'

			             )"
		
			) or die('执行错误'.mysql_error());
		 }
	$_SESSION['uniqid'] = $uniqid = sha1_uniqid();
		 
		?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Chinese Dynasty--register</title>
		<?php 
		require ROOT_PATH.'includes/title.php';	
		?>
     
	</head>
	<body>
		<?php 
		require ROOT_PATH.'includes/header.inc.php';	
		?>
		
		
		<div id="register">
	<!--自定义列表不仅仅是一列项目，而是项目及其注释的组合。--->
	<!--自定义列表以 <dl> 标签开始。每个自定义列表项以 <dt> 开始。-------->
	<!--每个自定义列表项的定义以 <dd> 开始。 -->

			<h2>会员注册</h2>
			<form method="post" name="register" action="register.php?action=register">
				<input type="hidden" name='uniqid' value="<?php echo $uniqid;  ?>" />
				<dl>
					<dt>请认真填写以下内容</dt>
					<dd>用 户 名:<input type="text" name="name" class="text"/> *</dd>
					<dd>密　  码 :<input type="password" name="password" class="text"/> *</dd>
					<dd>确认密码:<input type="password" name="notpassword" class="text"/> *</dd>
					<dd>性　　  别: <input type="radio" name="sex" value="男"/>男　<input type="radio" name="sex" value="女"/>女　　　　　　</dd>
					<dd>电子 邮件:<input type="text" name="email" class="text"/>　</dd>
					<dd>　QQ号码:<input type="text" name="QQ" class="text"/>　</dd>
                    <dd>手机 号码:<input type="text" name="phone-number" class="text"/>　</dd>
                    <dd>选择您的头像:</dd>
                    <dd class="face"><img src="Head portrait/<?php echo rand(0,1).rand(1,9); ?>.jpg" alt='头像选择' id='faceimg'></dd>
                    <div id='code'>验 证 码 :<input type="text" name="code" class="C"/> <img src="includes/code.php"></div>
                    
                    <dd><input type="submit" value="提交" class="submit"/></dd>
				</dl>
			</form>
			
		</div>
		
		<?php 
		require ROOT_PATH.'includes/foot.inc.php';	
		?>
			
	</body>
</html>