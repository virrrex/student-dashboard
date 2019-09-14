<?php include("logincheck.php"); ?>
<?php include("header.php"); ?>
<?php include("leftmenu.php"); ?>
<?php
  include("dbconn.php");
  $sql = "SELECT * FROM prices";
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
                    <h5>Prices</h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($result->num_rows>0){
                              while($row = $result->fetch_assoc()){
                          ?>
                            <tr>
                                <td><?php echo $row['pid'] ?></td>
                                <td><?php echo $row['amount'] ?></td>
                                <td><?php echo $row['duration'] ?></td>
                                <td><a href="editprice.php?pid=<?php echo $row['pid']?>">Edit</a> | <a href="deleteprice.php?pid=<?php echo $row['pid']?>"  onclick="return confirm('Are you sure?')">Delete</a></td>
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
            <a href="addprice.php">Add Price</a>
        </div>
        </div>
     <!-- /. PAGE WRAPPER  -->
    </div>
