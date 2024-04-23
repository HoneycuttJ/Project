<?php
session_start();
if(($_SESSION['team'] !="lions"))
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
    <h2> The Lions </h2>
  
  
  
    <ul>
    </ul>
    <p align="center"> Welcome to TIPOFF - youth sports for the future!
    <p>
  
  
    <table align="center">
      <tr>
        <td>
          <a href="javascript:void(0)" onclick="popupfunction('3')" class=li>
            <img src="Lion.jpg" alt="Lion" style="width:200;height:300px">
          </a>
        </td>
      </tr>
      <tr>
        <td>The Lions</td>
      </tr>
    </table>
  
  
<div id="popup3" class="white_content">
    <p align=center><br><br>
      <img src="teamphoto2.jpeg" width=70% /><br><br><br><br>
      <a href="javascript:void(0)" onclick="popupclose('3')" class=linktext>Close Window</a>
      <a href="javascript:void(0)" onclick="popupfunction('9')" class=linktext>Schedule</a>
      <a href="javascript:void(0)" onclick="popupfunction('10')" class=linktext>Stats</a>
	  <a href="javascript:void(0)" onclick="popupfunction('14')" class=linktext>Roster</a>
    </p>

  </div>
  
  <div id="popup9" class="white_content">
     <?php
		$sql = "SELECT * FROM schedule_tab WHERE team = 'lions'";
		$result = $conn->query($sql);
    ?>
    <p align="center"><br><br>The Lions' Schedule<br><br>
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
    <a href="javascript:void(0)" onclick="backToTeam('9')" class="linktext">Back to Team</a>
    </p>
  </div>

  <div id="popup10" class="white_content">
        <?php
		$sql = "SELECT * FROM stats_tab WHERE team = 'lions'";
		$result = $conn->query($sql);
		$player_stats_sql = "SELECT name, ppg, rpg, apg, spg, bpg, topg, fg, 3fg, ft FROM roster_tab WHERE team = 'lions'";
		$player_stats_result = $conn->query($player_stats_sql);
    ?>
    <p align="center"><br><br>The Lions' Stats<br><br>
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
    <a href="javascript:void(0)" onclick="backToTeam('10')" class="linktext">Back to Team</a>
    </p>
  </div>
  
  <div id="popup14" class="white_content">
    <?php
		$sql = "SELECT * FROM roster_tab WHERE team = 'lions'";
		$result = $conn->query($sql);
    ?>
    <p align="center"><br><br>The Lions' Roster<br><br>
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
        <a href="javascript:void(0)" onclick="backToTeam('14')" class="linktext">Back to Team</a>
    </p>
	</div>
  
  <div id="fade2" class="black_content"></div>  
    </center>
  </body>
  </html>
<?php 
} 
?>