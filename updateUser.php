<?php

require 'connection.php';

$id = $_REQUEST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$update_Query = "UPDATE user_table SET name = '$name', email = '$email' WHERE id = '$id'";
$result = mysqli_query($conn, $update_Query);

if ($result > 0) {
	$response['error'] = "200";
	$response['message'] = "User Updated Successfully";
}else{
	$response['error'] = "400";
	$response['message'] = "User Updation Failed";
}

echo(json_encode($response));



















?>