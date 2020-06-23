<?php
	session_start();

    $conn=mysqli_connect('localhost','root','',"books");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];

    $sql3 = "DELETE FROM cart WHERE id = {$id}";
    $conn->query($sql3);
    header('location: shopping-cart.php?id=');
    






?>