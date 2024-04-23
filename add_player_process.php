<?php
session_start();

include("db_connection.php");


$team = $_SESSION['team'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $grade = $_POST['grade'];
	$pos = $_POST['pos'];


    
	$sql = "INSERT INTO roster_tab (team, name, height, weight, grade, position) 
            VALUES (?, ?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiss", $team, $name, $height, $weight, $grade, $pos);


    $stmt->close();
    $conn->close();
}
?>
