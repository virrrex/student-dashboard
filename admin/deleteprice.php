<?php
  include("dbconn.php");
  if(isset($_GET) && !empty($_GET)){
    $pid = $_GET['pid'];

    $sql = "DELETE FROM prices WHERE pid = $pid";

    $conn->query($sql);
  }
  header("Location:prices.php");
?>
