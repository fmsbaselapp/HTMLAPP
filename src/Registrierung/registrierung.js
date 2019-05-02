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





//autocomlete nach @
var input = document.getElementById("email_field"),
    oldValue,
    newValue,
    difference = function(value1, value2) {
      var output = [];
      for(i = 0; i < value2.length; i++) {
        if(value1[i] !== value2[i]) {
          output.push(value2[i]);
        }
      }
      return output.join("");
    },

    keyDownHandler = function() {
      oldValue = input.value;
    },
    inputHandler = function() {
      newValue = input.value;

      //wenn @ gedrückt wird
      if (difference(oldValue, newValue) === "@"){ //check if @
        document.getElementById("email_field").value = newValue + "stud.edubs.ch";
        mail_check();
        document.getElementById("password_field").focus();
        focused.next("password_field").trigger('touchstart');
      };
    };

input.addEventListener('keydown', keyDownHandler);
input.addEventListener('input', inputHandler);


//check ob eingabe bei inputs stimmt => rot/grüner rahmen bei inputs
function mail_check(){
  document.getElementById("email_field").keyup(function () {
  var re = /^([a-zA-Z]{2,15})+\.+([a-zA-Z]{2,15})+@(stud.edubs.ch)$/gm;   //@can do isch dr checker obs e edubs mail isch: /^([a-zA-Z]{2,15})+\.+([a-zA-Z]{2,15})+@(stud.edubs.ch)$/gm;  
    if (re.test($(this).val())) {
      document.getElementById("email_field").style.borderColor = "#54C17C";
      document.getElementById("email_field").style.backgroundColor = "white";
    } else {
      document.getElementById("email_field").style.borderColor = "#F44336";
      document.getElementById("email_field").style.backgroundColor = "white";
    }
});

document.getElementById("password_field").keyup(function () {
  var re = /^.{8,}$/;  //starkes passwort
    if (re.test($(this).val())) {
      document.getElementById("password_field").style.borderColor = "#54C17C";
      document.getElementById("password_field").style.backgroundColor = "white";
    } else {
      document.getElementById("password_field").style.borderColor = "#F44336";
      document.getElementById("password_field").style.backgroundColor = "white";
    }
});
}


//autorisieren
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // Nutzer ist angemeldet

    document.getElementById("user_div").style.display = "block";
    document.getElementById("anmeldung-karte").style.display = "none";
    document.getElementById("button").style.display = "none";       


    var user = firebase.auth().currentUser;

    if(user != null){

      var email_id = user.email;
      document.getElementById("user_para").innerHTML = "Eigeloggt mit : " + email_id;    
    }

  } else {
    //dies wird angezeigt, wenn niemand angemeldet ist. Standartseite

    document.getElementById("user_div").style.display = "none";
    document.getElementById("anmeldung-karte").style.display = "block";
    document.getElementById("button").style.display = "flex";}
});