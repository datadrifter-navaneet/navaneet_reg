$(document).ready(function(){
$("#regbutton").click(function(){
let username = $("#username").val();
let password = $("#password").val();
let email = $("#email").val();
$.ajax({
url:"register.php",
type:"POST",
data:{
       username:username,
       password:password,
       email:email},

success:function(response){
                alert(response);},

error:function(){
                alert("Registration failed!!!");}});});});