<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name){
		if (isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MusiQ</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>

</head>
<body>
	<?php

	if (isset($_POST["registerButton"])) {
		echo '<script>
			 $(document).ready(function() {
			 		$("#loginForm").hide();
			 		$("#registerForm").show();	 	
			 });
			</script>';
	}
	else{
		echo '<script>
			 $(document).ready(function() {
			 		$("#loginForm").show();
			 		$("#registerForm").hide();	 	
			 });
			</script>';
	}
	?>
	
	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to MusiQ</h2>
					<p>
						<?php echo $account->getError(constants::$loginFailed); ?>
						<label for="loginUserName">Username</label>
						<input id="loginUserName" type="text" name="loginUserName" placeholder="Please enter name" value="<?php getInputValue('loginUserName')?>"required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" type="password" name="loginPassword" placeholder="Please enter secure password" required>
					</p>

					<button type="submit" name="loginButton">Log In</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? SignUp here!</span>
					</div>

				</form> 
				
				<form id="registerForm" action="register.php" method="POST">
					<h2>Create MusiQ Account</h2>
					<p>
						<?php echo $account->getError(constants::$userNameCharacters); ?>
						<?php echo $account->getError(constants::$usernameTaken); ?>
						<label for="username">Username</label>
						<input id="username" type="text" name="username" placeholder="Please enter name" value="<?php getInputValue('username')?>"required>
					</p>
					<p>
						<?php echo $account->getError(constants::$firstNameCharacters); ?>
						<label for="firstName">First Name</label>
						<input id="firstName" type="text" name="firstName" placeholder="Please enter first name" value="<?php getInputValue('firstName')?>" required>
					</p>
					<p>
						<?php echo $account->getError(constants::$lastNameCharacters); ?>
						<label for="lastName">Last Name</label>
						<input id="lastName" type="text" name="lastName" placeholder="Please enter Last name" value="<?php getInputValue('lastName')?>" required>
					</p>
					<p>
						<?php echo $account->getError(constants::$emailInvalid); ?>
						<?php echo $account->getError(constants::$emailDoNoMatch); ?>
						<?php echo $account->getError(constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" type="email" name="email" placeholder="Please enter email id" value="<?php getInputValue('email')?>" required>
					</p>
					<p>
						<label for="email2">Confirm email</label>
						<input id="email2" type="email" name="email2" placeholder="Please confirm email" value="<?php getInputValue('email2')?>" required>
					</p>
					<p>
						<?php echo $account->getError(constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(constants::$passwordsNotAlphanumeric); ?>
						<?php echo $account->getError(constants::$passwordsCharacters); ?>
						<label for="password">Password</label>
						<input id="password" type="password" name="password" placeholder="Please enter secure password" required>
					</p>
					<p>
						<label for="password2">Confirm Password</label>
						<input id="password2" type="password" name="password2" placeholder="Please confirm password" required>
					</p>

					<button type="submit" name="registerButton">Sign Up</button>

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here!</span>
					</div>

				</form>
			</div>
			<div id="loginText">
				<h1>Trusted Voices. Billowing Beats. Magical moments. Experience Right Now!</h1>
				<h2>Listen to songs of your choice for free</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow favourite artists</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>