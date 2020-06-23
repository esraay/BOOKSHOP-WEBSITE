<?php
session_start();
?>	  
<html>
<head>
<link rel="stylesheet" type="text/css" href="../project/project.css">

</head>
<body>&nbsp;&nbsp; <br>
<style>
    body {
		    background-color: #cfcbbf;
    }

</style>
<title>loginpage</title>

<?php
$name="";
$email="";
$age="";
$psw="";
$gender="";
$userpsw="";
$uname="";
$nameErr=$emailErr=$ageErr=$genderErr=$passwordErr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["name"])){
		$nameErr="Name is reqired";
	}else{
		$name=processInput($_POST["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$name)){
			$nameErr="only letters and white space please";
			$name="";
		}
	}
	if(empty($_POST["email"])){
		$emailErr="email is reqired";
	}else{
		$email=processInput($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailErr="invalid";
			$email="";
		}
	}
	if(empty($_POST["age"])){
		$ageErr="";
	}else{
		$age=processInput($_POST["age"]);

		if (!preg_match("/^[0-9]+$/",$age)) {
			$ageErr = "Enter your age as number";
			$age="";
		}
		
	}
	if(empty($_POST["psw"])){
		$passwordErr="password is required";
	}else{
		$psw=processInput($_POST["psw"]);
			if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $psw)) {
				$passwordErr='Password must contain at least 8 characters of upper and lower letters, numbers.';
				$psw="";
			}
	}
	if(empty($_POST["gender"])){
		$genderErr="Gender is required";
	}else{
		if(isset($_POST["gender"])){
			$gender=processInput($_POST["gender"]);
			$gender="";
		}
	}
	if(empty($_POST["uname"])){
		$nameErr="Name is reqired";
	}else{
		$uname=processInput($_POST["uname"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$uname)){
			$uname="";
		}
	}
	
		$userpsw=processInput($_POST["userpsw"]);


}

function processInput($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;

}
?>
<table style="border-radius: 20px;border: solid #cce619 20px; text-align: left; width: 1195px; height: 379px; background-color: white;"align="center" border="1" cellpadding="40" cellspacing="50">
  <tbody>
    <tr align="left">
	
      <td style="border-radius: 20px;color:green;font-weight: bold;font-size: 24px;vertical-align: middle; width: 600px; text-align: center;">REGISTER<br>
      </td>
      <td style="border-radius: 20px;color:green;font-weight: bold;font-size: 24px;vertical-align: middle; width: 600px; text-align: center;">LOGIN<br>
      </td>
    </tr>
    <tr>
      <td style="border-radius: 20px;vertical-align: top; width: 659px; text-align: left;"><br>
      <br>
      <br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
NAME :&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  <input type="text" name="name" value="<?php echo $name?>">
<span class="error">*<?php echo $nameErr; ?></span><br>
      <br>
E-MAIL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="email"value="<?php echo $email?>">
<span class="error">*<?php echo $emailErr; ?></span><br>
      <br>
AGE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  <input name="age"value="<?php echo $age?>">
<span class="error"><?php echo $ageErr; ?></span><br>
      <br>
GENDER: <input type="radio" name="gender" value="male">male
<input type="radio" name="gender" value="female">female
<span class="error">*<?php echo $genderErr; ?></span>
<br>
      <br>
PASSWORD: <input type="password" name="psw"value="<?php echo $psw ?>">
<span class="error">*<?php echo $passwordErr; ?></span>
<br>
      <br>
      <input type="submit" name="submit" value="Submit"class="submit green" style="font-size: 18px;">
	   <?php
	  if(isset($_POST["submit"]) && !($age==0) && !($name=="") && !($email=="") && !($psw=="")){ 

	$servername ="localhost";
	$username = "root";
	$dbname = "books";

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO user_infos (name,email,password,age,gender) VALUES('$name','$email','$psw','$age','$gender')";
		$conn->exec($sql);
		$sql="SELECT * from user_infos";
		$result=$conn->query($sql);
		
		$conn=null;
		header("Refresh: 5; url=register.php");

		echo "<br><br><h3> YOU CAN LOGIN THE PAGE WITH YOUR NAME AND PASSWORD.";


	}catch(PDOException $e){
		echo "connection failed".$e->getMessage();
	}
	}
?>

      <br>
      </td>
      <td style="border-radius: 20px;vertical-align: top; width: 616px; text-align: center; background-color: white;"><br>
      <br>
      <br>

USERNAME:<input name="uname"value="<?php echo $uname ?>"><br>
      <br>
PASSWORD:<input type="password" name="userpsw"value="<?php echo $userpsw ?>"><br><br><br>
<input type="submit" class="submit green" style="font-size: 18px;" name="login" value="LOGIN"><br><br>

		
<?php
	if(isset($_POST["login"]) && !($uname=="") && !($userpsw=="")){ 

	$servername ="localhost";
	$username = "root";
	$dbname = "books";

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connection is Successfull";
		$sql="SELECT * from user_infos";
		$result=$conn->query($sql);
		#echo "result".$result->rowCount();
		while($row=$result->fetch()){
			if($uname==$row['NAME']&& $userpsw==$row['PASSWORD']){
				
				if($row['NAME']=="admin"){
					header('Location: db.php');
				}
				$connection = new PDO ( "mysql:host=$servername; dbname=$dbname", $username );

				if ($connection->query ("DESCRIBE cart"  )) {


				if ($connection->query ("DROP TABLE cart"  )) {

					echo "exist";
					$_SESSION['NAME']=$row['NAME'];
				
				header('Location: bookshop.php');}
					
				
				
			}			
								
				$sql_cart = "CREATE TABLE cart (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					book_id INT(11) NOT NULL,
					quantity INT(11)
					)";
				if ($conn->query($sql_cart) === TRUE) {
					echo "Table user_infos created successfully";
				  } else {
					echo "Error creating table: " . $conn->error;
				  }
			
				$_SESSION['NAME']=$row['NAME'];
				if($row['NAME']=="admin"){
					header('Location: db.php');
				}else{
				
				header('Location: bookshop.php');}
				}
			

		}
		$conn=null;
	}catch(PDOException $e){
		echo "connection failed".$e->getMessage();
	}
	}
?>


      </td>
    </tr>
  </tbody>
</table>



</body></html>