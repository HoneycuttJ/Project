<?php
session_start();
if(($_SESSION['team'] !="eagles"))
{
  echo "You are trying to access a BAD Page.";
  session_destroy();
}else
{
include("db_connection.php");
  ?>
  <!DOCTYPE html>
  <html>
  
  <head>
    <title>TIPOFF</title>
  
    <link rel="stylesheet" href="mystyles2.css" />
    <script type="text/javascript" src="script.js"></script>
  
  </head>
  <?php include ("db_connection.php"); ?>
  
  
  <body bgcolor="#fff">
    <br><br><br>
  
       <img src="Basketball.jpg" alt="TIPOFF Logo" style="width:400px;height:200px;" class="img2">
  
  
  
    <ul>
    </ul>

  
  
    <table align="center">
      <tr>
  
        <td>
          <a href="javascript:void(0)" onclick="popupfunction('2')" class=li>
            <img src="Eagle1.jpg" alt="Eagle" style="width:200;height:300px">
          </a>
        </td>
      </tr>
    </table>
  
  
  <div id="popup2" class="white_content">
    <p align=center>
      <img src="eaglelogo.jpg" width="30%" style="margin-bottom: 50px; margin-top: 10px"/>
      <img src="teamphoto1.jpeg" width="70%" style="margin-top: 5px;"/>
	  <br>
      <a href="javascript:void(0)" onclick="popupclose('2')" class=linktext>Close Window</a>
      <a href="javascript:void(0)" onclick="popupfunction('7')" class=linktext>Schedule</a>
      <a href="javascript:void(0)" onclick="popupfunction('8')" class=linktext>Stats</a>
      <a href="javascript:void(0)" onclick="popupfunction('13')" class=linktext>Roster</a>
	  <a href="javascript:void(0)" onclick="popupfunction('15')" class=linktext>Add Player</a>
	  <a href="javascript:void(0)" onclick="popupfunction('16')" class=linktext>Edit Team Stats</a><br>
	  <br><a href="javascript:void(0)" onclick="popupfunction('17')" class=linktext>Edit Player Stats</a>	
    </p>

  </div>
  
  <div id="popup7" class="white_content">
    <?php
		$sql = "SELECT * FROM schedule_tab WHERE team = 'eagles'";
		$result = $conn->query($sql);
    ?>
	<img src="eaglelogo.jpg" width="30%" style="margin-bottom: -20px;"/>
    <p style="font-family: Arial Black; color: #343551; text-align: center;"><br>Schedule<br></p>

    <table border="1" style="margin: 0 auto;">
      <tr>
        <th>Opponent</th>
        <th>Game Date</th>
        <th>Location</th>
      </tr>
      <?php
            while ($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo '<td>' . $row['opp'] . '</td>';
				echo '<td>' . $row['location'] . '</td>';
				echo '<td>' . $row['date'] . '</td>';
				echo '</tr>';
			}
            ?>
    </table>
	<br>
    <a href="javascript:void(0)" onclick="backToTeam('7')" class="linktext">Back to Team</a>
    </p>
  </div>

  <div id="popup8" class="white_content">
    <?php
		$sql = "SELECT * FROM stats_tab WHERE team = 'eagles'";
		$result = $conn->query($sql);
		$player_stats_sql = "SELECT name, ppg, rpg, apg, spg, bpg, topg, fg, 3fg, ft FROM roster_tab WHERE team = 'bears'";
		$player_stats_result = $conn->query($player_stats_sql);
    ?>
	<img src="eaglelogo.jpg" width="30%" style="margin-bottom: -20px;"/>
    <p style="font-family: Arial Black; color: #343551; text-align: center;"><br>Stats<br></p>
    <table border="1" style="margin: 0 auto;">
      <tr>
        <th>PPG</th>
        <th>OPPG</th>
        <th>RPG</th>
        <th>APG</th>
        <th>FG%</th>
        <th>3ptFG%</th>
        <th>FT%</th>
        <th>Diff.</th>
      </tr>
      <?php
            while ($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo '<td>' . $row['ppg'] . '</td>';
				echo '<td>' . $row['oppg'] . '</td>';
				echo '<td>' . $row['rpg'] . '</td>';
				echo '<td>' . $row['apg'] . '</td>';
				echo '<td>' . $row['fg'] . '</td>';
				echo '<td>' . $row['3fg'] . '</td>';
				echo '<td>' . $row['fg'] . '</td>';
				echo '<td>' . $row['diff'] . '</td>';
				echo '</tr>';
			}
            ?>
    </table>
    <br>
    <br>
    <table border="1" style="margin: 0 auto;">
      <tr>
        <th>Name</th>
        <th>PPG</th>
        <th>RPG</th>
        <th>APG</th>
        <th>SPG</th>
        <th>BPG</th>
        <th>TO/G</th>
        <th>FG%</th>
        <th>3ptFG%</th>
        <th>FT%</th>
      </tr>
      <?php
            while ($player_row = $player_stats_result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $player_row['name'] . '</td>';
                echo '<td>' . $player_row['ppg'] . '</td>';
                echo '<td>' . $player_row['rpg'] . '</td>';
                echo '<td>' . $player_row['apg'] . '</td>';
                echo '<td>' . $player_row['spg'] . '</td>';
                echo '<td>' . $player_row['bpg'] . '</td>';
                echo '<td>' . $player_row['topg'] . '</td>';
                echo '<td>' . $player_row['fg'] . '</td>';
                echo '<td>' . $player_row['3fg'] . '</td>';
                echo '<td>' . $player_row['ft'] . '</td>';
                echo '</tr>';
            }
            ?>
    </table><br>
    <a href="javascript:void(0)" onclick="backToTeam('8')" class="linktext">Back to Team</a>
    </p>
  </div>

  <div id="popup13" class="white_content">
    <?php
		$sql = "SELECT * FROM roster_tab WHERE team = 'eagles'";
		$result = $conn->query($sql);
    ?>
	<img src="eaglelogo.jpg" width="30%" style="margin-bottom: -20px;"/>
    <p style="font-family: Arial Black; color: #343551; text-align: center;"><br>Roster<br>
    <table border="1" style="margin: 0 auto;">
      <tr>
        <th>Player</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Grade</th>
        <th>Position</th>
      </tr>
      <?php
            while ($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>' . $row['height'] . '</td>';
				echo '<td>' . $row['weight'] . '</td>';
				echo '<td>' . $row['grade'] . '</td>';
				echo '<td>' . $row['position'] . '</td>';
				echo '</tr>';
			}
            ?>
    </table><br>
    <a href="javascript:void(0)" onclick="backToTeam('13')" class="linktext">Back to Team</a>
    </p>
  </div>
	<div id="popup15" class="white_content">
    <h1>Add Player</h1>
     <form id="addPlayerForm" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Height</label>
            <input type="text" class="form-control" id="height" name="height" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight" required>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Position</label>
            <input type="text" class="form-control" id="pos" name="pos" required>
        </div>
        <button type="submit" name="add_player" class="linktext">Submit</button>
		<a href="javascript:void(0)" onclick="backToTeam('15')" class="linktext">Back to Team</a>
		<div id="message"></div>
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_player"])) {

        $team = $_SESSION['team'];
        $name = $_POST['name'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $grade = $_POST['grade'];
        $pos = $_POST['pos'];
		
        $sql = "INSERT INTO roster_tab (team, name, height, weight, grade, position) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssiss", $team, $name, $height, $weight, $grade, $pos);

        $stmt->execute();

        $stmt->close();

    }
}
?>
    </form>
