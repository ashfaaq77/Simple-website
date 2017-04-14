<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/tables.css" />
		<link rel="stylesheet" type="text/css" href="css/modcd.css" />
	</head>
	<body>
		<br><br>
		<div id = "del">
		<form method = "get">
		Old Name: <input type = text name = "nchange"/><br><br>
		<div id= "txt"> New name and id </div><br>
		cdID  : <input type = NUMBERS name = "cdid"/><br>
		artID : <input type = NUMBERS name = "artid"/><br>
		Title: <input type = text name = "title"/><br>
		Price: <input type = NUMBERS name = "price"/><br>
		Genre <input type = text name = "genre"/><br><br>
			  <input type = "submit" id = "de" value = "Modify"/>
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
				
			if (isset($_GET["nchange"]) && isset($_GET["title"])) {
    			$stmt = $conn->prepare("UPDATE cd SET cdID = ".$_GET["cdid"].",artID = ".$_GET["artid"].",cdTitle = '".$_GET["title"]."',cdPrice = ".$_GET["price"].", cdGenre = '".$_GET["genre"]."' WHERE cdTitle = '".$_GET["nchange"]."'");
    			$stmt->execute();
			}

		?>
		<div id = "deltab">
		<?php
				
    			$sql = "SELECT cdID, artID, cdTitle, cdPrice, cdGenre FROM cd";
    			
    		
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
		<br><br>
	</body>
</html>