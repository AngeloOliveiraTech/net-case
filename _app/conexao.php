<?php

try
{
    $pdo = new PDO('mysql:netcase.mysql.database.azure.com; dbname:tcc', 'netcase', 'Tcc@2023');
}
catch(PDOException $e)
{
    echo $e;
    die("Não foi possível estabelecer a conexão com o banco de dados.");
}


