 <link rel="stylesheet" type="text/css" href="../project/project.css">

<?php
$conn=mysqli_connect('localhost','root','',"books");
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE books set id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', writer='" . $_POST['writer'] . "', genre='" . $_POST['genre'] . "' ,description='" . $_POST['description'] . "',price='" . $_POST['price'] . "',image='" . $_POST['image'] . "'  WHERE id='" . $_POST['id'] . "'");
header('Location:db.php');
}

$result = mysqli_query($conn,"SELECT * FROM books WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Book Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">

<table bgcolor=" #cce619 " style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;">EDIT BOOK:<br>
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
      <td style="vertical-align: top;">DESCRIPTION<br>
      </td>
      <td style="vertical-align: top;">PRICE<br>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;"><input type="hidden" name="id"  value="<?php echo $row['ID']; ?>">
<input type="text" name="name"  value="<?php echo $row['NAME']; ?>"><br>
        <br>
      <br>
      </td>
      <td style="vertical-align: top;"><input type="text" name="writer" value="<?php echo $row['WRITER']; ?>">
      </td>
      <td style="vertical-align: top;"><input type="text" name="genre"  value="<?php echo $row['GENRE']; ?>"><br><br><br><br>
            
      </td>
      <td style="vertical-align: top;"><input type="text" name="description" value="<?php echo $row['DESCRIPTION']; ?>"><br>

      </td>
      <td style="vertical-align: top;"><input type="text" name="price"  value="<?php echo $row['PRICE']; ?>"><br>

      </td>
      <td>
      <td style="vertical-align: top;"><input type="hidden" name="image"  value="<?php echo $row['IMAGE']; ?>"><br>
	  <img src="<?php echo $row['IMAGE']; ?>" width="150px" height="200px" style="border:1px solid #333333;">

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