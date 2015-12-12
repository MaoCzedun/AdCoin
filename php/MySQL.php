<?php

$user='al23dd_db';

$password='JtMYGPF4';

$db='al23dd_db';

$link = mysql_connect('al23dd.mysql.ukraine.com.ua',$user, $password);

$connect = mysql_select_db($db, $link);

mysql_query("Set names 'utf8'");
/*
function getUserData($userID){
        $response = [];
        $result = mysql_query("SELECT `login`, `email`, `tel`, `bitcoin` FROM `adcoin_users` WHERE `login` = '$userID'");
        $row =  mysql_fetch_array($result, MYSQL_NUM);
	$names = array('login', 'email', 'tel', 'bitcoin');
	for ($i = 0; $i < 4;$i+=1){
		$response[$names[$i]] = $row[$i];
	}
	mysql_free_result($result);
 	return json_encode($response);
}

function createAccount($user){
	$result = mysql_query("SELECT `email` FROM `adcoin_users` WHERE `login` = '$user[0]'");
	$row =  mysql_fetch_array($result);
	if($row[0] == '') {
		//pgo, 
		mysql_query("INSERT INTO `adcoin_users`(`login`, `pass`, `email`, `tel`, `bitcoin`, `balance`) VALUES ('$user[0]', '$user[1]', '$user[2]', '$user[3]', 'bitcoinID', '10')");
		echo json_encode(array('response'=>'OK'));
	} else echo json_encode(array('response'=>'FAIL'));
}
*/

function addBannerPlace($data){
	mysql_query("INSERT INTO `adcoin_places`(`uid`, `name`, `description`, `content`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', 'bitcoinID', '10')");
	echo json_encode(array('response'=>'OK'));
}
?>