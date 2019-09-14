<?php include("logincheck.php"); ?>
<?php include("header.php"); ?>
<?php include("leftmenu.php"); ?>
<?php

         include("dbconn.php");
         $sql = "SELECT * FROM prices";
         $result = $conn->query($sql);

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
           	 	$sql = "INSERT INTO prices(amount,duration) VALUES($amount,'".$duration."')";
           	 	if($conn->query($sql))
           	 	{
           	 		header("Location:prices.php");

           	 	}else{
           	 		$error = "Price is not added.";
           	 	}
            }
         	 }
?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>ADD PRICE</h2>
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
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" type="text" name="amount" required/>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label>Duration</label>
                            <input class="form-control" type="text" name="duration" required/>
                            <p class="help-block"></p>
                        </div>
                        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Add"/>
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
