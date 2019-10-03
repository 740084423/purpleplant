<?php
	session_start();
	define('cood',TRUE);
	require dirname(__FILE__).'/comment.php';
	//验证码图默认大小为75*25 验证码个数为4 默认不需要黑色边框
	_code(75,25,4,FALSE);
?>
