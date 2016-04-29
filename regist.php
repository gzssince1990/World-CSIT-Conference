<?php

$first_name = $_POST["first_name"];
//echo $first_name;
//echo "<br>";

$last_name = $_POST["last_name"];
//echo $last_name;
//echo "<br>";

$title = $_POST["title"];
//echo $title;
//echo "<br>";

$company = $_POST["company"];
//echo $company;
//echo "<br>";

$organization = $_POST["organization"];
//echo $organization;
//echo "<br>";

$address = $_POST["address"];
//echo $address;
//echo "<br>";

$phone_number = $_POST["phone_number"];
//echo $phone_number;
//echo "<br>";

$email = $_POST["email"];
//echo $email;
//echo "<br>";

$identity = $_POST["identity"];
//echo $identity;
//echo "<br>";

$username = $_POST["username"];
//echo $username;
//echo "<br>";

$password = $_POST["password"];
//echo $password;
//echo "<br>";

$password_check = $_POST["password_check"];
//echo $password_check;
//echo "<br>";


/* insert the information in to DB*/
$servername_db = "localhost";
$username_db = "root";
$password_db = "";
$dbname_db = "conference_data";

try{
	$conn = new PDO("mysql:host=$servername_db; dbname=$dbname_db", $username_db, $password_db);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM user_data WHERE username='$username'";
        $result = $conn->query($sql);

	if (!isset($result)) {
		$sql = "INSERT INTO user_data (username, password, address, email, phone, affiliation, paper_id)
		VALUES ('". $username."','". $password."','".$address."','".$email."',". $phone_number.",'".$organization."',10)";
		$conn->exec($sql);
		echo "New record added";
	}else{
		echo "username exists!";
	}

}
catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>