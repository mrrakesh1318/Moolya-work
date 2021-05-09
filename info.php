<html>
<body>

<?php $selected = $_POST['gender']; ?>

<form action="insert.php" method="post">
Name: <input type="text" name="name" value="<?php echo $_POST["name"]; ?>"/><br>
E-mail: <input type="text" name="email" value="<?php echo $_POST["email"]; ?>"><br>
Contact: <input type="number" name="contact" value="<?php echo $_POST["contact"]; ?>"><br>
Gender: <select name="gender">
	<option value="" <?php echo $selected == "" ? "selected": "";  ?> >
	Select
</option>
	<option value="Male" <?php echo $selected == "Male" ? "selected": "";  ?>>
	Male
</option>
	<option value="Female" <?php echo $selected == "Female" ? "selected": "";  ?>>
	Female
</option>
	<option value="Other" <?php echo $selected == "Other" ? "selected": "";  ?>>
	Other
</option>
</select><br>
Feedback: <textarea name="feedback"><?php echo $_POST["feedback"]; ?></textarea><br>

<input type="submit" name="Confirm">
</form>
<button onclick="window.history.back()">Edit</button>
</body>
</html>