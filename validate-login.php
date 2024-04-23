<?php

  session_start();

include("db_connection.php");
 

$id = $_POST['u'];

$pwd = $_POST['p'];

 

$_SESSION['id']=$id;

    $_SESSION['pwd']=$pwd;

 

	$sql = "SELECT * FROM coach_tab WHERE email = ? AND pwd = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss", $id, $pwd);
	$stmt->execute();
	$result = $stmt->get_result();


    if ($result->num_rows == 1) {
		$row_users = $result->fetch_assoc();
		$role = $row_users['team'];

		$_SESSION['team'] = $role;
		
		switch ($role) {
            case 'bears':
                header("Location: bear.php");
                break;
            case 'eagles':
                header("Location: eagle.php");
                break;
            case 'lions':
				header("Location: lion.php");
                break;
		}

    }
	else  {

        echo("Invalid Login");
	}
 

?>