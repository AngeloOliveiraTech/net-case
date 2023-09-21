<?php

try
{
    $pdo = new PDO('mysql:host=netcase.mysql.database.azure.com;dbname=tcc;charset=utf8', 'netcase', 'Tcc@2023');
}
catch(PDOException $e)
{
    echo $e->getMessage() . "</p>";
    die("Não foi possível estabelecer a conexão com o banco de dados.");
}


