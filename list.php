<?php
// Start the session
session_start();

$conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);;
if ($conn->connect_error) {
	die("<h3>Connection failed: " . $conn->connect_error."</h3>");
}

?>

<html>
<head>
<title>Delete</title>
</head>
<body>
<h2>List all employees and sort by:</h2>


<form name="select" method="post" action="list.php" >

	<select name ="sort">
		<option>Select</option>
		<option value='ssn'>SSN</option>
		<option value='fname'>First Name</option>
		<option value='lname'>Last Name</option>
		<option value='dno'>Dept No.</option>
	</select>

	<input type="submit" name="list" value="List" />
	
</form>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// retrieve all variables
	$tbl_name = "employee";
	$sort = $_POST["sort"];

	$sql = "SELECT fname, minit, lname, ssn, bdate, address, sex, salary, superssn, dno FROM $tbl_name ORDER BY $sort ASC";
	// ORDER BY $sort ASC

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	echo "<table style='border: solid 1px black;'><tr><th>First Name</th><th>Middle Initial</th><th>Last Name</th><th>SSN</th><th>Birth Date</th><th>Address</th><th>Sex</th><th>Salary</th><th>Supervisor SSN</th><th>Department Number</th></tr>";
		while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td style='border:1px solid black;'>".$row["fname"]."</td>
		<td style='border:1px solid black;'>".$row["minit"]."</td>
		<td style='border:1px solid black;'>".$row["lname"]."</td>
		<td style='border:1px solid black;'>".$row["ssn"]."</td>
		<td style='border:1px solid black;'>".$row["bdate"]."</td>
		<td style='border:1px solid black;'>".$row["address"]."</td>
		<td style='border:1px solid black;'>".$row["sex"]."</td>
		<td style='border:1px solid black;'>".$row["salary"]."</td>
		<td style='border:1px solid black;'>".$row["superssn"]."</td>
		<td style='border:1px solid black;'>".$row["dno"]."</td>
		</tr>";
		}
	}
}

?>


