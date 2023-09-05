<?php
	
	@$fullname = $_POST['fullname'];
    @$number = $_POST['number'];
	@$gender = $_POST['gender'];
	@$email = $_POST['email'];
	@$password = $_POST['password'];
	
	$conn = new mysqli('localhost','root','','test1',3307);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(fullname, number, gender, email, password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisss", $fullname, $number, $gender, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>