<?php
session_start();
?>
<!DOCTYPE html>
<html><head>
<title>E-BOOK | SHOPPING WEBSITE</title>
<link rel="stylesheet" type="text/css" href="../project/project.css"></head><body >

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table style="background-color:#D8BFD8;text-align: left; width: 1301px; height: 250px; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">

  <tbody>
    <tr>

      <div style="text-align: center; color: purple; font-family: fantasy; font-size: 300%; font-weight: bold;">WORLD OF BOOKS
      </div>
    </tr>
    <tr>
      <td style="vertical-align: top; text-align: center;"><img style="width: 1334px; height: 150px;" alt="" src="../project/lede_social.jpg"> 
      </div>
      </td>
    </tr>
    
 <tr>
 <td  style="text-align:right">

      <br>
      <img style="width: 50px; height: 50px;" alt="" src="../project/user.png"><br><br>
      <a href="register.php"style="padding: 8px; background: rgb(14, 0, 43) none repeat scroll 0% 50%; color: white; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; font-size: 16px;">LOG OUT</a>
      <a href="userprofile.php"style="padding: 8px; background: rgb(14, 0, 43) none repeat scroll 0% 50%; color: white; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; font-size: 16px;">EDIT PROFILE</a>
      </td></tr>
      <tr>
      <td style="vertical-align: top;">
      <form class="example">
      <input type="text" placeholder="Search for a book.." name="search">
  <button type="submit" name="submit"class="button grey">SEARCH</button>


</form>
</td>
 </tr>
  </tbody>
</table><br>

<?php


function processInput($data){ 
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;

}

    if(isset($_POST["submit"])){
    $servername ="localhost";
	$username = "root";
	$dbname = "books";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
    
    if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["search"]!=""){
	
	    $search=processInput($_POST["search"]);
	
	
        }
    $result = $conn->prepare("SELECT * FROM books WHERE name = '$search' ");
	$result->execute();
    ?>    
    <button type="submit" name="previous"class="button grey" style="color:purple;">HOMEPAGE</button><br>

    <?php
     
	while($row=$result->fetch()){
		
	?> 

    

    </style>
    </td><br>
    </tr><br>
    <?php
    if(isset($_POST["add_cart"])){
        $id = GET['id'];
        array_push($ids,id);
        echo($ids);
        /*if(empty($_SESSION["shopping_cart"])) {
	        $_SESSION["shopping_cart"] = ids;
        } else {
	        $array_keys = array_keys($_SESSION["shopping_cart"]);
	        if(false in_array($stack,$array_keys)) {
                echo "you already added";
	        } else {
	            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$stack);
	        }
	    }*/
	}
    if(isset($_POST["previous"])){
                header('Location: bookshop.php');


    }
     }
     }else {

    $con = mysqli_connect("localhost","root","","books");
	if (mysqli_connect_errno()){
		echo mysqli_connect_error();
		die();
		}


$result = mysqli_query($con,"SELECT * FROM `books`");
while($row = mysqli_fetch_assoc($result)){ ?>
		<table>
         <form method='post' action=''>
         <tr>
         <td style="text-align:center; word-break:break-all; width:10px;"> 
         <input type='hidden' name='id' value=" <?php echo $row['ID'] ?>" />
         <td><a href="cart.php?id=<?php echo $row['ID'];?>" style="color:white; width:100px; height:30px;" type='submit' class='button a' >ADD CART</a><td>

        <td style="text-align:center; margin-top:10px; word-break:break-all; width:100px; line-height:100px;">
	<?php if($row['IMAGE'] != ""): ?>
	<img src="<?php echo $row['IMAGE']; ?>" width="150px" height="200px" style="border:1px solid #333333;">
	<?php else: ?>
	<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
	<?php endif; ?>
    </td>
    <td style="text-align:center; word-break:break-all; width:300px;"><?php echo "<h3>".$row ["NAME"];$_SESSION['ID']=$row["ID"]; echo "<br><h4>".$row ["WRITER"];?></td>
    <td style="text-align:center; word-break:break-all; width:400px;"><?php echo "<i>".$row ["DESCRIPTION"]; ?></td>
    <td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["GENRE"]; ?></td>
    <td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["PRICE"]."$"; ?></td></tr>
			 
			  </form>
		   	  </table>
              <?php
        }
?>
   
<?php }

?>

</body></html>