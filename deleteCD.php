<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/tables.css" />
	<link rel="stylesheet" type="text/css" href="css/delcd.css" />
	</head>
	<body>
	<br><br>
		
		<div id = "del">
			<form method = "get">
				Name: <input type = text name = "name"/><br><br>
					<input type = "submit" id = "de" value = "delete"/>
			</form>
		</div>
		
		<div id = "back">
		<form ACTION = "cd.php" method = "get">
			<input type = "submit" id = "ba" value = "Back"/>
		<form>
		</div>
		
		
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
	
			if (isset($_GET["name"])) {
    		$stmt = $conn->prepare("DELETE FROM cd WHERE cdTitle='" . $_GET["name"] . "';");
    		$stmt->execute();
			}

		?>
		<br>
		<div id = "deltab">
			<?php
			
    			$sql = "SELECT * FROM cd";
    			
			    $result = $conn->query($sql);

			if ($result->num_rows > 0) {
     			echo "<table><tr><th>cdID</th><th>artID</th><th>Title</th><th>Price</th><th>Genre</th></tr>";
    			 // output data of each row
    			while($row = $result->fetch_assoc()) {
        			 echo "<tr><td>" . $row["cdID"]. "</td><td>" . $row["artID"]. "</td><td>" . $row["cdTitle"]. "</td><td>" . $row["cdPrice"]. "</td><td>". $row["cdGenre"]. "</td></tr>";
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
