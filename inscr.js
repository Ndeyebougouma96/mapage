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
function validation()
{
var expressionReguliere = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
document.getElementById(error2).innerHTML = "";
if (expressionReguliere.test(document.getElementById('email').value))
{
document.getElementById(error2).innerHTML ="L'adresse mail est valide";
document.getElementById(error2).style.color = green;
}
else
{
document.getElementById(error2).innerHTML = "L'adresse mail n'est pas valide";
document.getElementById(error2).style.color = red;
}
return false;
}

let myForm = document.getElementById("myForm");
let prenom = document.getElementById("prenom");
 let nom = document.getElementById("nom");
 let email = document.getElementById("email");
 let mot_de_passe = document.getElementById("mot_de_passe");
 let conf_mot_de_passe = document.getElementById("conf_mot_de_passe");
 let roles = document.getElementById("roles");

 nom.addEventListener('keyup',function(e){
   let error = document.getElementById("error");
   if (nom.value.trim() =='')  {
       error.innerHTML = 'champs contenant * sont obligatoire!';
       error.style.color = 'red';
       nom.style.borderColor = "red";
      return;
     }
     error.innerHTML = 'bon!';
     error.style.color = 'green';
     nom.style.borderColor = "#008a00";
 })
 
 prenom.addEventListener('keyup',function(e){
   let error1 = document.getElementById("error1");
   if (prenom.value.trim() =='')  {
      error1.innerHTML = 'champs contenant * sont obligatoire!';
     error1.style.color = 'red';
    prenom.style.borderColor = "red";
      return;
     }
   error1.innerHTML = 'bon!';
  error1.style.color = 'green';
     prenom.style.borderColor = "#008a00";
 })
 
 email.addEventListener('keyup',function(e){
   let error2 = document.getElementById("error2");
   if (email.value.trim() =='')  {
      
       error2.innerHTML = 'champs contenant * sont obligatoire!';
       error2.style.color = 'red';
       email.style.borderColor = "red";
      return;
     }
    
     error2.innerHTML = 'bon!';
     error2.style.color = 'green';
     email.style.borderColor = "#008a00";
 }) 
 roles.addEventListener('change',function(e){
   let error3 = document.getElementById("error3 ");
   if (roles.value.trim() =='')  {
      
     error3 .innerHTML = 'champs contenant * sont obligatoire!';
     error3 .style.color = 'red';
     roles.style.borderColor = "red";
      return;
     }
    error3 .innerHTML = 'bon!';
    error3 .style.color = 'green';
     roles.style.borderColor = "#008a00";
 })
 
 

 
 

 
 
