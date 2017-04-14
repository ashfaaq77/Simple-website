<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/tables.css" />
		<link rel="stylesheet" type="text/css" href="css/cd.css" />
	</head>
	<body>
		<div id = "title">
			<h1 id = "head"> CD database </h1>
			<div id = "nav">
				<ul>
					<li><a href = "form.php">Home</a></li>
					<li><a href = "Artist.php">Artist</a></li>
					<li><a href = "cd.php">CD</a></li>
				</ul>
			</div>
		</div>
		<div id = "button">
		<div id = "search">
			<form method="get">
    			Name: <input type="text" name="name"/>
				<input type="submit" id = "se" value = "Search"/>
			</form>
		</div>
		
		<div id = "Del">
			<form ACTION = "deleteCD.php" method="get">
				<input type="submit" id = "del" value = "Delete"/>
			</form>
		</div>
		
		<div id = "search">
			<form ACTION = "insertCD.php" method = "get">
				<input type = "submit" id = "ins" value = "Insert"/>
			</form>	
		</div>
		
		<div id = "modify">
		<form ACTION = "modifyCD.php" method = "get">
			<input type = "submit" id = "mod" value = "Modify" />
		</form>
		</div>
		</div>
		<div id = "ser">	
		<?php
			$servername = "localhost";
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
	
	
    		$stmt = $conn->prepare("SELECT cdID,artID,cdTitle,cdPrice,cdGenre FROM cd WHERE cdTitle LIKE '%".$name."%';");

    		$stmt->execute();
			$stmt->bind_result($cdid,$artid, $name, $price, $genre);
			 echo "<table><tr><th>cdID</th><th>artID</th><th>Title</th><th>Price</th><th>Genre</th></tr>";
			while ($stmt->fetch()) {

   		 echo "<tr><td>" . "$cdid". "</td><td>" . "$artid" . "</td><td>" . "$name" . "</td><td>" . "$price" . "</td><td>" . "$genre" ."</td></tr>";
			}
			echo "</table>";
				?>		
		</div>
		<br><br>
		
	
	</body>

</html>