<?php

/*LIAISON AVEC LE FORMULAIRE A LA BASE DE DONNEE*/
$dbco = new PDO('mysql:host=localhost;dbname=pages','UBUNTU','mamy', array
(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));