</div>
<div id="popup16" class="white_content">
    <h1>Enter New Stats</h1>
     <form id="editTeamStats" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Points Per Game</label>
            <input type="text" class="form-control" id="ppg" name="ppg" required>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Opponents Points Per Game</label>
            <input type="text" class="form-control" id="oppg" name="oppg" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Rebounds Per Game</label>
            <input type="text" class="form-control" id="rpg" name="rpg" required>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Assists Per Game</label>
            <input type="text" class="form-control" id="apg" name="apg" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Field Goal%</label>
            <input type="text" class="form-control" id="fg" name="fg" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Three-Point%</label>
            <input type="text" class="form-control" id="3pt" name="3pt" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Free Throw%</label>
            <input type="text" class="form-control" id="ft" name="ft" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Point Differential</label>
            <input type="text" class="form-control" id="dif" name="dif" required>
        </div>		
        <button type="submit" name="editTeamStats" class="linktext">Submit</button>
		<a href="javascript:void(0)" onclick="backToTeam('16')" class="linktext">Back to Team</a>
		<div id="message"></div>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editTeamStats"])) {

        $team = $_SESSION['team'];
        $ppg = $_POST['ppg'];
        $oppg = $_POST['oppg'];
        $rpg = $_POST['rpg'];
        $apg = $_POST['apg'];
        $fg = $_POST['fg'];
        $tpt = $_POST['3pt'];
        $ft = $_POST['ft'];
        $dif = $_POST['dif'];
        

        $sql = "UPDATE stats_tab 
                SET ppg=?, oppg=?, rpg=?, apg=?, fg=?, 3fg=?, ft=?, diff=? 
                WHERE team='eagles'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ddddddds", $ppg, $oppg, $rpg, $apg, $fg, $tpt, $ft, $dif);


        $stmt->execute();


        $stmt->close();
    }
