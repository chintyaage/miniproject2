const signupBtn=document.getElementById('signupBtn');
const signinBtn=document.getElementById('signinBtn');
const loginAdminBtn=document.getElementById('loginAdminBtn');
const signinForm=document.getElementById('signin');
const signupForm=document.getElementById('signup');
const loginAdminForm=document.getElementById('login_admin');

signupBtn.addEventListener('click', function(){
    signinForm.style.display="none";
    signupForm.style.display="block";
    loginAdminForm.style.display="none";
});

signinBtn.addEventListener('click', function(){
    signinForm.style.display="block";
    signupForm.style.display="none";
    loginAdminForm.style.display="none";

});

loginAdminBtn.addEventListener('click', function(){
    signinForm.style.display="none";
    signupForm.style.display="none";
    loginAdminForm.style.display="block";
});
