<?php 
/*LIAISON AVEC LE FORMULAIRE A LA BASE DE DONNEE*/
include('basse/BD.php');

if(isset($_GET['updateid'])){
  // var_dump($_GET['updateid']);
  //  exit;   
    $matricule =$_GET['updateid'];
    $mamy=$dbco->prepare("SELECT * FROM USER where matricule='$matricule'");

    $mamy->execute();
    if ($mamy->rowCount() > 0) {
        $check=$mamy->fetchAll()[0];
    }
     
if(isset($_POST['nom'],$_POST['prenom'],$_POST['email'])){


	$nom=$_POST['nom'];	
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];			
  
    $matricule=$_GET['updateid'];	
    $datemodif=date('y-m-d h:i:s');
 
    $mamyAjoutPersonne=$dbco->prepare("UPDATE USER SET nom='$nom',prenom='$prenom',email='$email', date_modification='$datemodif' WHERE matricule='$matricule'");
    $mamyAjoutPersonne->execute();
    if($mamyAjoutPersonne){
        header('location:pageAdmin.php? modif=modification réussie');
    }else { die('Erreur : '.$e->getMessage());}
   
}

}

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <!-- ICON SCRIPT -->
<script src="https://unpkg.com/feather-icons"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


    <title>INSCRIPTION</title>
</head>
<body class="d-flex justify-content-center">
    <div class="container p-0 bg-light border " style="margin: 5px; background-color:#FFFF;background-image:url(image/i.jpg);background-size:cover; width: 100%; height:620px; border-radius:15px;" >
     
        <!-- bg-light border border-dark pour la bordure -->
          <div class="d-flex justify-content-center p-0 bg-light border border-dark" style="width:50%; opacity:90%; margin-top:150px; margin-left:250px; flex-wrap:wrap; background-color:white;">  
        <h1 class="d-flex justify-content-center" style="background-color:#160F30; color:white; width:100%;">MODIFICATION</h1>
        
       
    <form class="p-4" id="myForm" method="POST" name="form"> 
      
        
            <div class="row " > <!-- mt=margin-top  -->
              <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input id="nom" class="form-control bg-light border border-dark" type="text" name="nom"  value="<?= $check["nom"] ?? null  ?>" placeholder="Entrer votre nom">
                <p id="error"></p>
              </div>
              <div class="col-md-6">
                <label for="prenom" class="form-label" >Prénom</label>
                <input id="prenom" class="form-control bg-light border border-dark" type="text" name="prenom"  value="<?= $check["prenom"] ?? null  ?>" placeholder="Entrer votre prénom">
                <p id="error1"></p>
              </div>
            </div>
            <div class="row ">
              <div class="col-md-6">
                <label for="mail" class="form-label">Mail</label>
                <input id="email" class="form-control bg-light border border-dark" type="email" name="email"  value="<?= $check["email"] ?? null  ?>" placeholder="Entrer votre mail">
                <p id="error2"></p>
          
              </div>
            </div>
        
          <div class="d-flex justify-content-center">
          <button class="btn btn-btn mt-4" style="background-color:#0F3018 ; color:white;" type="submit" name="submit" onclick="validation()">ENREGISTRER</button>
          </div>
        </form>
        </div> 
               <script  src="inscr.js"></script>
              
</body>

</html>