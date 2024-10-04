<?php
//conexão com bd
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB_NAME', 'projeto1');
TRY{
$con = new PDO('mysql:host='.HOST.';dbname='.DB_NAME,USER,PASS);
$con->exec("set names utf8");
}CATCH(PDOException $e){
		echo 'Erro ao conectar com MySQL: '.$e->getMessage();
}
?>