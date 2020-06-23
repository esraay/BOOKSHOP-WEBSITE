<?php session_start();?>

<?php
$id="";
$name="";
$email="";
$age="";
$gender="";
$password="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	$name=processInput($_POST["name"]);
	$email=processInput($_POST["email"]);
    $age=processInput($_POST["age"]);
	$gender=processInput($_POST["gender"]);
    $password=processInput($_POST["password"]);
	
}
function processInput($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;

}
    $name= $_SESSION['NAME'];
    $servername ="localhost";
	$username = "root";
	$dbname = "books";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
    
       
    $result = $conn->prepare("SELECT * FROM user_infos WHERE name = '$name' ");
	$result->execute();
     
	$row=$result->fetch();
    
		     
?>


<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table bgcolor=" 	#D8BFD8 " style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;">EDIT PROFILE:<br>
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
      <td style="vertical-align: top;">AGE<br>
      </td>
      <td style="vertical-align: top;">GENDER<br>
      </td>
      <td style="vertical-align: top;">PASSWORD<br>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><input name="name" value="<?php echo $row['NAME']?>"><br>
        <br>
      <br>
      </td>
      <td style="vertical-align: top;"><input name="email" value="<?php echo $row['EMAIL']?>"><br>

      <br>
      </td>
      <td style="vertical-align: top;"><input name="age" value="<?php echo $row['AGE']?>"><br><br><br><br>
            <input type="submit" name="submit" value="SAVE CHANGES">
      </td>
      <td style="vertical-align: top;"><input name="gender" value="<?php echo $row['GENDER']?>"><br>

      </td>
      <td style="vertical-align: top;"><input name="password" value="<?php echo $row['PASSWORD']?>"><br>

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

<?php
    $id=$row['ID'];
    if(isset($_POST["submit"])){

	$servername ="localhost";
	$username = "root";
	$dbname = "books";
   

	    
		$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		#echo "Connection is Successfull";
        
        $sql = "UPDATE user_infos SET name='$name',email='$email',age='$age',gender='$gender',password='$password' WHERE id='$id'";
		$conn->exec($sql);
	    
		
		$conn=null;
        header("Location:bookshop.php");

        }
?>
