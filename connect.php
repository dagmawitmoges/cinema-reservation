<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phoneNumber = $_POST['phoneNumber'];
	echo($firstName);
	function password_check($pass){
		if(strlen($pass) < 5){
			return "password is short";
		} else {
			return "password is correct";
		}
	}

	function null_field_check($firstName, $lastName, $gender, $email, $password, $phoneNumber){
		if ($firstName == '' || $lastName == '' || $gender == '' || $email == '' || $password == '' || $phoneNumber == '') {
			return "you have missing field/s";
		} else{
			return "all required fields exist";
		}
	}
   

	// Database connection
	$conn = new mysqli('localhost','root','','cinema');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(firstName, lastName, gender, email, password, phoneNumber) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $phoneNumber);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		
	header("Location: maincinema.html");
    $stmt->close();
    $conn->close();
	}
?>