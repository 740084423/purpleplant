

<html>
	<body>
		<form action="article.php?action=520">
			<tr>
	    <td><input type="radio" name="520" value="布"/>布     </td>
	    <td><input type="radio" name="520" value="剪刀"/>剪刀  </td>
	    <td><input type="radio" name="520" value="石头"/>石头</td>
	    <td><input  name="submit" type="submit" value="提交" /></td>
	    </tr>
		</form>

	<?php
      header("Content-Type: text/html; charset=utf-8");
      session_start();
      $a = ['剪刀','石头','布'];
      //随机取出一个下标
      $b = array_rand($a); 
      $c = $a[$b];
      $get=$_GET['520'];
      //接收传输的值获取下标
      $val_a = array_search($get,$a); 
 
 
      echo "我出：".$get."\n\r系统：".$c."\n\r结果：";

      if($val_a == $b){
	  echo '平局';
                      }
      elseif(($b == 0 && $val_a == 1) || ($b == 1 && $val_a == 2) || ($b == 2 && $val_a == 0)){
	  echo '胜';
                      }
      else{
	  echo '负';
                      }


?>
	</body>
</html> 