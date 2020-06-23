 <link rel="stylesheet" type="text/css" href="../project/project.css">
 <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <input type="submit" name="previous" value="PREVIOUS PAGE" class="submit green"><br><br>
 <table cellpadding="0" cellspacing="0" border="0">
    
    <thead>
        <tr>
            <th style="text-align:center;">DELETE OR EDIT</th>

            <th style="text-align:center;">NAME</th>
            <th style="text-align:center;">EMAIL</th>
            <th style="text-align:center;">AGE</th>
            <th style="text-align:center;">GENDER</th>
            <th style="text-align:center;">PASSWORD</th>

        </tr>
    </thead>
    <tbody>
<?php
    $servername ="localhost";
	$username = "root";
	$dbname = "books";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
    
    $sql = "SELECT * FROM user_infos";
    $stmt = $conn->query($sql);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
	foreach($result as $key => $row) {
   
    
     if(isset($_POST["previous"])){

        header('Location:db.php');
    }     
    if(isset($_POST["refresh"])){

        header('Location:management.php');
    }
?>
<tr>

<td style="text-align:center; word-break:break-all; width:400px; height:100px;"> 
<a href="editting.php?userid=<?php echo $row['ID']; ?>">EDIT</a>
<a href="delete.php?id=<?php echo $row['ID']; ?>">DELETE</a>

<style>
a {
  background-color: #006400;
  color: white;
  padding: 0.5em 0.5em;
  text-decoration: none;
  text-transform: uppercase;
}
</style>
</td>

<td style="text-align:center; word-break:break-all; width:400px;"><?php echo $row ["NAME"];?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["EMAIL"]; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["AGE"]; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["GENDER"]; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["PASSWORD"]; ?></td>


</tr>
<style>

th, td {
  border-bottom: 1px solid #ddd;
}

</style>

<?php 
}?>

</tbody>
</table>

<?php
$name="";
$email="";
$gender="";
$age="";
$password="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
	
		$name=processInput($_POST["name"]);
		$email=processInput($_POST["email"]);
		$gender=processInput($_POST["gender"]);
		$age=processInput($_POST["age"]);
		$password=processInput($_POST["password"]);
	
  

    
}

function processInput($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;

}


?>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table bgcolor=" #cce619 " style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    
    <tr>
      
      <td style="vertical-align: top;">ADD NEW USER:<br>
      <br>
      </td>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <br>
      </td>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <br>
      </td>
      <td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <br>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">NAME<br>
      <br>
      </td>
      <td style="vertical-align: top;">EMAIL<br>
      </td>
      <td style="vertical-align: top;">gender<br>
      </td>
      <td style="vertical-align: top;">age<br>
      </td>
      <td style="vertical-align: top;">PASSWORD<br>
      </td>
     
    </tr>
    <tr>
      <td style="vertical-align: top;"><input name="name" value="<?php echo $name?>"><br>
        <br>
      <br>
      </td>
      <td style="vertical-align: top;"><input name="email" value="<?php echo $email?>"><br>

      <br>
      </td>
      <td style="vertical-align: top;"><input name="gender" value="<?php echo $gender?>"><br><br><br>
            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="refresh" value="refresh to see new user">


      </td>
      <td style="vertical-align: top;"><input name="age" value="<?php echo $age?>"><br>

      </td>
      <td style="vertical-align: top;"><input name="password" value="<?php echo $password?>"><br>

      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><br>
      </td>
      <td style="vertical-align: top;"><br>
      </td>
      <td style="vertical-align: top;"><br>
      </td>
      <td style="vertical-align: top;"><br>
      </td>
    </tr>
  </tbody>
</table>
<br>
<?php

if(isset($_POST["submit"]) && !($name=="") && !($email=="")){

	$servername ="localhost";
	$username = "root";
	$dbname = "books";
        
		$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
        $sql="INSERT INTO user_infos (name,email,gender,age,password) VALUES('$name','$email','$gender','$age','$password')";
        
		$conn->exec($sql);
        
        $conn->connection = null;
    }



    

?>
