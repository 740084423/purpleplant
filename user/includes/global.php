<?php


/**
 * _runtime()是用于获取执行耗时
 * @ access public 表示函数对外公开
 * @ return float  表示返回浮点型
 * 
 */
function _runtime()
{
	$_mtime = explode(' ',microtime());
	return $_mtime[1] + $_mtime[0];
}

/**
 * 
 * code为验证码函数
 * $width验证码图片的长度
 * $heigh验证码图片的高度
 * $rcode为验证码个数
 * $border为边框
 * 
 */


function _code($width=75,$height=25,$rcode=4,$border=FALSE)
{

for($i=0;$i<$rcode;$i++)
{
	$code.=dechex(mt_rand(0, 15));
}

$_SESSION['code']=$code;


$_img = imagecreatetruecolor($width,$height);


//填充
$gray = imagecolorallocate($_img, 208, 178, 178);
imagefill($_img,0,0,$gray);

if($border)
{
$black = imagecolorallocate($_img, 0, 0, 0);
imagerectangle($_img, 0, 0, $width-1, $height-1, $black);
}
//干扰线条
for($i=0;$i<6;$i++)
{
	$_rnd_color = imagecolorallocate($_img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imageline($_img,mt_rand(0, $width),mt_rand(0, $height),mt_rand(0, $width),mt_rand(0, $height),$_rnd_color);
}

//背景干扰因素
for ($i = 0; $i < 200; $i++) {
    $_rnd_color = imagecolorallocate($_img, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    imagesetpixel($_img, mt_rand(1, 99), mt_rand(1, 29), $_rnd_color);
}
//雪花
//for($i=0;$i<100;$i++)
//{
//	imagestring($_img, 1, mt_rand(1, $width), mt_rand(1, $height), "*",imagecolorallocate($_img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255)));
//
//}

//验证码
for($i=0;$i<strlen($_SESSION['code']);$i++)
{
	$_rnd_color = imagecolorallocate($_img, mt_rand(0, 180), mt_rand(0,150), mt_rand(0, 255));
	imagestring($_img, mt_rand(10, 12), $i*$width/$rcode+rand(1, 10),mt_rand(1, $height/3), $_SESSION['code'][$i], $_rnd_color);
}

//输出图像
header('Content-Type: image/png');
//imagepng($_img);
//销毁
imagedestroy($_img);
}


/*
 * _alert_back()为弹窗
 */


function _alert_back($info)
{
	echo "<script type='text/javascript'>alert('".$info."');history.back();</script>";
	exit();
}



function sha1_uniqid()
{
	return sha1(uniqid(rand(),TRUE));
}

function location($info,$url)
{
		echo "<script type='text/javascript'>alert('".$info."');location.href='$url';</script>";
	    exit();
}


?>