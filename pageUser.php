<?php
session_start();/* il faut avoir session_start pour utiliser une variable session */
include('basse/BD.php');

$articles;

$articles=$dbco->query('SELECT nom FROM USER ORDER BY id DESC');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <!-- ICON SCRIPT -->
    <title>Document</title>
</head>
<body class="d-flex justify-content-center" style="background-color:whitesmoke;">
<?php 
/* $_session variable glogal pour recuperer un variable */
  $ses=$_SESSION['identifiant'];/* permet de recuperer l'identifiant de la personne connecter */
  $select=$dbco->prepare("SELECT * FROM USER where ID=$ses");/* prepare la requete de l'identifiant recuperer */
  $select->execute();
 
    while ($rid = $select->fetch(PDO::FETCH_ASSOC)) {/* permet de parcourir la table et d'afficher les donnes */
     $prenom = $rid['prenom'];
     $nom = $rid['nom'];
       $matricule = $rid['matricule'];
    }
  ?>
  <div class="container p-0 bg-light" style="height: 600px; width:90%; box-shadow:0 4px 8px 0px rgb(0 0 0/30%); border-radius:15px">
  
        <nav class="d-flex" style="background-color:#160F30; height:180px; margin:10px;">
    <div class="d-flex" style="margin: 25px; flex-wrap:wrap;"><img src="data:image/jpg;base64,<?= base64_encode($_SESSION['photo'])?>" width="70%" height="70px">
     <h5 style="color:white ;"><?php echo $matricule; ?></h5></div>
    <div class="d-flex" style="flex-wrap:wrap ; width:40%;">
         <h1 style="color:white; margin-top:20px"><?php echo $prenom. " ".$nom; ?></h1><!-- afficher le nom et prenom de la personne connecter -->
        <div class="d-flex" style=" width: 70%;">
          <form method="GET">
        <div class="d-flex" style="width:100%; height:30px; background-color:bisque; gap:5px;">
        <input id="rech" class="form-control" type="Search" name="q" placeholder="Rechercher">
        <button class="btn btn-btn" style="background-color:#0096D7 ; color:white; width:50%; height:30px; " name="valider" type="submit">RECHERCHE</button>
        </div>
          </form>
        </div>
    </div>
<div class="d-flex justify-content-center" style="margin-left:400px ; background-color:black; height:30px; margin-top:80px"><a href="deconnexion.php"><i class="fa-solid fa-right-from-bracket" style="height:30px; width:100%; color:white;"></i></a></div>
</nav>

    <div class="container">
      <div class="row">
        
        <section class="col-md-12 bordureBleue">

        <?php 
include('basse/BD.php');

 echo '<table  class="table table-bordered table-striped"> <tr style="background:#0096D7; color:white;">';
   
$bass = $dbco->query("SELECT matricule,nom,prenom,email,roles FROM USER where roles='Utilisateur' AND ID!= $ses");

       if(isset($_GET['valider']) && !empty($_GET['q'])){/* permet d'effectuer la recherche */
  $q= htmlspecialchars($_GET['q']);


$bass=$dbco->query('SELECT matricule,nom,prenom,email,roles FROM USER where nom LIKE "%'.$q.'%" ');
  // var_dump($bass);die;
$bass->execute();
 }

  for($i=0; $i <  $bass->columnCount(); $i++)

  {
    $Nom_colonne = $bass->getColumnMeta($i);
    echo '<th>' .$Nom_colonne['name'].'</th>';
    
  }

              
  echo "</tr>";
  
    while ($row = $bass->fetch(PDO::FETCH_ASSOC)) {
   $matricule=$row['matricule'];
    $nom=$row['nom'];
    $prenom=$row['prenom'];
    $email=$row['email'];
    $roles=$row['roles'];
    /* 

      if($roles=='Utilisateur') {  */ 
        echo '<tr>
        <td >'.$matricule.'</td>
        <td >'.$nom.'</td>
        <td>'.$prenom.'</td>
        <td>'.$email.'</td>
        <td>'.$roles.'</td>
      
      </tr>';
    
  
      }
       
    
    ?>
        </section>

    </tbody>
      </table>
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>