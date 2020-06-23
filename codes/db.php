<?php session_start();?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../project/project.css"></head><body>
<h1 align="center" style="color:green"> WELCOME TO ADMIN PAGE </h1> 

<body bgcolor="white">
<?php
$name="";
$writer="";
$genre="";
$price="";
$description="";
$imagename="";
$imagetmp="";
$search="";
$nameErr=$writerErr=$genreErr=$priceErr=$descriptionErr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["name"])){
		$nameErr="Name is reqired";
	}else{
		$name=processInput($_POST["name"]);
	}
	if(empty($_POST["writer"])){
		$writerErr="Writer name is reqired";
	}else{
		$writer=processInput($_POST["writer"]);
	}
	if(empty($_POST["genre"])){
		$genreErr="Genre is reqired";
	}else{
		$genre=processInput($_POST["genre"]);
	}
	if(empty($_POST["price"])){
		$priceErr="Price is reqired";
	}else{
		$price=processInput($_POST["price"]);
	}
    if(empty($_POST["description"])){
		$descriptionErr="Description is reqired";
	}else{
		$description=processInput($_POST["description"]);
	}$search=processInput($_POST["search"]);
  

    
}

function processInput($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;

}

?>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<tr><td style="vertical-align: top;"><input style="font-size: 18px;" type="submit" class="submit green" name="manage" value="USER MANAGEMENT"></td>
<tr><td style="vertical-align: top;"><input style="font-size: 18px;" type="submit" class="submit green" name="orders" value="ORDERS"></td>
<td style="vertical-align: top;"><input style="font-size: 18px;" type="submit" class="submit green" name="homepage" value="HOMEPAGE"><br><br></td></tr>
<table bgcolor=" #cce619 " style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    
    <tr>
      
      <td style="vertical-align: top;">Add New Book:<br>
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
      <td style="vertical-align: top;">WRITER<br>
      </td>
      <td style="vertical-align: top;">GENRE<br>
      </td>
      <td style="vertical-align: top;">PRICE<br>
      </td>
      <td style="vertical-align: top;">DESCRIPTION<br>
      </td>
      <td style="vertical-align: top;">IMAGE<br>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><input name="name" value="<?php echo $name?>"><br>
      <span class="error">*<?php echo $nameErr; ?></span> <br><br>
        <br>
      <br><br>
      <input type="text" placeholder="Search for a book.." name="search">
  <button type="submit" name="searchit"class="button grey">SEARCH</button><br>
      </td>
      <td style="vertical-align: top;"><input name="writer" value="<?php echo $writer?>"><br>
      <span class="error">*<?php echo $writerErr; ?></span> <br><br>

      <br>
      </td>
      <td style="vertical-align: top;"><input name="genre" value="<?php echo $genre?>"><br>
      <span class="error">*<?php echo $genreErr; ?></span> <br><br>
            
         


      </td>
      <td style="vertical-align: top;"><input name="price" value="<?php echo $price?>"><br>
      <span class="error">*<?php echo $priceErr; ?></span> <br><br>

      </td>
      <td style="vertical-align: top;"><input name="description" value="<?php echo $description?>"><br>
      <span class="error">*<?php echo $descriptionErr; ?></span> <br><br>

      </td>
      <td style="vertical-align: top;"><input name="image" type="file"><br><br>
      <button type="submit" name="submit" class="button grey">ADD THIS BOOK</button><br>

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
    
if(isset($_POST["manage"])){
           
             header('Location: management.php');
            }
if(isset($_POST["orders"])){
           
            header('Location: orders.php');
           }
