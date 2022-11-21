<?php
session_start();/* il faut avoir session_start pour utiliser une variable session */
include('basse/BD.php');

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
    }
  ?>
    <div class="container p-0 bg-light " style="height: 650px; width:90%; box-shadow:0 4px 8px 0px rgb(0 0 0/30%); border-radius:15px;">
  
        <nav class="d-flex" style="background-color:#160F30; height:140px; margin:10px;">
    <div class="d-flex" style="margin: 25px;"><img src="image/i.jpg" width="70%" height="70px"></div>
    <div class="d-flex" style="flex-wrap:wrap ; width:50%;">
 <h1 style="color:white ;"><?php echo $prenom. " ".$nom; ?></h1><!-- afficher le nom et prenom de la personne connecter -->
        <div class="d-flex">
        <div class="d-flex" style="width:100%; height:30px; background-color:bisque;">
        <input id="rech" class="form-control" type="text" placeholder="Rechercher">
        </div>
         <div class="d-flex justify-content-center" style="width:70%; height:30px; ">
          <button class="btn btn-btn" style="background-color:orange; ; color:white;" type="submit">RECHERCHE</button>
          </div>
        </div>
    </div>
  
    <div class="d-flex justify-content-center" style="margin-left:300px ; background-color:black; height:30px; margin-top:80px"><a href="connexionAD.php"><i class="fa-solid fa-right-from-bracket" style="height:30px; width:100%; color:white;"></i></a></div>
</nav>

    <div class="container">
      <div class="row">
        
        <section class="col-md-12 bordureBleue">

        <?php 
include('basse/BD.php');

 echo '<table  class="table table-bordered table-striped"> <tr style="background:#0096D7; color:white;">';
   
$bass = $dbco->query("SELECT matricule,nom,prenom,email,roles FROM USER where roles='Utilisateur' AND ID!= $ses");

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