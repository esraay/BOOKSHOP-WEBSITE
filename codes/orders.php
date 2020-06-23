 <link rel="stylesheet" type="text/css" href="../project/project.css">
 <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <input type="submit" name="previous" value="PREVIOUS PAGE" class="submit green"><br><br>
 <table cellpadding="0" cellspacing="0" border="0">
    
    <thead>
        <tr>
            <th style="text-align:center;">DELETE OR EDIT</th>
            <th style="text-align:center;">NAME</th>
            <th style="text-align:center;">ADRESS</th>
            <th style="text-align:center;">PAYMENT</th>
            <th style="text-align:center;">COST</th>

        </tr>
    </thead>
    <tbody>
<?php
    $servername ="localhost";
	$username = "root";
	$dbname = "books";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
    
    $sql = "SELECT * FROM orders";
    $stmt = $conn->query($sql);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    if(isset($_POST["previous"])){

      header('Location:db.php');
  } 
	foreach($result as $key => $row) {
   
         
    if(isset($_POST["refresh"])){

        header('Location:management.php');
    }
?>
<tr>

<td style="text-align:center; word-break:break-all; width:400px; height:100px;"> 
<a href="editting_order.php?userid=<?php echo $row['ID']; ?>">EDIT</a>
<a href="delete_order.php?id=<?php echo $row['ID']; ?>">DELETE</a>

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
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["ADRESS"]; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["CARDNO"]; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"><?php echo $row ["COST"]; ?></td>


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


