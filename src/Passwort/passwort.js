function passwort_zurücksetzen(){
  var auth = firebase.auth();
  var emailAddress = document.getElementById("email_field").value;

auth.sendPasswordResetEmail(emailAddress).then(function() {
  // Email sent.

  document.getElementById("user_div").style.display = "none";
  document.getElementById("anmeldung-karte").style.display = "block";
  document.getElementById("button").style.display = "flex";


}).catch(function(error) {
  // An error happened.
  var errorCode = error.code;
  var errorMessage = "Es ist ein Fehler aufgetreten: Deine Edubs-Mail wurde nicht gefunden.";

  document.getElementById("user_div").style.display = "block";
  document.getElementById("anmeldung-karte").style.display = "none";
  document.getElementById("button").style.display = "none";

  window.alert(errorMessage);
});
}