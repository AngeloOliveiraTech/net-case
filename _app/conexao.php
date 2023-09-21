<?php

try 
{
    $dsn = 'mysql:dbname=tcc; host=netcase.mysql.database.azure.com; charset=utf8';
    $user = 'netcase';
    $password = 'Tcc@2023';
    
    $dbh = new PDO($dsn, $user, $password);

}
catch(PDOException $e)
{
    echo "Erro na conexão: " . $e->getMessage();
    die("Não foi possível estabelecer a conexão com o banco de dados.");
}

