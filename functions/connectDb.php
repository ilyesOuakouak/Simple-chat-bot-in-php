<?php


try {
	$db = new PDO('mysql:host=localhost; dbname=mychatBotDb', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch(Exception $e) {
	die('Connexion to the database failed'.$e->getMessage());
}


