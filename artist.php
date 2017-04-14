<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/tables.css" />
		<link rel="stylesheet" type="text/css" href="css/artist.css" />
	</head>
	
	<body>
		<div id = "title" > 
			<h1 id = "head"> Artist Database </h1>
			<div id = "nav">
				<ul id = "list">
					<li><a href = "form.php">Home</a></li>
					<li><a href = "Artist.php">Artist</a></li>
					<li><a href = "cd.php">CD</a></li>
				</ul>
			</div>
		</div>
		
		<div id = "button">
		<form  method="get">
    	Name: <input type="text" name="name"/> 
    	  <input type="submit" id = "se" value = "Search"/> 
		</form>
		<br>
			<div id = "ser">
			<?php
    	  		$servername = "localhost";
				$username = "root";
				$password = "mysql";
				$dbname = "Lab3";
	
				$name = $_GET['name'];
	
				//create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				//check connection
				if($conn -> connect_error){
					die("Connection failed: " . $conn->connect_error);
				}
	
				
    			$stmt = $conn->prepare("SELECT artID, artName FROM Artist WHERE artName LIKE '%".$name."%';");
   				$stmt->execute();
				$stmt->bind_result($id, $name);
	 			echo "<table><tr><th>ID</th><th>Name</th></tr>";
				while ($stmt->fetch()) {

   				 echo "<tr><td>" . "$id". "</td><td>" . "$name" . "</td></tr>";
				}
				echo "</table>";
    
    
     			mysqli_close($conn);
    	  		?>
    	  		</div>
			<br>
		<form ACTION = "deleteART.php"  method = "get">
	      <input type = "submit" id = "del" value = "Delete" /> 
		</form>
			
		<form ACTION = "InsertART.php"  method = "get">
		 <input type = "submit" id = "ins" value = "Insert"  /> 
		</form>

		<form ACTION = "modifyART.php"  method = "get">
			<input type = "submit" id = "mod" value = "Modify" /> 
		</form>
		</div>
		
		<br>
	</body>
	
</html>