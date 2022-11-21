<?php
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
    <div class="container p-0 bg-light" style="height: 650px; width:90%;box-shadow:0 4px 8px 0px rgb(0 0 0/30%); border-radius:15px;">
  
        <nav class="d-flex" style="background-color:#160F30; height:170px; margin:10px;">
    <div class="d-flex" style="margin: 25px;"><img src="image/i.jpg" width="70%" height="70px"></div>
    <div class="d-flex" style="flex-wrap:wrap ; width:40%;">
        <h1 style="color:white ;">NDEYE BOUGOUMA SY</h1>
        <div class="d-flex" style=" width: 70%;">
          <form method="GET">
        <div class="d-flex" style="width:100%; height:30px; background-color:bisque; gap:5px;">
        <input id="rech" class="form-control" type="Search" name="q" placeholder="Rechercher">
        <button class="btn btn-btn" style="background-color:orange; ; color:white; width:50%; height:30px; " name="valider" type="submit">RECHERCHE</button>
        </div>
          </form>
        </div>
    </div>
    <div class="d-flex justify-content-center" style="margin-left:200px ;"><button style="background-color: white; height:40px; color:black; margin-top:90px;"><a href="pageAdmin.php">PAGE ADMINISTRATEUR</a></button></div>
</nav>

    <div class="container">
      <div class="row">
        
        <section class="col-md-12 bordureBleue">

        <?php 
include('basse/BD.php');

 echo '<table  class="table table-bordered table-striped"> <tr style="background:#0096D7; color:white;">';
   
$bass = $dbco->query("SELECT matricule,nom,prenom,email,roles,etat FROM USER ");
if(isset($_GET['valider']) && !empty($_GET['q'])){/* permet d'effecter la recherche */
  $q= htmlspecialchars($_GET['q']);

$bass=$dbco->query('SELECT matricule,nom,prenom,email,roles,etat FROM USER where nom LIKE "%'.$q.'%" ORDER BY id DESC');
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
    $etat=$row['etat'];
   
   
      if ($etat==1) {
        
        echo '<tr>
        <td >'.$matricule.'</td>
        <td >'.$nom.'</td>
        <td>'.$prenom.'</td>
        <td>'.$email.'</td>
        <td>'.$roles.'</td>
    
     
       <td>
        <a href="supo.php?supprimermatricule='.$matricule.'" class="btn btn-outline-danger" ><i class="fa-solid fa-folder-open"></i></a>
         
        </td>
      
      </tr>';
    
  
      }
    }
    ?>
        </section>

    </tbody>
      </table>
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>