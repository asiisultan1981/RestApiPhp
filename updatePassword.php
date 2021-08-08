<?php

require 'connection.php';

$currentPass = $_POST['currentPass'];
$newPass = $_POST['newPass'];
$email = $_POST['email'];




$checkUser = "SELECT * FROM user_table WHERE email = '$email' AND password = '$currentPass'";
$result = mysqli_query($conn, $checkUser);

if (mysqli_num_rows($result) > 0) {
	$updatePassword = "UPDATE user_table SET password = '$newPass' WHERE email = '$email'";
	$updateQuery = mysqli_query($conn, $updatePassword);

	if ($updateQuery > 0) {
		$response['error'] = "200";
		$response['message'] = "User Password Updated Successfully";
	}else{
		$response['error'] = "400";
		$response['message'] = "User Password Updation Failed";
	}
}else{
	$response['error'] = "400";
	$response['message'] = "User does not exist";
}

echo(json_encode($response));










?>