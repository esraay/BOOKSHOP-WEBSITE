<?php 
    session_start();
    if (isset($_COOKIE['adress']) && isset($_COOKIE['cardno']) ) {
    echo $_COOKIE['adress'];
    $servername ="localhost";
    $username = "root";
    $dbname = "books";
      $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username); 
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
          $sql="INSERT INTO orders (NAME, ADRESS, CARDNO, COST) VALUES (?,?,?,?)";
          //({$_SESSION['NAME']}, $a, $b,$total_cost)
          $stmt= $conn->prepare($sql);
          $stmt->execute([$_SESSION['NAME'], $_COOKIE['adress'], $_COOKIE['cardno'],$_SESSION['total_cost']]);
    }
      //$conn->exec($sql);
          
          //$conn->connection = null;
      header('location:bookshop.php');
?>