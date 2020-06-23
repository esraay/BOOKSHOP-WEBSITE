<?php

$db = mysqli_connect("localhost","root","","books");


$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"DELETE FROM user_infos WHERE id = $id"); // delete query

if($del)
{
   
    header("location:management.php"); // redirects to all records page
    	
}
