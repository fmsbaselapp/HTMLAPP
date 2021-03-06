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
      var email_verified = user.emailVerified;

      document.getElementById("user_para").innerHTML = "Angemeldet mit : " + email_id;   

    }

  } else {
    //dies wird angezeigt, wenn niemand angemeldet ist. Standartseite

    document.getElementById("user_div").style.display = "none";
    document.getElementById("anmeldung-karte").style.display = "block";
    document.getElementById("button").style.display = "flex";}
});


function login(){

  var mail = /^([a-zA-Z]{2,15})+\.+([a-zA-Z]{2,15})+@(stud.edubs.ch)$/gm; 
  var passwort = /^.{8,}$/;
    if (mail.test(document.getElementById("email_field").value)){
      document.getElementById("email_field").style.borderColor = "#54C17C";
      document.getElementById("email_field").style.backgroundColor = "white";
      document.getElementById("mail_error").style.display = "none";
      mailcheck = true
    }
    else{
      document.getElementById("mail_error").style.display = "block";
      document.getElementById("email_field").style.borderColor = "#F44336";
      document.getElementById("email_field").style.backgroundColor = "white";
      mailcheck = false
    }
    
    if ((passwort.test(document.getElementById("password_field").value))){
      document.getElementById("password_field").style.borderColor = "#54C17C";
      document.getElementById("password_field").style.backgroundColor = "white";
      document.getElementById("password_error").style.display = "none";
      passwortcheck = true
    }
    else{
      document.getElementById("password_error").style.display = "block";
      document.getElementById("password_field").style.borderColor = "#F44336";
      document.getElementById("password_field").style.backgroundColor = "white";
      passwortcheck = false
    }

    if (mailcheck && passwortcheck){
      login_ausführen()
    }
  }

  function login_ausführen(){

    var userEmail = document.getElementById("email_field").value;
    var userPass = document.getElementById("password_field").value;
  
    firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
      // Hier wird der Error wiedergegeben
      var errorCode = error.code;
      var errorMessage = "Es ist ein Fehler aufgetreten: Deine Edubs E-Mail oder dein Passwort stimmt nicht überein!";
      //Css Values
      
      document.getElementById("email_field").setAttribute(
        "style", "border-color: #F44336; background-color: white;");
      document.getElementById("password_field").setAttribute(
        "style", "border-color: #F44336; background-color: white;");
      document.getElementById("passwort-zurücksetzen").style.display = "block";   
      //window.alert(errorMessage);
  
      // ...
    });
}


function logout(){
  firebase.auth().signOut();
}

//Diese Zeichen nicht eingebbar
$("input[type='email']").on('keypress', function (e) {
  var blockSpecialRegex = /[~`!%#$%^&()_={}[\]:;,<>+ *"'£\/?¨^'`?¿≠|“±´‘¶\⁄‹”∞ı—`°`∑€®†Ω¡ø§å∂ƒªº∆¬¢¥≈©√∫~µ«…–~∫≤’‡™◊˙˚»÷]/;
    var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    console.log(key)
    if(blockSpecialRegex.test(key) || $.isNumeric(key)){
      e.preventDefault();
      return false;
    }
    });
    
$("input[type='email']").on('keypress', function (e) {
  var blockSpecialRegex = /[A-Z]/g;
    var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    console.log(key)
    if(blockSpecialRegex.test(key) || $.isNumeric(key)){
      e.preventDefault();
      return false;
    }
    });    

    


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
        document.getElementById("email_field").readOnly = true;
        setTimeout(function() {
          console.log("Callback Funktion wird aufgerufen");
          document.getElementById("email_field").readOnly = false;
          }, 2500);
        mail_check();      
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
      document.getElementById("password_field").focus();
      focused.next("password_field").trigger('touchstart');
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