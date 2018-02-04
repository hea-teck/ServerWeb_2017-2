<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','123123','final');

mysqli_select_db($con,"ajax_demo");

$query = "SELECT name FROM users WHERE name='$q'";

$result = mysqli_query($con,$query);

if($q !=""){
	if(!preg_match("/^[a-zA-Z-0-9]*$/" , $q)){
		echo "<font size=3 color=red>잘못된 ID형식입니다.</font>";
	}else{
		if (mysqli_num_rows($result) > 0	) {//중복일떄
			echo "<font size=3 color=red>중복된 ID입니다.</font>";
		}else{//사용가능
			echo "<font size=3 color=#1DDB16>사용가능한 ID입니다.</font>";
		}
	}
}

mysqli_close($con);
?>