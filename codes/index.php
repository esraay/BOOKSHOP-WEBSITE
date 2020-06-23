<html>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<input type="submit" id="back" name="create" id="create" value="CREATE DATABASE TO CONTINUE">
<?php
	  if(isset($_POST["create"])){
		$link = mysqli_connect("localhost", "root", "");

		$sql = "CREATE DATABASE books";
		if(mysqli_query($link, $sql)){
			echo "Database created successfully";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}

		mysqli_close($link);
		$conn = new mysqli("localhost", "root", "", "books");
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		// sql to create table
		$sql = "CREATE TABLE user_infos (
		ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		NAME VARCHAR(30) NOT NULL,
		EMAIL VARCHAR(50),
		PASSWORD VARCHAR(30) NOT NULL,
		AGE INT(50),
		GENDER VARCHAR(10)
		)";

		if ($conn->query($sql) === TRUE) {
		  echo "Table user_infos created successfully";
		} else {
		  echo "Error creating table: " . $conn->error;
		}
		$sql = "INSERT INTO user_infos (name, email, password, age, gender)
		VALUES ('admin', 'admin@admin', 'admin',20,'Male'),
			   ('user', 'user@user', 'user',20,'Male')";
		
		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$sql_orders = "CREATE TABLE orders (
			ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			NAME VARCHAR(30),
			ADRESS VARCHAR(50),
			CARDNO VARCHAR(11),
			COST INT(6)
			)";
	
			if ($conn->query($sql_orders) === TRUE) {
			  echo "Table user_infos created successfully";
			} else {
			  echo "Error creating table: " . $conn->error;
			}

		
		// sql to create table
		$sql1= "CREATE TABLE books (
		ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		NAME VARCHAR(30) NOT NULL,
		WRITER VARCHAR(10),
		GENRE VARCHAR(30) NOT NULL,
		DESCRIPTION VARCHAR(100),
		PRICE INT(50),
		IMAGE LONGBLOB
		)";
		if($conn->query($sql1)=== TRUE) {
		  echo "Table book_infos created successfully";
		} else {
		  echo "Error creating table: " . $conn->error;
		}
		$sql = "INSERT INTO books (name, writer, genre,description, price, image)
		VALUES ('DEAR EDWARD', 'Ann Napolitano','NOVEL','Story of a 12-year-old boy who is the sole survivor of a plane crash that kills all of the other 191 passengers..',23,'Dear_Edward.jpg'),
			   ('THE DRIFT WOOD GIRLS', 'Mark Douglas','NOVEL','Two missing women. Two decades apart. A gripping and atmospheric mystery that journeys from the dramatic lochs of Scotland to the icy depths of the North Sea..',24,'The_Drift_Wood_Girls.jpg'),
			   ('RED AT BONE', 'JacQueline Woodson','NOVEL','Centers on two black families who come together when a girl and a boy in high school..',26,'Red_At_Bone.jpg'),
			   ('SEVEN ENDLESS FORESTS', 'April Genevieve Tucholke','STORY','Torvi and Morgunn must learn to survive on their own after a devastating plague sweeps through their steading..',34,'The_Seven_Endless_Forests.jpg')";

		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
		 header('Location: register.php');
			  }
			 
		?>
</html>