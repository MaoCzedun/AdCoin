<?
include 'MySQL.php';

$login = $_GET["login"];
$pass = $_GET["pass"];
$email = $_GET["email"];
$tel = $_GET["tel"];
if( $login != '' && $pass != '' && $email != '' && $tel != '')
	createAccount(array($login,$pass,$email,$tel));
else echo  json_encode(array('response'=>"RERROR. Some fields was not filled"));
mysql_close($link);
?>
data