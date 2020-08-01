<?php

if(isset($_POST['loginButton'])){
	//echo "Login Button was pressed";
	$username = $_POST['loginUserName'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

	if ($result == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("location: index.php");
	}

}	

?>