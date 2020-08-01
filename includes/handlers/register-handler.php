<?php

function sanetizeFormUsername($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanetizeFormStrings($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanetizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}

if(isset($_POST['registerButton'])){
	//echo "Register Button was pressed";
	$username = sanetizeFormUsername($_POST['username']);		
	$firstName = sanetizeFormStrings($_POST['firstName']);
	$lastName = sanetizeFormStrings($_POST['lastName']);
	$email = sanetizeFormStrings($_POST['email']);
	$email2 = sanetizeFormStrings($_POST['email2']);
	$password = sanetizeFormPassword($_POST['password']);
	$password2 = sanetizeFormPassword($_POST['password2']);

	$wasSuccessful = $account -> register($username, $firstName, $lastName, $email, $email2, $password, $password2);

	if ($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("location: index.php");
	}

}

?>
