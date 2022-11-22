<?php 
/*LIAISON AVEC LE FORMULAIRE A LA BASE DE DONNEE*/
include('basse/BD.php');
global $contenue;
global $conte;

// Recuperation des donnees
  if (isset($_POST['submit'])){
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];       
  $email = $_POST['email']; 
  $mot_de_passe =md5($_POST['mot_de_passe']);    
  $roles = $_POST['roles'];

    $photo = null;
  if (!empty($_FILES['photo']['size'] > 0)) {
     $photo = file_get_contents($_FILES['photo']['tmp_name']) ?? null;
  }

  
  $select_mail = $dbco->prepare("SELECT email FROM `USER` WHERE email ='".$email."' ");
  $select_mail->execute([$email]);

if ($select_mail->rowCount() > 0)
{
  $contenue ="ce adresse mail existe dejà";
  /* echo '<div style="color: red; padding: 5px;"> CE MAIL EXISTE DEJÀ</div>'; */
} else {
   // insertion des de donnees et auto-generer matricule 
   $bass = $dbco->prepare("INSERT INTO `USER` (nom, prenom, email, mot_de_passe, roles, photo) VALUES (?,?,?,?,?,?)");
   $bass ->execute (array($nom, $prenom, $email, $mot_de_passe, $roles, $photo));
 
   $matricule = 'MAT- '. $dbco->lastInsertId(); 
   $sql2 = "UPDATE USER  SET  matricule = '$matricule' WHERE email= '$email' ";
   $matricule2 = $dbco->prepare($sql2);
   $matricule2->execute();

   $conte ="L\'INSCRIPTION VALIDÉ AVEC SUCCÉS" .$matricule;
  
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
<script type="text/javascript"> 
$(document).ready(function() 
{ 
$('#mot_de_passe').keyup(function() 
{ 
$('#error4').html(checkStrength($('#mot_de_passe').val())) 
}) 

 mot_de_passe.addEventListener('keyup',function(e){
   let error4 = document.getElementById("error4");
   if (mot_de_passe.value.trim() =='1')  {
      
       error4.innerHTML = 'champs contenant * sont obligatoire!';
       error4.style.color = 'red';
     mot_de_passe.style.borderColor = "red";
      return;
     }
    
     error4.innerHTML = 'bon!';
     error4.style.color = 'green';
     mot_de_passe.style.borderColor = "#008a00";
 })
  }); 
 $(document).ready(function() 
{ 
$('#conf_mot_de_passe').keyup(function() 
{ 
$('#error5').html(checkStrength($('#conf_mot_de_passe').val())) 
}) 
 conf_mot_de_passe.addEventListener('keyup',function(e){
   let error5 = document.getElementById("error5");
   if (conf_mot_de_passe.value.trim() =='')  {
      
       error5.innerHTML = 'champs contenant * sont obligatoire!';
      error5.style.color = 'red';
      conf_mot_de_passe.style.borderColor = "red";
      return;
     }
    
 })
  conf_mot_de_passe.addEventListener('keyup',function(e){
   let error5 = document.getElementById("error5");
  
   if (conf_mot_de_passe.value.trim() !== mot_de_passe.value.trim())  {
      
        error5.innerHTML = 'les mots de passe ne sont pas identique!';
       error5.style.color = 'red';
      
      conf_mot_de_passe.style.borderColor = "red";
      return;
     }
 
     error5.innerHTML = 'bon!';
     error5.style.color = 'green';
   conf_mot_de_passe.style.borderColor = "#008a00";
 })

 }); 

</script> 

    <title>INSCRIPTION</title>
</head>
<body class="d-flex justify-content-center" style="background-color:white">
    <div class="container p-0 bg-light" style="margin: 5px; width:100%; background-image:url(image/i.jpg);background-size:cover; height:700px" >
        <!-- bg-light border border-dark pour la bordure -->
          <div class="d-flex justify-content-center p-0 bg-light border" style="width:50%;margin-top:2px; margin-left:265px; flex-wrap:wrap;background-color:white; opacity:90%;box-shadow:0 4px 8px 0px rgb(0 0 0/30%); border-radius:15px;">  
        <h1 class="d-flex justify-content-center" style="background-color:#160F30; color:white; width:100%; border-radius:0 15px 0 15px;">INSCRIPTION</h1>
        
       
    <form class="p-4" id="myForm" method="POST" name="form" enctype="multipart/form-data"> 
      
         <div class="d-flex justify-content-center" style="color:green;"><?php echo $conte;?></div><br><br>
            <div class="row " > <!-- mt=margin-top  -->
              <div class="col-md-6">
                <label for="nom" class="form-label"><p>Nom<span class="text-danger">*</span></p></label>
                <input id="nom" class="form-control" type="text" name="nom" placeholder="Entrer votre nom">
                <p id="error"></p>
              </div>
              <div class="col-md-6">
                <label for="prenom" class="form-label" ><p>Prénom<span class="text-danger">*</span></p></label>
                <input id="prenom" class="form-control" type="text" name="prenom" placeholder="Entrer votre prénom">
                <p id="error1"></p>
              </div>
            </div>
            <div class="row ">
              <div class="col-md-6">
                <label for="mail" class="form-label"><p>Mail<span class="text-danger">*</span></p></label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Entrer votre mail">
                <p id="error2"></p>
               <div class="d-flex justify-content-center" style="color:red;"> <?php echo $contenue ;?></div>
              </div>
              <div class="col-md-6">
                  <div class="form-group ">
                   <label for="role" class="form-label"><p>Role<span class="text-danger">*</span></p></label>
                   <select id="role" class="form-control " name="roles"><!-- pour etre egaux avec les autres inputs -->
                     
                   <option selected>Liste de choix...</option>
                       <option value="Administrateur">Administrateur</option>
                       <option value="Utilisateur">Utilisateur</option>
                   </select>
                   <p id="error3"></p>
                 </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="mot_de_passe" class="form-label " style=" position: relative;"><p>Mot de passe<span class="text-danger">*</span></p>
             <input id="mot_de_passe" class="form-control" type="password" name="mot_de_passe" placeholder="Entrer votre mot de passe"
             style="color:black; transition: all 0.2s;">
             <p id="error4"></p>
              <div class="password-icon" style=" display: flex;
  align-items: center;
  position: absolute;
  top: 60px;
  right: 20px;
  transform: translateY(-50%);
  width: 20px;
  color: #f9f9f9;
  transition: all 0.2s;  cursor: pointer;
  color:black">
              <i data-feather="eye"></i>
              <i data-feather="eye-off" style=" display: none;"></i>
             </div>
             </label>
              </div>
              <div class="col-md-6">
                <label for="conf_mot_de_passe" class="form-label" style=" position: relative;"><p>Confirmer le mot de passe<span class="text-danger">*</span></p>
                <input id="conf_mot_de_passe" class="form-control" type="password" name="conf_mot_de_passe" placeholder="Confirmer votre mot de passe"
                 style="color:black; transition: all 0.2s;">
                 <p id="error5"></p>
                  <div class="passwords-icon" style=" display: flex;
  align-items: center;
  position: absolute;
  top: 60px;
  right: 20px;
  transform: translateY(-50%);
  width: 20px;
  color: #f9f9f9;
  transition: all 0.2s;  cursor: pointer;
  color:black">
              <i data-feather="eye"></i>
              <i data-feather="eye-off" style=" display: none;"></i>
             </div>
                </label>
              </div>
               </div>
           
              <div class="row">
              <div class="col-md-6">
                <label for="photo" class="form-label">Ajouter photo</label>
                <input id="photo" class="form-control" type="file" name="photo" accept=".jpg,.jpeg,.png" placeholder="Ajouter votre photo">
              </div>
            </div>
        
          <div class="d-flex justify-content-center">
          <button class="btn btn-btn mt-4" style="background-color:#0F3018 ; color:white;" type="submit" name="submit" onclick="validation()">S'inscrire</button>
          </div>
          <div>
        <button class="btn btn-btn" type="submit" style="background-color:white ; color:blue;"><a href="connexionAD.php">CONNEXION?</a></button>
          </div>
        </form>
        </div> 
               <script  src="inscr.js"></script>
              
</body>

</html>
 