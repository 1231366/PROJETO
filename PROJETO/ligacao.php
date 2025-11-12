<?php
$hostname="Localhost";
$login="root";
$password="";
$database="ap";
$con = mysqli_connect($hostname, $login, $password) or die("A conexão falhou!");
mysqli_select_db($con, $database) or die("Ocorreu um erro na seleção da base de dados");
mysqli_set_charset($con, "utf8");
?>