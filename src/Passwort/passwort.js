function passwort_zurücksetzen(){
  var auth = firebase.auth();
  var emailAddress = document.getElementById("email_field").value;

auth.sendPasswordResetEmail(emailAddress).then(function() {
  // Email sent.
}).catch(function(error) {
  // An error happened.
  var errorCode = error.code;
  var errorMessage = "Es ist ein Fehler aufgetreten: Deine Edubs E-Mail wurde nicht gefunden.";

  window.alert(errorMessage);
});
}

//Diese Zeichen nicht eingebbar
$("input[type='email']").on('keypress', function (e) {
  var blockSpecialRegex = /[~`!%#$%^&()_={}[\]:;,<> +*"'£\/?-]/;
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
          }, 2000);
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