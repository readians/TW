<?php session_start();?>
<!doctype html>
<html>
<head>
<link href="info.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("input").keyup(function(){
		var user = document.getElementById("input").value;
		$("#result").load("searchUser.php?u="+user);
	});
});
</script>
</head>

<body>
	<?php
	$servername = "localhost";
	$username = "ms_0124000608";
	$password = "2851";
	$dbname= "ms1_0124000608";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$user = $_SESSION["myusername"];
	$start = date("Y-m-d H:i:s");
	
	$sql = "DELETE FROM AuleLib WHERE time_to_sec(timediff('$start',updated))/3600 > 2;";
	$result = $conn->query($sql);
	
	$sql = "SELECT COUNT(*) AS cont,aula FROM AuleLib GROUP BY aula";
	$result = $conn->query($sql); 
    ?>
    <div align="center" width="50%">Search user:
    	<input type="text" name="searchuser" id="input" onKeyPress="searchUser()" width="100%">
    	<div id="result" width="100%" style="background-color:rgba(255,255,255,1.00)"></div>
    </div>
	<div>
	<p><b>Hi, this is parthelp<?php if(isset($_SESSION["myusername"]))echo ", ".$_SESSION["myusername"];?>.</b></p>
	On this forum you can find help to your problem. <br>
	In <b>Info</b> section you can find the information about a course, or a university information, or other.<br>
	In <b>Ads</b> section you can find the Ad of private lesson, or university soccer tournament, or other.<br>
	In <b>Subject</b> section you can find help to your problem in everything course (of the CdL Computer Science [for the time being]).<br>
	In the end, you can exchanges <b>messages</b> with every users of the forum. You can find him with the live search bar!<br>
	
	<h2>HAVE FUN, BUT BE SERIOUS!</h2> <br>
	</div>
    <hr>
    <div>
    <table class="freerooms">
    <th><h2>Free rooms:</h2></th>
    <?php
		if($result->num_rows>0)
			while($row=$result->fetch_assoc()){
				echo "<tr><td>".$row['cont']." users said that room ".$row['aula']." it's free.</td></tr>";
				}
		if(isset($_SESSION["myusername"])){
			echo "<tr><td>";
			echo '<form action="home.php" method="post">Signal free room: <select name="aule">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					</select><input type="submit" value="Signal" name="segnala"><input type="submit" value="Delete" name="delete">
					</form>';
			echo "</td></tr>";
		}
		if(isset($_POST['aule'])){
			$aula = $_POST['aule'];
			if(isset($_POST['segnala']))
				$sql = "INSERT INTO AuleLib(username,aula,updated) VALUES('$user','$aula','$start') ";
			if(isset($_POST['delete']))
				$sql = "DELETE FROM AuleLib WHERE username='$user' AND aula='$aula'";
			if($conn->query($sql))
				echo "<tr><td>Signal performed</td></tr>";
			else
				echo "<tr><td>Maybe you've already signaled this room recently</td></tr>";
		}
	?>
    </table>
    </div>
    <hr>
</body>
</html>
