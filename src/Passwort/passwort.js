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
        document.getElementsByName("html").blur();
        
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
}