feather.replace();
const eye = document.querySelector(".feather-eye");
const eyeoff = document.querySelector(".feather-eye-off");
const passwordField = document.querySelector("input[type=password]");
eye.addEventListener("click", () => {
  eye.style.display = "none";
  eyeoff.style.display = "block";
  passwordField.type = "text";
});

eyeoff.addEventListener("click", () => {
  eyeoff.style.display = "none";
  eye.style.display = "block";
  passwordField.type = "password";
});


 let myForm = document.getElementById("myForm");
let email = document.getElementById("email");
 let mot_de_passe = document.getElementById("mot_de_passe");


 email.addEventListener('keyup',function(e){
   let error = document.getElementById("error");
   if (email.value.trim() =='')  {
       error.innerHTML = 'champs contenant * obligatoire!';
       error.style.color = 'red';
       email.style.borderColor = "red";
      return;
     }
  
     error.innerHTML = 'bon!';
     error.style.color = 'green';
     email.style.borderColor = "#008a00";
 })
  mot_de_passe.addEventListener('keyup',function(e){
   let error1 = document.getElementById("error1");
   if (mot_de_passe.value.trim() =='')  {
      
       error1.innerHTML = 'champs contenant * sont obligatoire!';
       error1.style.color = 'red';
     mot_de_passe.style.borderColor = "red";
      return;
     }
    
     error1.innerHTML = 'bon!';
     error1.style.color = 'green';
     mot_de_passe.style.borderColor = "#008a00";
 })
 function validation()
{
var expressionReguliere = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
document.getElementById(error).innerHTML = "";
if (expressionReguliere.test(document.getElementById('email').value))
{
document.getElementById(error).innerHTML ="L'adresse mail est valide";
document.getElementById(error).style.color = green;
}
else
{
document.getElementById(error).innerHTML = "L'adresse mail n'est pas valide";
document.getElementById(error).style.color = red;
}
return false;
}