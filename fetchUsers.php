<?php

require "connection.php";

$users = "SELECT name, email FROM user_table ";
$result = mysqli_query($conn, $users);

if (mysqli_num_rows($result) > 0) {

	while ($row = $result->fetch_assoc()) {
		$response['users'][] = $row;
	}
	
}else{
	$response['error'] = "111";
	
}

echo json_encode($response);



?>