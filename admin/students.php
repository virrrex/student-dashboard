<?php include("logincheck.php"); ?>
<?php include("header.php"); ?>
<?php include("leftmenu.php"); ?>
<?php
  include("dbconn.php");

  $limit = 1;
  if(isset($_GET["page"]))
    $page = $_GET["page"];
  else
    $page = 1;
  $start_from = ($page-1) * $limit;

  $sql = "SELECT * FROM students S JOIN courses C ON S.cid=C.cid LIMIT $start_from, $limit;";
  $result = $conn->query($sql);
?>
<div id="wrapper">
     <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logo.png" />
                </a>
            </div>

             <span class="logout-spn" >
              <a href="#" style="color:#fff;">LOGOUT</a>

            </span>
        </div>
    </div>

    <div id="page-wrapper" >
      <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>List</h2>
                </div>
            </div>
            <!-- /. ROW  -->

            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h5>Students</h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Date of Admission</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($result->num_rows>0){
                              while($row = $result->fetch_assoc()){
                          ?>
                            <tr>
                                <td><?php echo $row['sid'] ?></td>
                                <td><?php echo $row['sname'] ?></td>
                                <td><?php echo $row['cname'] ?></td>
                                <td><?php echo $row['doa'] ?></td>
                                <td><a href="editstudent.php?sid=<?php echo $row['sid']?>">Edit</a> | <a href="deletestudent.php?sid=<?php echo $row['sid']?>"  onclick="return confirm('Are you sure?')">Delete</a></td>
                            </tr>
                          <?php
                              }
                            }
                          ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /. ROW  -->
            <?php
              $sql = "SELECT COUNT(sid) FROM students";
              $result = $conn->query($sql);
              $row = $result->fetch_array();
              $total_records = $row[0];
              $total_pages = ceil($total_records / $limit);

              $pagLink = "<div class='pagination'>";
              for($i=1; $i<=$total_pages;$i++){
                $pagLink .= "<a href='students.php?page=".$i."'>".$i."</a> | ";
              }
              echo $pagLink . "</div>";
            ?>
            <br><a href="addstudent.php">Add Student</a>
        </div>
        </div>
     <!-- /. PAGE WRAPPER  -->
    </div>