?>
</div>
<div id="popup17" class="white_content">
    <h1>Enter Player Stats</h1>
     <form id="editPlayerStats" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Player Name<label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Points Per Game</label>
            <input type="text" class="form-control" id="ppg" name="ppg" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Rebounds Per Game</label>
            <input type="text" class="form-control" id="rpg" name="rpg" required>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Assists Per Game</label>
            <input type="text" class="form-control" id="apg" name="apg" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Steals Per Game</label>
            <input type="text" class="form-control" id="spg" name="spg" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Blocks Per  Game</label>
            <input type="text" class="form-control" id="bpg" name="bpg" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Turnovers Per Game</label>
            <input type="text" class="form-control" id="topg" name="topg" required>
        </div>				
		<div class="mb-3">
            <label for="postion" class="form-label">Field Goal%</label>
            <input type="text" class="form-control" id="fg" name="fg" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Three-Point%</label>
            <input type="text" class="form-control" id="3pt" name="3pt" required>
        </div>
		<div class="mb-3">
            <label for="postion" class="form-label">Free Throw%</label>
            <input type="text" class="form-control" id="ft" name="ft" required>
        </div>
        <button type="submit" name="editPlayerStats" class="linktext">Submit</button>
		<a href="javascript:void(0)" onclick="backToTeam('17')" class="linktext">Back to Team</a>
		<div id="message"></div>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editPlayerStats"])) {

        $team = $_SESSION['team'];
        $name = $_POST['name'];
        $ppg = $_POST['ppg'];
        $rpg = $_POST['rpg'];
        $apg = $_POST['apg'];
        $spg = $_POST['spg'];
        $bpg = $_POST['bpg'];
        $topg = $_POST['topg'];
        $fg = $_POST['fg'];
        $tpt = $_POST['3pt'];
        $ft = $_POST['ft'];

        $sql = "UPDATE roster_tab 
                SET ppg=?, rpg=?, apg=?, spg=?, bpg=?, topg=?, fg=?, 3fg=?, ft=?
                WHERE team='eagles' AND name=?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ddddddddds", $ppg, $rpg, $apg, $spg, $bpg, $topg, $fg, $tpt, $ft, $name);

        $stmt->execute();

        $stmt->close();
    }
?>

    </form>
</div>
	<div id="fade2" class="black_content"></div>
	  <ul>
    <br>
    Website By: John Honeycutt and Megan Lavender
  </ul>
    </center>
  </body>
  
  </html>
