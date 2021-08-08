<?php


require 'connection.php';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

// $name = $_POST['name'];
// $email = $_POST['email'];
// $password = $_POST['password'];

$checkUser = "SELECT * FROM user_table WHERE email = '$email'|| password = '$password'";
$checkUserQuery = mysqli_query($conn, $checkUser);

if (mysqli_num_rows($checkUserQuery) > 0) {
	$json['error'] = "111";
		$json['message'] = "User already exists!";
	
}else{

	$insertQuery = "INSERT INTO user_table (name, email, password) VALUES ('$name', '$email', 
	'$password')";

	$result = mysqli_query($conn, $insertQuery);

	if ($result) {
		$json['error'] = "000";
		$json['message'] = "Resgistration Successful.";
	}else{
		$json['error'] = "111";
		$json['message'] = "Resgistration Failed.";
	}

}

 echo json_encode($json);


// if ($result) {
// 	$json = array('response' => 'success', "status" => 0, "message" => "Submitted Successfully");
// }else{
// 	$json = array('response' => 'error', "status" => 1, "message" => "Error");

// }


// echo json_encode($json);







?>