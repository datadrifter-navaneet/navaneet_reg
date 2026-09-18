$(document).ready(function () {
$("#profbutton").click(function () {
let age = $("#age").val();
let dob = $("#dob").val();
 let num = $("#num").val();
let session_id = localStorage.getItem("session_id");
$.ajax({
url: "profile.php",
 type: "POST",
data: {
session_id: session_id,
age: age,
dob: dob,
num: num
},
success: function (response) {
alert(response);
},
error: function () {
alert("Profile update has failed!!!");}});});});