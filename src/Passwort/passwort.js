function passwort_zurücksetzen(){
  var auth = firebase.auth();
  var emailAddress = document.getElementById("email_field").value;

auth.sendPasswordResetEmail(emailAddress).then(function() {
  // Email sent.
}).catch(function(error) {
  // An error happened.
  var errorCode = error.code;
  var errorMessage = "Es ist ein Fehler aufgetreten: Deine Edubs-Mail wurde nicht gefunden.";

  window.alert(errorMessage);
});
}

