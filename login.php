<?php

require "connection.php";


if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}


// $email = $_POST['email'];
// $password = md5($_POST['password']);

$checkUser = "SELECT * FROM user_table WHERE email = '$email' AND password = '$password'";
$checkUserQuery = mysqli_query($conn, $checkUser);

if (mysqli_num_rows($checkUserQuery) > 0) {

	while ($row = $checkUserQuery->fetch_assoc()) {
		$response['user'] = $row;
	}
	$json['error'] = "000";
	$json['message'] = "User Successfully Logged in";
}else{
	$json['error'] = "111";
	$json['message'] = "email or password incorrect";
}

echo json_encode($json);
echo(json_encode($response));




















?>