<?php
if(!defined('cood'))
{
	exit('Access Defined!');
}

//设置字符集编码
header('Content-Type:text/html; charset=utf8');



//转换硬路径常量
define('ROOT_PATH',substr(dirname(__FILE__), 0,-8));
if(PHP_VERSION<'5.2.0')
{
	exit('Version is too Low！');
}

//执行耗时

require ROOT_PATH.'includes/global.php';
require ROOT_PATH.'mysql.func.php';
define('START_TIME', _runtime());


//连接数据库
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PWD", 'root');
define("DB_NAME", 'chinese_dynasty');

//初始化数据库
_connect();  //连接数据库
select_db(); //选择指定数据库
_setnames(); //设置字符集

?>