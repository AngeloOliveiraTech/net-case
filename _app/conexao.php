<?php

try
{
    $pdo = new PDO('mysql:netcase.mysql.database.azure.com;dbname=tcc;charset=utf8', 'netcase', 'Tcc@2023');
}
catch(PDOException $e)
{
    die("Não foi possível estabelecer a conexão com o banco de dados.");
}


