<?php

    function dbInit($pName, $pHost, $pUser, $pPassword)
    {
        try
        {
            $database = new PDO('mysql:dbname=' . $pName . ';host=' . $pHost, $pUser, $pPassword);
        }

        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        return $database;
    }

    function dbSelect($pQuery, $pDatabase)
    {
        try
        {
            $query = $pDatabase->query($pQuery);
            $answer = $query->fetchAll();
            return $answer;
        }

        catch(PDOException $e)
        {
            $e->getMessage();
        }
    }

?>
