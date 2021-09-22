<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost:3306";
$username = "root";
$password = "admin";
$dbname = "company";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fname, lname, ssn, salary FROM employee WHERE dno=8";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table style='border: solid 1px black;'><tr><th>First Name</th><th>Last Name</th><th>SSN</th><th>Salary</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<br> First Name: ". $row["fname"]. " Last Name: ". $row["lname"]. "SSN: " . $row["ssn"] . "Salary: ".$row["salary"]."<br>";
		//echo "<tr><td style='border:1px solid black;'>".$row["fname"]."</td><td style='border:1px solid black;'>".$row["lname"]."</td><td style='border:1px solid black;'>".$row["ssn"]."<td style='border:1px solid black;'>".$row["salary"]."</td></tr>";
		echo "<tr><td style='border:1px solid black;'>".$row["fname"]."</td><td style='border:1px solid black;'>".$row["lname"]."</td><td style='border:1px solid black;'>".$row["ssn"]."<td style='border:1px solid black;'>".$row["salary"]."</td></tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>