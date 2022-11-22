
let myForm = document.getElementById("myForm");
let prenom = document.getElementById("prenom");
 let nom = document.getElementById("nom");
 let email = document.getElementById("email");

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