<?php
if(!defined('cood'))
{
	exit('Access Defined!');
}
function _connect()
{
   global $_connent;
   if(!$_connect = @mysql_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME))
   {
   	exit("数据库连接失败");
   }
}

function select_db()
{
	if(!@mysql_select_db(DB_NAME))
	{
		exit("找不到指定的数据库");
	}
}

function _setnames()
{
	if(!mysql_query('SET NAMES UTF8'))
	{
		exit("字符集错误！");
	}
}

function sql($sql)
{
	if(!$result=mysql_query($sql))
	{
		exit('SQL执行失败'.mysql_error());
	}
	return $result;
}

function fetch($result)
{
	return mysql_fetch_array(sql($sql),MYSQL_ASSOC);
}




?>