if(isset($_POST["homepage"])){
           
             header('Location: bookshop.php');
            }

    $servername ="localhost";
	$username = "root";
	$dbname = "books";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
    
    if(isset($_POST["searchit"])){
    $result = $conn->prepare("SELECT * FROM books WHERE name = '$search' ");
	$result->execute();
    ?>    
    <button type="submit" name="previous"class="button grey" style="color:purple;">PREVIOUS</button><br>

    <?php
     
	while($row=$result->fetch()){
		
	?> 

    <tr>
    <td style="text-align:center; margin-top:10px; word-break:break-all; width:100px; line-height:100px;">
	<?php if($row['IMAGE'] != ""): ?>
	<img src="<?php echo $row['IMAGE']; ?>" width="150px" height="200px" style="border:1px solid #333333;">
	<?php else: ?>
	<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
	<?php endif; ?>
    </td>
    <td><?php echo "<h4>".$row ["NAME"];$_SESSION['ID']=$row["ID"]; echo "<h4><br> By ".$row ["WRITER"];?></td><br>
    <td><?php echo "<i>".$row ["DESCRIPTION"]; ?></td><br><br>
    <td ><?php echo $row ["PRICE"]."$"; ?></td><br><br>
    <br>
    </tr><br>
    <?php
    if(isset($_POST["previous"])){
                header('Location: db.php');


    }
     }
     }else {

    if(isset($_POST["submit"]) && !($name=="") && !($writer=="")){

	$servername ="localhost";
	$username = "root";
	$dbname = "books";
   

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		#echo "Connection is Successfull";
        move_uploaded_file($_FILES["image"]["tmp_name"],$_FILES["image"]["name"]);        
        $location=$_FILES["image"]["name"];
        $sql="INSERT INTO books (name,writer,genre,price,description,image) VALUES('$name','$writer','$genre','$price','$description','$location')";
		$conn->exec($sql);
		$sql="SELECT * from books";
		$result=$conn->query($sql);
		#echo "result".$result->rowCount();
		while($row=$result->fetch()){
		
			#echo $row['ID']." ". $row['NAME']." ".$row['WRITER']." ".$row['GENRE']." ".$row['PRICE']." ".$row['DESCRIPTION']." "."<br>";
		}
		$conn=null;

	}catch(PDOException $e){
		echo "connection failed".$e->getMessage();
	}
	}
?>
   <table cellpadding="0" cellspacing="0" border="0">
    
    <thead>
        <tr>
            <th style="text-align:center;">DELETE OR EDIT</th>

            <th style="text-align:center;">NAME</th>
            <th style="text-align:center;">WRITER</th>
            <th style="text-align:center;">PRICE</th>
            <th style="text-align:center;">DESCRIPTION</th>
            <th style="text-align:center;">GENRE</th>
            <th style="text-align:center;">IMAGE</th>

        </tr>
    </thead>
    <tbody>
<?php
    $servername ="localhost";
	$username = "root";
	$dbname = "books";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
    
       
    $result = $conn->prepare("SELECT * FROM books");
	$result->execute();
   
	while($row=$result->fetch()){
    
          
    
            
?>
<tr>
<td style="text-align:center; word-break:break-all; width:200px;"> 
<a href="editbooks.php?id=<?php echo $row['ID']; ?>" >EDIT</a>
<a href="deletebooks.php?id=<?php echo $row['ID']; ?>" >DELETE</a>
<style>
a {
  background-color: #006400;
  color: white;
  padding: 0.3em 0.3em;
  text-decoration: none;
  text-transform: uppercase;
}
</style>
</td>

<td style="text-align:center; word-break:break-all; width:400px;"><?php echo $row ["NAME"];$_SESSION['ID']=$row["ID"];?></td>
<td style="text-align:center; word-break:break-all; width:400px;"><?php echo $row ["WRITER"]; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["PRICE"]; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["DESCRIPTION"]; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["GENRE"]; ?></td>
<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
	<?php if($row['IMAGE'] != ""): ?>
	<img src="<?php echo $row['IMAGE']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
	<?php else: ?>
	<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
	<?php endif; ?>
</td>

</tr>
<?php 
            } 
            
   ?>

</tbody>
</table>
<br> 
<?php 
            } 
            
   ?>

</body>
</head>
</html>