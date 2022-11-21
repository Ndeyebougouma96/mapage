<?php

function executeRequete($bass)
{
    global $pdo;
    $resultat = $pdo->query($bass);
    if(!$resultat)
    {
        die("Erreur sur la requette sql.<br>Message :" .$pdo ->error ."<br>Code :" .$bass);
    }
    return $resultat;
}
