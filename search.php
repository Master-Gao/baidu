<?php
	header("content-type:text/html;charset=utf-8");
	$conn=mysql_connect("localhost","root","root");
	if(!$conn){
		die("连接失败:".mysql_error());
	}
	mysql_select_db("test");
	mysql_query("set names utf8");
	if($_POST['code']){
		$code = $_POST['code'];
		if($code == "save"){
			if($_POST['search_text']){
				$search_text = $_POST['search_text'];
				$sql = "insert into baidu(search_text) values("."'$search_text'".")";
				mysql_query($sql,$conn);
				echo "save_ok";
				mysql_close($conn);
			}
		}else if($code == "show"){
			if($_POST['search_text']){
				$search_text = $_POST['search_text'];
				//使用模糊查询进行关键字搜索
				$sql="select search_text from baidu where search_text like '%".$search_text."%'";
				$res=mysql_query($sql,$conn);

				$result = "";
				while($row = mysql_fetch_assoc($res)){
					$result = $result.JSON($row)."#";//以#字符作为json字符串数组的分隔符
				}
				echo $result;

				mysql_free_result($res);
				mysql_close($conn);
			}
		}else if($code == "delete"){
			if($_POST['search_text']){
				$search_text = $_POST['search_text'];
				//删除该关键字的数据库记录
				$sql="delete from baidu where search_text = '$search_text'";
				$res=mysql_query($sql,$conn);
				if($res){
					$result = "succeed";
				}else{
					$result = "fail";
				}
				echo $result;

				mysql_close($conn);
			}
		}
	}
	//由于php中的json_encode编码会将中文编码为乱码，所以下面写了这两个方法作为json编码，可以直接调用JSON()方法，这两个方法非原创，菜鸟我也没看懂。还是要谢谢那位写这段代码的大牛!
	function arrayRecursive(&$array, $function, $apply_to_keys_also = false){
		 static $recursive_counter = 0;
		 if (++$recursive_counter > 1000) {
			 die('possible deep recursion attack');
		 }
		 foreach ($array as $key => $value) {
			 if (is_array($value)) {
				 arrayRecursive($array[$key], $function, $apply_to_keys_also);
			 } else {
				 $array[$key] = $function($value);
			 }
			 if ($apply_to_keys_also && is_string($key)) {
				 $new_key = $function($key);
				 if ($new_key != $key) {
					 $array[$new_key] = $array[$key];
					 unset($array[$key]);
				 }
			 }
		 }
		 $recursive_counter--;
	}
	 function JSON($array) {
		 arrayRecursive($array, 'urlencode', true);
		 $json = json_encode($array);
		 return urldecode($json);
	 }
?>