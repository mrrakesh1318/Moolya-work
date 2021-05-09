<?php 

$servername = "remotemysql.com";
$username = "xTU08uuu2F";
$password = "OWj6leo64z";

$dbname ="xTU08uuu2F";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// sql to create table
$statement = $conn->prepare("SELECT * FROM USERINFO WHERE id = :id");
$statement->bindParam(':id', $_GET['id']);
  // use exec() because no results are returned
$statement->execute();
$user = $statement->fetch(PDO::FETCH_NAMED);

header("Content-Type: application/json");
header("HTTP_ACCEPT: application/json");
echo json_encode($user);

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}