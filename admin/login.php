<?php include("header.php");?>
<?php
  include("dbconn.php");
  if(isset($_POST) && !empty($_POST)){
    //echo "<pre>"; print_r($_POST); exit;
    $email    = addslashes(strip_tags($_POST['email']));
    $password = md5(addslashes(strip_tags($_POST['password'])));

    $sql = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
    $result = $conn->query($sql);
    session_start();
    if($result->num_rows>0)
    {
      $user = $result->fetch_assoc();
      //echo "Welcome <strong>".$user['name']."</strong>";
      $_SESSION['user']=$user;
      header("Location:dashboard.php");
    }
    else {
      $_SESSION['user'] = "";
    }
  }
?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>LOGIN</h2>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-lg-12 ">
                      <?php
                        if(isset($_SESSION['user']) && empty($_SESSION['user']) ){ ?>
                        <div class="alert alert-danger">
                          <strong>Sorry !</strong> Email/Password is wrong.
                        </div>
                      <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                      <form action="" method="post">
                        <div class="form-group">
                             <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" required />
                            <p class="help-block"></p>
                        </div>
                         <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" required />
                            <p class="help-block"></p>
                        </div>
                        <input type="submit" class="btn btn-danger btn-lg btn-block" value="Login"/>
                      </form>
                      <hr>
                      Not Registered? <a href="signup.php">Sign Up</a>
                    </div>
                    <div class="col-lg-4 col-md-4">

                    </div>
                </div>


            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
        <?php include("footer.php"); ?>
