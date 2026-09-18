$(document).ready(function(){
$("#logbutton").click(function(){
let username = $("#username").val();
let password = $("#password").val();
$.ajax({
url:"login.php",
type:"POST",
data:{
       username:username,
       password:password,
       },

success: function(response){
if(response != "Invalid username or password!!!")
{
  localStorage.setItem("session_id", response);
  alert("Login is  successful!");
  window.location.href = "profile.html";
} else {
 alert(response);}
 },
    error: function(){
     alert("Login failed!!!");}});});});

