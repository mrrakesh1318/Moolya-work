

<html>
<head>
	<title>Registration</title>
	<style>
		form {
			width: 50%;
			margin: 2rem auto;
		}
		form label {
			display: block;
			margin-bottom: 4px;
		}
		form input, form textarea, form select {
			width: 100%;
			padding: 8px 6px;
			margin-bottom: 4px;
		}
		form input[type="submit"] {
			background: rgba(23, 123, 244, 1);
			border: none;
			border-radius: 4px;
			padding: 8px 6px;
			font-size: 14px;
			cursor: pointer;
		}
	</style>
</head>
<body>

<form action="insert.php" method="post">
<div>
	<label for="">Name</label>
	<input type="text" name="name">
</div>
<div>
	<label for="">Email</label>
	<input type="text" name="email">
</div>
<div>
	<label for="">Contact</label>
	<input type="number" name="contact">
</div>
<div>
	<label for="">Gender</label>
	<select name="gender">
	<option value="select">Select</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	<option value="Other">Other</option>
</select>
</div>
<div>
	<label for="">Feedback</label>
	<textarea name="feedback"></textarea><br>
</div>
<input type="submit" value="submit">
</form>


<!-- <?php

$servername = "remotemysql.com";
$username = "xTU08uuu2F";
$password = "OWj6leo64z";

$dbname ="xTU08uuu2F";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$statement = $conn->prepare("SELECT * FROM USERINFO");

$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);



} catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}

?> -->

</body>
</html>