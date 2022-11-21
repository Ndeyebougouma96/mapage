<?php
include('basse/BD.php');
if (isset($_GET['supprimermatricule'])) {
    $matricule=$_GET['supprimermatricule'];
    $bass=$dbco->prepare("UPDATE USER SET etat= 1 WHERE matricule='$matricule'");//code pour archiver en changeant la valeur 0 par 1
    $bass->execute();
    if($bass){
       header('location:pageAdmin.php');
     
    }
}
?>