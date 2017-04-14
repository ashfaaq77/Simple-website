<!DOCTYPE html>
<html>
	<head>
		<head>
		<link rel="stylesheet" type="text/css" href="css/tables.css" />
		<link rel="stylesheet" type="text/css" href="css/modifyart.css" />
	</head>
	</head>
	<body>
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
		?>
		
		<div id = "del">
		<form method = "get">
		 Name to search: <input type = text name = "nchange"/><br><br>
		<div id= "txt"> New name and id </div><br>
		Name : <input type = text name = "name"/><br>
		ID   : <input type = NUMBERS name = "id"/><br><br>
			 <input type = "submit" id = "de" value = "Modify name"/>
			
		<?php	
				
    			$stmt = $conn->prepare("UPDATE Artist SET artName = '".$_GET["name"]."' WHERE artName = '".$_GET["nchange"]."'");
    			$stmt->execute();
		?>
		
		</form>
		</div>
	
		
		<div id = "back">
		<form ACTION = "artist.php" method = "get">
			<input type = "submit" id = "ba" value = "Back"/>
		<form>
		</div>
		<br>
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