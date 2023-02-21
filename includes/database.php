<?php
$sql_url = 'mysql';
$sql_username = 'mymove';
$sql_password = 'password';
$sql_database = 'mymove';

$dbase = mysqli_connect($sql_url, $sql_username, $sql_password, $sql_database);
mysqli_select_db($dbase, $sql_database);
?>
