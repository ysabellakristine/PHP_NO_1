<?php 

session_start();

// Check if submitBtn exists
if(isset($_POST['submitBtn'])) {

	// Get the first name from index.php
	$firstName = $_POST['firstName'];

	// Get the password from the input field
	$password = md5($_POST['password']);

	// Set the session variables
	$_SESSION['firstName'] = $firstName;
	$_SESSION['password'] = $password;

	// Go back to index.php
	header('Location: index.php');
}

?>
