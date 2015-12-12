<?
include 'MySQL.php';
$login = $_POST["login"];
if ($login == '') $login = $_GET["login"];

print_r(getUserData($login));

mysql_close($link);
?>