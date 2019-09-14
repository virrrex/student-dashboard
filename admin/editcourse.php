<?php include("logincheck.php"); ?>
<?php include("header.php"); ?>
<?php include("leftmenu.php"); ?>
<?php

         include("dbconn.php");
         if(isset($_GET) && !empty($_GET)){
           $cid = $_GET['cid'];
           $sql = "SELECT * FROM courses WHERE cid=$cid";

           $result = $conn->query($sql);

           if($result->num_rows>0){
             $course = $result->fetch_assoc();
           }
         }
         if(isset($_POST) && !empty($_POST)){
         	 $cname = addslashes(strip_tags($_POST['cname']));
           $cdesp = addslashes(strip_tags($_POST['cdesp']));
           $cid = $_POST['cid'];
         	 $sql = "SELECT * FROM courses WHERE cname = '".$cname."' AND cid!=$cid";
         	 $result = $conn->query($sql);
         	 if($result->num_rows>0)
         	 {
         	 	$error = "Course already exists.";
         	 }
         	 else{
            if (isset($_FILES)) {
              $image = $_FILES["image"]['name'];
              $sql = "UPDATE courses SET cname = '".$cname."',cdesp='".$cdesp."',image='".$image."' WHERE cid=$cid";
              $path = $_SERVER['DOCUMENT_ROOT']."/project/uploads/".$_FILES["image"]["name"];
              move_uploaded_file($_FILES["image"]['tmp_name'],$path);
            }
            else
         	 	  $sql = "UPDATE courses SET cname = '".$cname."',cdesp='".$cdesp."' WHERE cid=$cid";

         	 	if($conn->query($sql))
         	 	{
         	 		header("Location:courses.php");

         	 	}else{
         	 		$error = "Course is not updated.";
         	 	}
         	 }
         }
?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>EDIT COURSE</h2>
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
                     <form action=""method="post" enctype="multipart/form-data">
                       <input type="hidden" name="cid" value="<?php echo $course['cid'] ?>">
                        <div class="form-group">
                            <label>Course Name</label>
                            <input class="form-control" type="text" name="cname" value="<?php echo $course['cname'] ?>" required/>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label>Course Description</label>
                            <textarea class="form-control" name="cdesp" required rows="5" cols="20"><?php echo $course['cdesp'] ?></textarea>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label>Course Image</label>
                            <input class="form-control" type="file" name="image" required accept="image/*"/>
                            <p class="help-block"></p>
                        </div>
                        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Edit"/>
                        <input type="reset" class="btn  btn-lg btn-block" value="Clear"/>
                     </form>
                    </div>
                    <div class="col-lg-4 col-md-4">

                    </div>
                </div>
                <hr>
                <a href="courses.php">Courses</a>


            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
         <?php include("footer.php"); ?>
