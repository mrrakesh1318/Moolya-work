<?php
$servername = "localhost";
$username = "root";
$password = "123456";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE IF NOT EXISTS myDB";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

//Created DB
$dbname ="myDB";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS USERINFO (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(40) UNIQUE,
contact VARCHAR(12),
gender VARCHAR(6),
feedback VARCHAR(100))";

  // use exec() because no results are returned
$conn->exec($sql);
echo "Table USERINFO created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // prepare sql and bind parameters

  $name = $_REQUEST["name"];
  $email = $_REQUEST['email'];
  $contact = $_REQUEST['contact'];
  $gender = $_REQUEST['gender'];
  $feedback = $_REQUEST['feedback'];

  $stmt = $conn->prepare("INSERT INTO USERINFO (name, email, contact, gender, feedback)
  VALUES (:name, :email, :contact, :gender, :feedback)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':contact', $contact);
  $stmt->bindParam(':gender', $gender);
  $stmt->bindParam(':feedback', $feedback);

  $stmt->execute();

  echo "New records added successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;
?>
<!-- <?php

$selected = $_POST['gender'];
echo $_POST["name"]."<br>";
echo $_POST["email"]."<br>";
echo $_POST["contact"]."<br>";
echo $selected."<br>";
echo $_POST["feedback"]."<br>";
?> -->