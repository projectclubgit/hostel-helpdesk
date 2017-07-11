function login(){
		const email = document.getElementById('email').value;
		const password = document.getElementById('password').value;
		const toast = document.getElementById('toast');


		firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
		  // Handle Errors here.
		  var errorCode = error.code;
		  var errorMessage = error.message;

		  document.getElementById('email').value = "";
		  document.getElementById('password').value = "";
		  toast.MaterialSnackbar.showSnackbar({ message : errorMessage});

		  console.log(errorMessage);
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

      case "/wardenlogin.html":
      {
        window.location="warden_dash.html";
      }
      break;


      default:
      break;

    }
  } else {
  //  switch (window.location.pathname) {
  //    case "/wardenlogin.html": break;
  //    default: window.location = "login.html"; break;
    //}
		window.location = "/wardenlogin.html";
  }
});
