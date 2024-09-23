<?php

try
{
    $pdo = new PDO('mysql:host=sql311.infinityfree.com;dbname=if0_37344680_netcase;charset=utf8', 'if0_37344680', 'u9vZui34l0RU9');
}
catch(PDOException $e)
{
    echo $e->getMessage() . "</p>";
    die("Não foi possível estabelecer a conexão com o banco de dados.");
}


