<?php

try 
{
    $dsn = 'mysql:dbname=tcc; host=netcase.mysql.database.azure.com; charset=utf8';
    $user = 'netcase';
    $password = 'Tcc@202';
    
    $dbh = new PDO($dsn, $user, $password);

}
catch(PDOException $e)
{
    echo $e;
    die("Não foi possível estabelecer a conexão com o banco de dados.");
}


