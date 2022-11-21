<?php
include('basse/BD.php');
if (isset($_GET['changerid'])) {

    $matricule = $_GET['changerid'];
    $sql ="SELECT * FROM USER WHERE matricule = '$matricule'";/* requette sql */
    $select = $dbco->prepare($sql);
    $select->execute();
    $row = $select->fetchAll(PDO::FETCH_ASSOC);/* La méthode PDOStatement::fetch()  permet de rendre exploitable l'objet récupéré 
    lors de la connexion après lui avoir passé différentes requêtes SQL. */
    foreach ($row as $row) {
    /* row pour parcourir la ligne de chaque element */
    if ($row['roles'] == 'Utilisateur') {/* Si pour changer utilisateur en administrateur */
        $bass=$dbco->prepare("UPDATE USER SET roles='Administrateur' WHERE matricule = '$matricule'");//code pour archiver en changeant la valeur 0 par 1
    $bass->execute();
    header('location:pageAdmin.php');
    } else
   {/* sinon pour changer administrateur en utilisateur */
           $bass=$dbco->prepare("UPDATE USER SET roles='Utilisateur' WHERE matricule = '$matricule'");//code pour archiver en changeant la valeur 0 par 1
    $bass->execute();
    header('location:pageAdmin.php');
    }
}

}
?>