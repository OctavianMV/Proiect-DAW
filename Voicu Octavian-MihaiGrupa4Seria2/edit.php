<?php

include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['nume']);
	$age = mysqli_real_escape_string($mysqli, $_POST['ani']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// checking empty fields
	if(empty($nume) || empty($ani) || empty($email)) {	
			
		if(empty($nume)) {
			echo "<font color='red'>nume este gol.</font><br/>";
		}
		
		if(empty($ani)) {
			echo "<font color='red'>ani este gol.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email este gol</font><br/>";
		}		
	} else {	

		$result = mysqli_query($mysqli, "UPDATE users SET name='$nume',age='$ani',email='$email' WHERE id=$id");

		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nume = $res['nume'];
	$ani = $res['ani'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Editeaza</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>nume</td>
				<td><input type="text" name="name" value="<?php echo $nume;?>"></td>
			</tr>
			<tr> 
				<td>ani</td>
				<td><input type="text" name="age" value="<?php echo $ani;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
