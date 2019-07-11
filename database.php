<?php
$server = '192.168.56.2';
$schema = 'fothebys';
$username = 'homestead';
$password = 'secret';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
	[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
