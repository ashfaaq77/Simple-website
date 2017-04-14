<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/tables.css" />
	<link rel="stylesheet" type="text/css" href="css/deleteart.css" />
	</head>
	<body>
		<br>
		<div id = "del">
			<form method = "get">
				Name: <input type = text name = "nameart"/><br>
					<input type = "submit" id = "de" value = "delete"/>
			</form>
		</div>
		
		<div id = "back">
		<form ACTION = "artist.php" method = "get">
			<input type = "submit" id="ba" value = "Back"/>
		<form>
		</div>
		<br>
		
		<?php
	
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$dbname = "Lab3";
	
			//create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			//check connection
			if($conn -> connect_error){
				die("Connection failed: " . $conn->connect_error);
			}
	
			if (isset($_GET["nameart"])) {
    		$stmt = $conn->prepare("DELETE FROM Artist WHERE artName='" . $_GET["nameart"] . "';");
    		$stmt->execute();
			}

		?>
		
		<div id = "deltab">
			<?php
			
    			$sql = "SELECT artID, artName FROM Artist";
    			
			    $result = $conn->query($sql);

			if ($result->num_rows > 0) {
     			echo "<table><tr><th>ID</th><th>Name</th></tr>";
    			 // output data of each row
    			while($row = $result->fetch_assoc()) {
        			 echo "<tr><td>" . $row["artID"]. "</td><td>" . $row["artName"]."</td></tr>";
    			}
     				echo "</table>";
				} else {
     				echo "0 results";
				}
				
    
    		 mysqli_close($conn);
		?>		
	
		</div>

	</body>
</html>
