<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<title>Hostel Help Desk</title>
</head>


<body id="page-top">
<!-- Uses a transparent header that draws on top of the layout's background -->
<style>
.demo-layout-transparent {
  background: url('img/header-bg.jpg') center / cover;
}
.demo-layout-transparent .mdl-layout__header,
.demo-layout-transparent .mdl-layout__drawer-button {
  /* This background is dark, so we set text to white. Use 87% black instead if
     your background is light. */
  color: black;
}
#Login{
    margin-top: 2rem;
}

</style>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Hostel Help Desk</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <!-- <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
      </nav> -->
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Hostel Help Desk</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="outpass.html">Outpass</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
  <main class="mdl-layout__content">



    <?php
    	ob_start();
    	session_start();
    	require_once 'dbconnect.php';

    	// it will never let you open index(login) page if session is set
    	if ( isset($_SESSION['user'])!="" ) {
    		header("Location: home.php");
    		exit;
    	}

    	$error = false;

    	if( isset($_POST['btn-login']) ) {

    		// prevent sql injections/ clear user invalid inputs
    		$email = trim($_POST['email']);
    		$email = strip_tags($email);
    		$email = htmlspecialchars($email);

    		$pass = trim($_POST['pass']);
    		$pass = strip_tags($pass);
    		$pass = htmlspecialchars($pass);
    		// prevent sql injections / clear user invalid inputs

    		if(empty($email)){
    			$error = true;
    			$emailError = "Please enter your email address.";
    		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
    			$error = true;
    			$emailError = "Please enter valid email address.";
    		}

    		if(empty($pass)){
    			$error = true;
    			$passError = "Please enter your password.";
    		}

    		// if there's no error, continue to login
    		if (!$error) {

    			$password = hash('sha256', $pass); // password hashing using SHA256

    			$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
    			$row=mysql_fetch_array($res);
    			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

    			if( $count == 1 && $row['userPass']==$password ) {
    				$_SESSION['user'] = $row['userId'];
    				header("Location: home.php");
    			} else {
    				$errMSG = "Incorrect Credentials, Try again...";
    			}

    		}

    	}
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Coding Cage - Login & Registration System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>

    <div class="container">

    	<div id="login-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

        	<div class="col-md-12">

            	<div class="form-group">
                	<h2 class="">Sign In.</h2>
                </div>

            	<div class="form-group">
                	<hr />
                </div>

                <?php
    			if ( isset($errMSG) ) {

    				?>
    				<div class="form-group">
                	<div class="alert alert-danger">
    				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                    </div>
                	</div>
                    <?php
    			}
    			?>

                <div class="form-group">
                	<div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                	<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                    </div>
                    <span class="text-danger"><?php echo $emailError; ?></span>
                </div>

                <div class="form-group">
                	<div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                    </div>
                    <span class="text-danger"><?php echo $passError; ?></span>
                </div>

                <div class="form-group">
                	<hr />
                </div>

                <div class="form-group">
                	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
                </div>

                <div class="form-group">
                	<hr />
                </div>

                <div class="form-group">
                	<a href="register.php">Sign Up Here...</a>
                </div>

            </div>

        </form>
        </div>

    </div>

  </main>
</div>
    </body>
    </html>
    <?php ob_end_flush(); ?>









  <!-- <center class="loginForm">
    <h3>Login</h3>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" id="sample3">
      <label class="mdl-textfield__label" for="sample3">Registration Number</label>
    </div><br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="password" id="sample3">
      <lab/el class="mdl-textfield__label" for="sample3">Password</label>

    </div><br>
    <label>New user? <a href="SignUp.html">Sign up</a></label>
    <a href="logged in.html">
        <button id="Login" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Login
        </button>
      </a>
  </center> -->
