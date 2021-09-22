<?php
// Start the session
session_start();
?>

<?php

$conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);;
if ($conn->connect_error) {
	die("<h3>Connection failed: " . $conn->connect_error."</h3>");
}

//select menu

$sql = "SELECT ssn FROM employee";
$result = $conn->query($sql);

?>

<html>
<head>
<title>Delete</title>
</head>
<body>
<h2>Enter or Select SSN to delete an employee:</h2>


<form name="delform" method="post" action="delete.php" >
<table width="60%" border="0" cellpadding="3" cellspacing="12">
	<tr>
	<td>Enter SSN#:</td>
	<td><input name="ssn" type="text" size="11" maxlength="10" /></td>
	<td><input type="submit" name="delete" value="Delete" /></td>
	</tr>

	<tr>
	<td width="10">Select SSN#:</td>
	<td>
		<select name ="ssn">
			<option>Select</option>
			<?php 
				while($row = $result->fetch_assoc()){
					$ssn = $row['ssn'];
					echo "<option value=$ssn>$ssn</option>";
				}
			?>
		</select>
	</td>
	<td><input type="submit" name="delete" value="Delete" /></td>
	</tr>
</table>
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// retrieve all variables
	$tbl_name = "employee";
	$ssn = $_POST["ssn"];

	$sql="delete from $tbl_name where ssn=$ssn;";

	echo $ssn;

	if ($conn->query($sql) === TRUE) {
		echo "<h3>Record deleted</h3>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

}



$conn->close();
?>







