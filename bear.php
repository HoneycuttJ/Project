<?php
session_start();
if(($_SESSION['team'] !="bears"))
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
  
    <link rel="stylesheet" href="mystyles.css" />
	<script type="text/javascript" src="script.js"></script>
  
  </head>
  <?php include ("db_connection.php"); ?>
  
  
  <body bgcolor="#fff">
    <br><br><br>
  
    <img src="MainLogo.jpg" alt="TIPOFF Logo" style="width:400px;height:175px;" class="img2">
  
  
  
    <ul>
    </ul>
    <p align="center"> Welcome to TIPOFF - youth sports for the future!
    <p>
  
  
    <table align="center">
      <tr>
        <td align="center">
          <a href="javascript:void(0)" onclick="popupfunction('1')" class=li>
            <img src="Bear.jpg" alt="Bear" style="width:200;height:300px" />
        </td>
        </a>
        </td>
      </tr>
      <tr>
        <td>The Bears</td>
      </tr>
    </table>
  
  
    <div id="popup1" class="white_content">
    <p align=center><br><br>
      <img src="teamphoto.jpeg" width=70% /><br><br><br><br>
      <a href="javascript:void(0)" onclick="popupclose('1')" class=linktext>Close Window</a>
      <a href="javascript:void(0)" onclick="popupfunction('4')" class=linktext>Schedule</a>
      <a href="javascript:void(0)" onclick="popupfunction('5')" class=linktext>Stats</a>
	  <a href="javascript:void(0)" onclick="popupfunction('12')" class=linktext>Roster</a>
	  <a href="javascript:void(0)" onclick="popupfunction('15')" class=linktext>Add Player</a>	  
	  <a href="javascript:void(0)" onclick="popupfunction('16')" class=linktext>Edit Team Stats</a>
	  <a href="javascript:void(0)" onclick="popupfunction('17')" class=linktext>Edit Player Stats</a>	  
		  

    </p>
  
    </div>
  
    <div id="popup4" class="white_content">
         <?php
		$sql = "SELECT * FROM schedule_tab WHERE team = 'bears'";
		$result = $conn->query($sql);
    ?>
    <p align="center"><br><br>The Bears' Schedule<br><br>
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
    <a href="javascript:void(0)" onclick="backToTeam('4')" class="linktext">Back to Team</a>
    </p>
  </div>


  <div id="popup5" class="white_content">
    <?php
		$sql = "SELECT * FROM stats_tab WHERE team = 'bears'";
		$result = $conn->query($sql);
		$player_stats_sql = "SELECT name, ppg, rpg, apg, spg, bpg, topg, fg, 3fg, ft FROM roster_tab WHERE team = 'bears'";
		$player_stats_result = $conn->query($player_stats_sql);
    ?>
    <p align="center"><br><br>The Bears' Stats<br><br>
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
        </table>
        <a href="javascript:void(0)" onclick="backToTeam('5')" class="linktext">Back to Team</a>
    </p>
	</div>
	
	<div id="popup12" class="white_content">
    <?php
		$sql = "SELECT * FROM roster_tab WHERE team = 'bears'";
		$result = $conn->query($sql);
    ?>
    <p align="center"><br><br>The Bears' Roster<br><br>
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
        </table>
        <a href="javascript:void(0)" onclick="backToTeam('12')" class="linktext">Back to Team</a>
    </p>
	</div>
	
<div id="popup15" class="white_content">
    <h1>Add Player</h1>
     <form id="addPlayerForm" action="add_player_process.php" method="post">
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
		<div class="mb-3"
            <label for="postion" class="form-label">Position</label>
            <input type="text" class="form-control" id="pos" name="pos" required>
        </div>
        <button type="submit" class="linktext">Submit</button>
		<a href="javascript:void(0)" onclick="backToTeam('15')" class="linktext">Back to Team</a>
		<div id="message"></div>
    </form>
</div>
  <div id="fade2" class="black_content"></div>  
    </center>
  </body>
  </html>
<?php 
} 
?>
