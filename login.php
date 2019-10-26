<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else{

$name = $_POST['name'];
$surname= $_POST['surname'];
$dob= $_POST['dob'];
$address= $_POST['address'];
$phone= $_POST['phone'];
$email= $_POST['email'];
$zip= $_POST['zip'];

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "company");

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username, password,date of birth,address,phone,email,zip from login where username=? AND password=? AND date of birth? AND addres? AND phone? AND email? AND zip? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $name, $surname ,$date of birth ,$address, $phone, $email, $zip);
$stmt->execute();
$stmt->bind_result($name, $surname ,$date of birth ,$address, $phone, $email, $zip);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $name; // Initializing Session
header("location: profile.php"); // Redirecting To Profile Page
}
mysqli_close($conn); // Closing Connection
}
?>
