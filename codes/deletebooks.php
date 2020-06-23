<?php

$db = mysqli_connect("localhost","root","","books");


$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"DELETE FROM books WHERE id = $id"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:db.php"); // redirects to all records page
    exit;	
}
