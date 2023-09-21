<?php

// try 
//  {
//      $dsn = 'mysql:dbname=TCC; host=netcase.mysql.database.azure.com; charset=utf8';
//      $user = 'netcase';
//     $password = 'Tcc@2023';
    
//      $dbh = new PDO($dsn, $user, $password);

//  }
//  catch(PDOException $e)
//  {
//      echo "Erro na conexão: " . $e->getMessage();
//      die("Não foi possível estabelecer a conexão com o banco de dados.");
//  }

$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
mysqli_real_connect($conn, "netcase.mysql.database.azure.com", "netcase", "Tcc@2023dugvdbs", "tcc", 3306, MYSQLI_CLIENT_SSL);