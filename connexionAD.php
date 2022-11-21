<?php
/*LIAISON AVEC LE FORMULAIRE A LA BASE DE DONNEE*/
include('basse/BD.php');

 if (isset($_POST['submit'])){;       
  $email = $_POST['email']; 
  $mot_de_passe =md5($_POST['mot_de_passe']);    

  $select_mail = $dbco->prepare("SELECT email FROM `USER` WHERE email ='".$email."' AND mot_de_passe = '".$mot_de_passe."' AND roles = 'Administrateur' ");
  $select_mail->execute([$email]);
  $select_all=$dbco->prepare("SELECT * FROM USER where email = '$email' AND etat = 0  AND mot_de_passe = '".$mot_de_passe."'");
  $select_all->execute();

    while ($rod = $select_all->fetch(PDO::FETCH_ASSOC)) {
if ($select_mail->rowCount() > 0)
{
  session_start();/* il faut avoir session_start pour utiliser une variable session */
  $_SESSION['identifiant'] = $rod['ID'];  
  $_SESSION['photo'] = $rod['photo'];
  $_SESSION['ID']= $data['ID'];

  $select_mail = $dbco->prepare("SELECT email FROM `USER` WHERE email ='".$email."'  AND mot_de_passe = '".$mot_de_passe."' AND roles = 'Administrateur' AND etat = 0 ");
  $select_mail->execute([$email]);
  header("Location:pageAdmin.php");
  if($select_mail==0){
echo 'Ce compte existe plus';
 }
} else {
   session_start();/* il faut avoir session_start pour utiliser une variable session */
  $_SESSION['identifiant'] = $rod['ID'];
  $_SESSION['photo'] = $rod['photo'];
 
  $select_mail = $dbco->prepare("SELECT email FROM `USER` WHERE email ='".$email."' AND mot_de_passe = '".$mot_de_passe."' AND roles = 'Utilisateur' AND etat = 0 ");
  $select_mail->execute([$email]);
   header("Location:pageUser.php");

 }
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
$('#error1').html(checkStrength($('#mot_de_passe').val())) 
}) 

 mot_de_passe.addEventListener('keyup',function(e){
   let error1 = document.getElementById("error1");
   if (mot_de_passe.value.trim() =='1')  {
      
       error1.innerHTML = 'champs contenant * sont obligatoire!';
       error1.style.color = 'red';
     mot_de_passe.style.borderColor = "red";
      return;
     }
    
     error1.innerHTML = 'bon!';
     error1.style.color = 'green';
     mot_de_passe.style.borderColor = "#008a00";
 })
  }); 
  </script>
    <title>CONNEXION</title>
</head>
<body class="d-flex justify-content-center" >


    <div class="container p-0 bg-light" style="margin: 5px; background-image:url(image/i.jpg);background-size:cover; width: 100%; height:620px; border-radius:15px;" >
     <!--  <div class="d-flex" ><img src="image/i.jpg" width="100%" height="210px"></div> -->
        <!-- bg-light border border-dark pour la bordure --> 
        <div class="d-flex justify-content-center p-0 bg-light border" style="width:50%; opacity:90%;margin-left:265px; margin-top:100px; border-radius:15px;flex-wrap:wrap;box-shadow:0 4px 8px 0px rgb(0 0 0/30%);">
        <h1 class="d-flex justify-content-center" style="background-color:#160F30; color:white; width:100%;border-radius:0 15px 0 15px;">CONNEXION</h1>
       
    <form class="p-4 d-flex justify-content-center" id="myForm" method="post" name="form"> 
            <div class="row mt-2d-flex justify-content-center ">
              <div class="col-md-6">
                <label for="mail" class="form-label">Email<span class="text-danger">*</span></label>
                <input id="email" class="form-control bg-light border border-dark" type="email" name="email" placeholder="Entrer votre mail">
                <p id="error"></p>
                
              </div>
        
            <div class="row mt-2d-flex justify-content-center ">
              <div class="col-md-6">
                <label for="mot_de_passe" class="form-label " style="position: relative;"><p>Mot de passe<span class="text-danger">*</span></p>
             <input id="mot_de_passe" class="form-control bg-light border border-dark" type="password" name="mot_de_passe" placeholder="Entrer votre mot de passe"
             style="color:black; transition: all 0.2s;">
             <p id="error1"></p>
              <div class="password-icon" style=" display: flex;
  align-items: center;
  position: absolute;
  top: 60px;
  right: 0px;
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
          <div class="d-flex justify-content-center">
          <button class="btn btn-btn mt-4" style="background-color:#0F3018 ; color:white;" name="submit" id="btn" onclick="nonVide(document.getElementById('email','mot_de_passe'),)" 
                value='Validation saisie'  type="submit">Se connecter</button>
          </div>
          <div>
        <button class="btn btn-btn" type="submit" style="background-color:white ; color:blue;"><a href="Inscription.php">INSCRIPTION?</a></button>
          </div>    </div>  </div>
        </form>
          </div> 
        </div> 
      
 <script src="connec.js" ></script>
</body>
</html>