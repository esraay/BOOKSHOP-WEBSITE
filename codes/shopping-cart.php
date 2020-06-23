<?php 
    session_start();

    $conn=mysqli_connect('localhost','root','',"books");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $total_cost = 0;
    if($_GET['id'] != ""){
        $sql = "INSERT INTO cart (book_id,quantity)VALUES ({$_GET['id']},1)";

            if ($conn->query($sql) === TRUE) {
                echo " ";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        /*$resultcheckvar = $conn->query("SELECT quantity FROM cart WHERE id = {$_GET['id']}");
        if($resultcheckvar->num_rows != 0) {
            $row = $resultcheckvar->fetch_assoc();
            $unitquantity = $row['quantity']+1;
            $updatequantity = "SET quantity = $unitquantity WHERE id = {$_GET['id']}";
            $conn->query($updatequantity);
		} else {*/
            
		/*}*/
        
	}


    
  
    $sql = "SELECT * FROM cart";
    $result = $conn->query($sql);

?>
<html>
<head>
<title>CART</title>
</head>
<body bgcolor="#088A85">
<script src="example.js" async=""></script>

<br>
<table bgcolor="#CEECF5" align="center" style="text-align: center; width: 50%;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <td>
    <td>
    <tr>
      <td style="vertical-align: top;"><br>
      <br>
      </td>
      <td style="vertical-align: top;">
      <br>
      </td>
      <td style="vertical-align: top;">
      <br>
      </td>
      <td style="vertical-align: top;">
      <br>
      </td>
    </tr>
    <tr>
    <td style="vertical-align: top;"><br>

    <td style="vertical-align: top;"><br>
      
      </td>
      <td style="vertical-align: top;">NAME<br>
      </td>
      <td style="vertical-align: top;">WRITER<br>
      </td>
      <td style="vertical-align: top;">PRICE<br>
      </td>
      <td style="vertical-align: top;">QUANTITY<br>
      </td>
      <td style="vertical-align: top;">TOTAL PRICE<br>
      </td>
    </tr>
    <?php 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $sql2 = "SELECT * FROM books WHERE ID= {$row['book_id']}";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $total_cost = $total_cost + ($row2['PRICE'] * $row['quantity']);
    ?>

    <tr><td>
     <form action="deletecart.php" method="POST">
            <input type="hidden" name="id" value=<?php echo $row['id']; ?> >
            <input name="delete" type="submit" value="X"></form>
            </td>
     <td><br>
	  <img src="<?php echo $row2['IMAGE']; ?>" width="50px" height="50px" style="border:1px solid #333333;">

      </td>
      <td>
      <br><br>
      <?php echo $row2['NAME']; ?><br>
        <br>
      <br>
      </td>
      <td style="vertical-align: center;"><?php echo $row2['WRITER']; ?>
      </td>
            
      </td>

      </td>
      <td style="vertical-align: center;"> <?php echo $row2['PRICE']; ?><br>

      </td>
      </td>
      <td style="vertical-align: center;"> <?php echo $row['quantity']; ?><br>

      </td>
      <td>
      
       
    </tr>
    
            </td>
   
    <?php } }     $_SESSION['total_cost']=$total_cost;

    ?>
    <form method="POST">

    <tr style="background-color:white"><td></td><td></td><td></td><td></td><td></td><td></td><td ><?php echo $total_cost; ?></td></tr>
    <tr><td></td><td></td><td></td><td></td><td></td><td></td><td>
  
    <tr style="background-color:white"><td><div id="parent" >
      <button type="hidden" id="hidebutton" onclick="clearForm()" style="display: none;">HIDE</button>
      <button type="button" onclick="Pay(parent,paybutton)" id="paybutton" style="padding: 8px; background: #0A0A2A none repeat scroll 0% 50%; color: white; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; font-size: 16px;">PAY &gt;</button><br>
      </div></td><td><p id="title" style="font-weight: bold;"></td><td><p id="title2" style="font-weight: bold;" ></p></td><td></td><td></td><td></td><td ></td></tr>

    <tr><td></td><td><br><div id="adresspanel" name="adress" ></div></td><td>
<div id="panel" ></div><br>
<div id="cardNo" ></div><br>
</td></td><td></td><td><div id="Submit" ></div></td><td></td><td ></td></tr>

    <a href="bookshop.php" style="align: center; padding: 8px; background: #0A0A2A none repeat scroll 0% 50%; color: white; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; font-size: 16px;">CONTINUE SHOPPING</a>
    <br>
  </tbody>
</table>
<br>
<br>

</form>       
</body>
</html>