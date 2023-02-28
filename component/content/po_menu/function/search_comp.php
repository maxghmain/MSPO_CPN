<?php

$servername = "localhost";
$username = "root";
$password = "P@ssw0rd";
$dbname = "mspo_db";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT * FROM comp_contect_tbl WHERE comp_contect_name like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["comp_contect_name"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>