firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // Nutzer ist angemeldet
    /*
    document.getElementById("user_div").style.display = "block";
    document.getElementById("anmeldung-karte").style.display = "none";
    document.getElementById("button").style.display = "none";               //timon
    */

    var user = firebase.auth().currentUser;

    if(user != null){

      var email_id = user.email;
      //document.getElementById("user_para").innerHTML = "Eigeloggt mit : " + email_id;     //timon

      //weiterleitung test seite von timon ==========================================================
      window.location.href = "https://classmateapp.online/benutzer.html"
      //=============================================================================================
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

function logout(){
  firebase.auth().signOut();
}
