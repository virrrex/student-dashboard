<?php include("logincheck.php"); ?>
<?php include("header.php"); ?>
<?php include("leftmenu.php"); ?>
<?php

         include("dbconn.php");
         if(isset($_GET) && !empty($_GET)){
           $pid = $_GET['pid'];
           $sql = "SELECT * FROM prices WHERE pid=$pid";

           $result = $conn->query($sql);

           if($result->num_rows>0){
             $row = $result->fetch_assoc();
           }
         }
         if(isset($_POST) && !empty($_POST)){
           $amount = $_POST['amount'];
         	 $duration = addslashes(strip_tags($_POST['duration']));
         	 $sql = "SELECT * FROM prices WHERE amount = $amount OR duration='".$duration."'";
         	 $result = $conn->query($sql);
         	 if($result->num_rows>0)
         	 {
         	 	$error = "Price/Duration already exists.";
         	 }
         	 else{
         	 	$sql = "UPDATE prices SET amount = $amount, duration = '".$duration."' WHERE pid=$pid";
         	 	if($conn->query($sql))
         	 	{
         	 		header("Location:prices.php");

         	 	}else{
         	 		$error = "Price is not updated.";
         	 	}
         	 }
         }
?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>EDIT PRICE</h2>
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
                     <form action=""method="post">
                       <input type="hidden" name="pid" value="<?php echo $row['pid'] ?>">
                        <div class="form-group">
                            <label>Amount</label>
                            <input class="form-control" type="text" name="amount" value="<?php echo $row['amount'] ?>" required/>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label>Duration</label>
                            <input class="form-control" type="text" name="duration" value="<?php echo $row['duration'] ?>" required/>
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
                <a href="prices.php">Prices</a>


            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
         <?php include("footer.php"); ?>
