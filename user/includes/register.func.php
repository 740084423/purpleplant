<?php
if(!defined('cood'))
{
	exit('Access Defined!');
}

//_check_username表示检测并过滤用户名
//return string 过滤后的用户名
function _check_username($_string,$min,$max)

{
	//长度小于两位或大于20位
	if(mb_strlen($_string,'utf-8')<$min || mb_strlen($_string,'utf-8')>$max)
	{
		_alert_back('长度不得小于"'.$min.'"或大于"'.$max.'"位');
	}
	$char_pattern='/[<>?,\'\"\　]/';
	if(preg_match($char_pattern, $_string))
	{
		_alert_back('用户名不得包含敏感字符');
	}
	//限制敏感用户名
	$_mg[0]='毛泽东';
	$_mg[1]='江泽民';
	$_mg[2]='胡锦涛';
	//告诉用户有哪些不能注册
//	foreach($_mg as $value)
//	{ $_mg_string.=$value.'\n'; }

	//绝对匹配
	if(in_array($_string, $_mg))
	{
		_alert_back($_mg_string.'敏感用户名不得注册');
	}
    return $_string;	

}

function _check_password($_firstpass,$_endpass,$min=6)
{
	if(strlen($_firstpass)<$min)
	{
		_alert_back('密码不得小于"'.$min.'"位');
	}
	//将密码返回
	if($_firstpass !=$_endpass)
	{
		_alert_back('密码与确认密码不一致');
	}
	return sha1($_firstpass);
}

function _check_sex($_string)
{
	return $_string;
}

function _check_face($_string)
{
	return $_string;
}

/*
 * \w=> 0-9  a-z  A-Z
 * 检测电子邮件地址是否合法
 */
function _check_email($_string)
{
   if(empty($_string))
   {
   	return null;
   }
   else{
   if(!preg_match('/^[\w\-]+@[\w\-]+(.com)$/', $_string))
   {
   	 _alert_back('电子邮件格式错误');
   }
   
   }

	return $_string;
}

function _check_QQ($_string)
{
	if(empty($_string))
	{
		return null;
	}
	else
	{
	   if(!preg_match('/^[1-9]{1}[0-9]{4,10}$/', $_string))
	   {
	   	_alert_back('QQ号码格式不正确');
	   }	
	}
    return $_string;	
}

//手机号默认11位
function _check_phone($_string)

{
	if(empty($_string))
	{
		return null;
	}
	else
	{
	   if(!preg_match('/^[0-9]{11}$/', $_string))
	   {
	   	_alert_back('手机号码格式不正确');
	   }	
	}

    return $_string;	
}




function _check_uniqid($one_uniqid,$end_uniqid)
{
	if(strlen($one_uniqid)!=40 ||($one_uniqid !=$end_uniqid))
	{
		_alert_back('唯一标识符异常');
	}
	return $one_uniqid;
}





?>