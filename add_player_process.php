<?php
session_start();

include("db_connection.php");


$team = $_SESSION['team'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $grade = $_POST['grade'];
    $ppg = $_POST['ppg'];
    $rpg = $_POST['rpg'];
    $apg = $_POST['apg'];
    $spg = $_POST['spg'];
    $bpg = $_POST['bpg'];
    $topg = $_POST['topg'];
    $fg = $_POST['fg'];
    $threefg = $_POST['3fg'];
    $ft = $_POST['ft'];
	$pos = $_POST['pos'];


    
	$sql = "INSERT INTO roster_tab (team, name, height, weight, grade, ppg, rpg, apg, spg, bpg, topg, fg, 3fg, ft, position) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssissssssssss", $team, $name, $height, $weight, $grade, $ppg, $rpg, $apg, $spg, $bpg, $topg, $fg, $threefg, $ft, $pos);


    if ($stmt->execute()) {

        echo "Player added successfully!";
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $stmt->close();
    $conn->close();
}
?>