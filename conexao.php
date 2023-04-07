<?php
// criado por samuel de sousa campos

$dbname = 'banco'; // nome da base de dados
$host = 'localhost'; // locagl host
$username = 'root'; // nome do user do banco de dados
$password = ''; // senha do banco

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $username, $password, $options); // faz a conexao ao banco de dados usando pdo
