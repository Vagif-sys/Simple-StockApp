<?php
 $host = "localhost";
 $user = "root";
 $password = "root";
 $db='stockapp';
 // Create connection
 try{
     $dsn = 'mysql:host='.$host.';dbname='.$db;
     $pdo= new PDO($dsn,$user,$password); 
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 }catch(PDOException $e){

    echo "Connetion failed" . $e->getMessage;   
 }