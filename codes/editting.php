 <link rel="stylesheet" type="text/css" href="../project/project.css">

<?php
$conn=mysqli_connect('localhost','root','',"books");
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE user_infos set id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', email='" . $_POST['email'] . "', age='" . $_POST['age'] . "' ,gender='" . $_POST['gender'] . "',password='" . $_POST['password'] . "' WHERE id='" . $_POST['id'] . "'");
header('Location:management.php');
}

$result = mysqli_query($conn,"SELECT * FROM user_infos WHERE id='" . $_GET['userid'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update User Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">

<table bgcolor=" #cce619 " style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
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
      <td style="vertical-align: top;"><input type="hidden" name="id"  value="<?php echo $row['ID']; ?>">
<input type="text" name="name"  value="<?php echo $row['NAME']; ?>"><br>
        <br>
      <br>
      </td>
      <td style="vertical-align: top;"><input type="text" name="email"  value="<?php echo $row['EMAIL']; ?>"><br>

      <br>
      </td>
      <td style="vertical-align: top;"><input type="text" name="age"  value="<?php echo $row['AGE']; ?>"><br><br><br><br>
            
      </td>
      <td style="vertical-align: top;"><input type="text" name="gender" value="<?php echo $row['GENDER']; ?>"><br>

      </td>
      <td style="vertical-align: top;"><input type="text" name="password"  value="<?php echo $row['PASSWORD']; ?>"><br>

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