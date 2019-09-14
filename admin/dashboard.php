<?php include("logincheck.php"); ?>
<?php include("header.php"); ?>
<?php include("leftmenu.php"); ?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
             <h2>DASHBOARD</h2>
            </div>
        </div>
         <!-- /. ROW  -->
          <hr />
        <div class="row">
            <div class="col-lg-12 ">
                <div class="alert alert-info">
                    Welcome <strong><?php echo $_SESSION['user']['name'] ?> ! </strong> This is Your Dashboard.
                </div>

            </div>
        </div>
          <!-- /. ROW  -->

          <!-- /. ROW  -->
</div>
     <!-- /. PAGE INNER  -->
    </div>
 <!-- /. PAGE WRAPPER  -->
</div>

<?php
  include("footer.php");
?>
