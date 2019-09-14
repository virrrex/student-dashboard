<?php
  include("dbconn.php");
  if(isset($_GET) && !empty($_GET)){
    $cid = $_GET['cid'];

    $sql = "DELETE FROM courses WHERE cid = $cid";

    $conn->query($sql);
  }
  header("Location:courses.php");
?>
