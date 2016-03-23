<?php
    $host='127.0.0.1';
    $dbname='portfolio';
    $user='root';
    $pwd='';
    try{
        $db=new PDO("mysql:dbname=$dbname;host=$host",$user,$pwd);
    } catch(PDOException $e){
        echo 'Impossible de se connecter à la base de données : '.$e->getMessage();
    }
?>