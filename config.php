<?php

$db_nome = "teste";
$db_host = "localhost";
$db_user = "root";
$db_pass = ""; // senha bd

$pdo = new PDO("mysql:dbname=".$db_nome.";host=".$db_host, $db_user, $db_pass);

