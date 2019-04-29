firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // Nutzer ist angemeldet

    document.getElementById("user_div").style.display = "block";
    document.getElementById("anmeldung-karte").style.display = "none";
    document.getElementById("button").style.display = "none";       


    var user = firebase.auth().currentUser;

    if(user != null){

      var email_id = user.email;
      document.getElementById("user_para").innerHTML = "Bestätige deine Edubs-Mail: " + email_id;    
    }

  } else {
    //dies wird angezeigt, wenn niemand angemeldet ist. Standartseite

    document.getElementById("user_div").style.display = "none";
    document.getElementById("anmeldung-karte").style.display = "block";
    document.getElementById("button").style.display = "flex";

  }
});

function login(){

  var userEmail = document.getElementById("email_field").value;
  var userPass = document.getElementById("password_field").value;

  firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
    // Hier wird der Error wiedergegeben
    var errorCode = error.code;
    var errorMessage = "Es ist ein Fehler aufgetreten: Deine Edubs-Mail oder dein Passwort stimmt nicht überein!";

    window.alert(errorMessage);

    // ...
  });

}

  function create_user(){

    var userEmail = document.getElementById("email_field").value;
    var userPass = document.getElementById("password_field").value;
  
    firebase.auth().createUserWithEmailAndPassword(userEmail, userPass).catch(function(error) {
      // Hier wird der Error wiedergegeben
      var errorCode = error.code;
      var errorMessage = "Es ist ein Fehler aufgetreten: Dein Passwort stimmt nicht überein oder du hast keine Edubs-Mailadresse benutzt.";
      
      window.alert(errorMessage);

    });

}

function logout(){
  firebase.auth().signOut();
}

function send_verification(){
  var user = firebase.auth().currentUser;

user.sendEmailVerification().then(function() {
  // Email sent.
}).catch(function(error) {
  // An error happened.
});

}