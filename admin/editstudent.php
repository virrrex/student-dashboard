<?php include("logincheck.php"); ?>
<?php include("header.php"); ?>
<?php include("leftmenu.php"); ?>
<?php

         include("dbconn.php");
         $sql = "SELECT * FROM courses";
         $result1 = $conn->query($sql);

         if(isset($_GET) && !empty($_GET))
         {
           $sid = $_GET['sid'];
           $sql = "SELECT * FROM students S JOIN courses C ON S.cid=C.cid WHERE sid = $sid;";
           $result = $conn->query($sql);
           $row = $result->fetch_assoc();

         }

         if(isset($_POST) && !empty($_POST)){
         	 $sname = addslashes(strip_tags($_POST['sname']));
           $cid = $_POST['cid'];
           $doa = $_POST['doa'];
           $sid = $_POST['sid'];

         	 	$sql = "UPDATE students SET sname='".$sname."', cid=$cid, doa='".$doa."' WHERE sid=$sid ";
         	 	if($conn->query($sql))
         	 	{
         	 		header("Location:students.php");

         	 	}else{
         	 		$error = "Student is not added.";
         	 	}
         	 }
?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>EDIT STUDENT</h2>
                    </div>
                </div>

                <hr>
                 <div class="row">
                    <div class="col-lg-12 ">
                        <?php if(isset($error) && !empty($error)) {
                        ?>
                        <div class="alert alert-danger">
                             <strong><?php echo $error; ?></strong>
                         </div>
                     <?php } ?>
                 </div>
             </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4">
                     <form action="" method="post">
                       <input type="hidden" name="sid" value="<?php echo $row['sid'] ?>">
                        <div class="form-group">
                            <label>Student Name</label>
                            <input class="form-control" type="text" name="sname" value="<?php echo $row['sname'] ?>" required/>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <select class="form-control" name="cid" required>
                                <option value="">Select Course</option>
                                <?php while($row1=$result1->fetch_assoc()){ ?>
                                  <option value="<?php echo $row1['cid'] ?>" <?php echo($row1['cid']==$row['cid'])?"selected":"" ?>><?php echo $row1['cname'] ?>
                                  </option>
                                <?php } ?>
                            </select>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label>Date of Admission</label>
                            <input class="form-control" type="date" name="doa" required value="<?php echo $row['doa'] ?>"/>
                            <p class="help-block"></p>
                        </div>
                        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Update"/>
                        <input type="reset" class="btn  btn-lg btn-block" value="Clear"/>
                     </form>
                    </div>
                    <div class="col-lg-4 col-md-4">

                    </div>
                </div>
                <hr>
                <a href="students.php">Students</a>


            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
         <?php include("footer.php"); ?>
