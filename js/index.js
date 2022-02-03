let login = document.querySelector('.form-login');
let register = document.querySelector('.form-register');

document.getElementById('connexion').addEventListener('click',function(){
login.style.display = "flex";
register.style.display = "none";
})

document.getElementById('register').addEventListener('click',function(){
register.style.display = "flex";
login.style.display = "none";
})