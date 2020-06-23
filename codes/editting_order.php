<link rel="stylesheet" type="text/css" href="../project/project.css">

<?php
$conn=mysqli_connect('localhost','root','',"books");
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE orders set id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', adress='" . $_POST['adress'] . "', cardno='" . $_POST['cardno'] . "' ,cost='" . $_POST['cost'] . "' WHERE id='" . $_POST['id'] . "'");
header('Location:orders.php');
}

$result = mysqli_query($conn,"SELECT * FROM orders WHERE id='" . $_GET['userid'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Orders </title>
</head>
<body>
<form name="frmUser" method="post" action="">

<table bgcolor=" #cce619 " style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;">EDIT ORDER:<br>
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
      <td style="vertical-align: top;">ADRESS<br>
      </td>
      <td style="vertical-align: top;">PAYMENT<br>
      </td>
      <td style="vertical-align: top;">COST<br>
      </td>
   
    </tr>
    <tr>
      <td style="vertical-align: top;"><input type="hidden" name="id"  value="<?php echo $row['ID']; ?>">
<input type="text" name="name"  value="<?php echo $row['NAME']; ?>"><br>
        <br>
      <br>
      </td>
      <td style="vertical-align: top;"><input type="text" name="email"  value="<?php echo $row['NAME']; ?>"><br>

      <br>
      </td>
      <td style="vertical-align: top;"><input type="text" name="age"  value="<?php echo $row['ADRESS']; ?>"><br><br><br><br>
            
      </td>
      <td style="vertical-align: top;"><input type="text" name="gender" value="<?php echo $row['COST']; ?>"><br>

      </td>
      
       
    </tr>
   
  </tbody>
</table>
<tr>
      <button type="submit" name="submit" class="button grey">SAVE CHANGES</button>
    </tr>

</form>
</body>
</html>