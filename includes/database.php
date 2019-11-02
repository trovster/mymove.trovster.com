<?php
$sql_url = 'localhost';
$sql_username = '';
$sql_password = '';
$sql_database = '';

$dbase = mysqli_connect($sql_url, $sql_username, $sql_password);
mysqli_select_db($sql_database, $dbase);
?>