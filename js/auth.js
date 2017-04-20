var provider = new firebase.auth.GoogleAuthProvider();
function login(){
  firebase.auth().signInWithPopup(provider).then(function(result) {
    // This gives you a Google Access Token. You can use it to access the Google API.
    var token = result.credential.accessToken;
    // The signed-in user info.
    var user = result.user;
    // ...
    console.log("in");
  }).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.

    console.log(errorMessage);

    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;
    // ...
  });
}

function logout(){
  firebase.auth().signOut();
}

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    console.log("loggedIn");
    switch (window.location.pathname) {
      case "/SignUp.html":
      {
        window.location="app.html";
      }
      break;
      case "/login.html":
      {
        window.location="app.html";
      }
      break;
      case "/fac_login.html":
      {
        window.location="fac_dash.html";
      }
      break;

      default:
      break;

    }
  } else {
    switch (window.location.pathname) {
      case "/login.html": break;
      case "/SignUp.html": break;
      case "/index.html": break;
      case "/fac_login.html":break;
      default: window.location = "login.html"; break;
    }
  }
});
