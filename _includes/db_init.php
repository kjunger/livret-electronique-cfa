<?php
    /****** Connexion à la base de données ******/

    //Variables contenant les informations de connexion - à modifier en fonction du serveur de DB utilisé
    $host='127.0.0.1';  //Adresse du serveur de DB (mettre 127.0.0.1 ou localhost s'il est situé sur le même serveur, ou l'IP/l'URL du serveur de DB distant le cas échéant)
    $dbname='test';     //Nom de la base de données à utiliser
    $user='root';       //Identifiant de connexion à la DB
    $pwd='root';        //Mot de passe de connexion à la DB
    //Création d'une instance pour la connexion à la DB avec PDO::__construct
    try{
        $db=new PDO("mysql:dbname=$dbname;host=$host",$user,$pwd);  //tentative de connexion à la DB
        echo 'Connexion à la DB réussie !';
    } catch(PDOException $e){   //si la connexion à la DB échoue
        echo 'Echec de connexion à la base de données : '.$e->getMessage(); //récupération et affichage du message d'erreur
    }

    /****** END Connexion à la base de données ******/
?>
