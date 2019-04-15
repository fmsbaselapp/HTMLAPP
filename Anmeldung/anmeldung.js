(function() {
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDFqZo1ImAZW3NhRMM_Ad6wj9jZ0cSYaH0",
    authDomain: "classmateapp-72ce9.firebaseapp.com",
    databaseURL: "https://classmateapp-72ce9.firebaseio.com",
    projectId: "classmateapp-72ce9",
    storageBucket: "classmateapp-72ce9.appspot.com",
    messagingSenderId: "218437580841"
  };
  firebase.initializeApp(config);

//Get elements
const email_field = document.getElementById('email_field')
const password_field = document.getElementById('password_field')
const btnLogin = document.getElementById('btnLogin')

//Login
btnLogin.addEventListener('click', e => {
  //Get email and password
  const email = email_field.value;
  const password = password_field.value
  const auth = firebase.auth();
  
  //Sing in
  const promise = auth.singInWithEmailAndPassword(email, password);
  promise.catch(e => console.log(e.message));


});
//Add a realtime listener
firebase.auth().onAuthStateChanged(firebaseUser => {
  if(firebaseuser) {
    console.log(firebaseuser);
  } else {
    console.log('nicht angemeldet')
  }
});

});