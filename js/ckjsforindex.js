var sessionToken = localStorage.getItem('sessionToken');
console.log(sessionToken);
if(sessionToken!=null){
    a=document.getElementById("logout");
    console.log(a);
    a.remove();
}
else{
    a=document.getElementById("login");
    a.remove();
}