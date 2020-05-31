<html>
<head>
	<title>Adaugati</title>
</head>

<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['nume']);
	$age = mysqli_real_escape_string($mysqli, $_POST['ani']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		

	if(empty($nume) || empty($ani) || empty($email)) {
				
		if(empty($nume)) {
			echo "<font color='red'>Nume este gol</font><br/>";
		}
		
		if(empty($ani)) {
			echo "<font color='red'>Ani este gol.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email este gol.</font><br/>";
		}

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 

		$result = mysqli_query($mysqli, "INSERT INTO users(nume,ani,email) VALUES('$nume','$ani','$email')");
		

		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
