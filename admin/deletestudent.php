<?php
  include("dbconn.php");
  if(isset($_GET) && !empty($_GET)){
    $sid = $_GET['sid'];

    $sql = "DELETE FROM students WHERE sid = $sid";

    $conn->query($sql);
  }
  header("Location:students.php");
?>
