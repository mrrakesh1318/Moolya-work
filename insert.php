<style>
  .alert {
    padding: 1rem;
    border: 1px solid black;
    border-radius: 4px;
    text-align: center;
    margin-bottom: 2rem;
  }
  div {
    width: 50%;
    margin: 0 auto;
    padding: 2rem;
  }
  p {
    margin: 8px 0;
  }
</style>

<?php
$servername = "remotemysql.com";
$username = "xTU08uuu2F";
$password = "OWj6leo64z";

// try {
//   $conn = new PDO("mysql:host=$servername", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $sql = "CREATE DATABASE IF NOT EXISTS xTU08uuu2F";
//   // use exec() because no results are returned
//   $conn->exec($sql);
//   echo "Database created successfully<br>";
// } catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }

//Created DB
$dbname ="xTU08uuu2F";
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
  $last_id =$conn->lastInsertId();
  //echo $last_id;
  echo "<div class='alert'>New records added successfully</div>";
  #header("Location: info.php?id=".$last_id);

  $stmt = $conn->prepare("SELECT id, name, email, contact, gender, feedback FROM USERINFO WHERE id='$last_id'");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;
?>


<div>
  <p><?php echo $result['name']; ?></p>
  <p><?php echo $result['email']; ?></p>
  <p><?php echo $result['contact']; ?></p>
  <p><?php echo $result['gender']; ?></p>
  <p><?php echo $result['feedback']; ?></p>
</div>