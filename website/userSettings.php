<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="stylesheet.css" rel="stylesheet" type="text/css"/>

  <?php
    //include navigation bar
    require "navbar.html";
    //check that a user has signed in
    require "checksignin.php";

    //animate error messages
    require "animateError.js";

    //connect to database
    require "conn.php";

    //if a password has been entered
    if(isset($_POST["Password"]) && !empty($_POST["Password"])){
      //if a confirmation password has been entered
      if(isset($_POST["Password-Confirm"]) && !empty($_POST["Password-Confirm"])){

        //place posted variables into local variables
        $username = $_SESSION['username'];
        $password = $_POST["Password"];
        $n_password = $_POST["Password-Confirm"];



        //check if password and confirmation passowrd are the same
        //if passwords are not the same
        if(strcmp($password, $n_password)  !== 0)
        {
          $msg="Password not the same";
        }
        else{

            //checks if the user has only entered letters and numbers for their password
            if (preg_match("/^[a-zA-Z0-9]{6,}$/", $password))
            {
              
              //hash password with whirlpool
              $password= hash("whirlpool",$password);

              //prepare update for userdetails
              $stmt=$conn->prepare("Update foodlerecipe.userdetails set Password=? where Username=?");
              //bind variables to statement
              $stmt->bind_param("ss",$password,$username);

              //execute statement
              if($stmt->execute()){
                $msg="Password Updated";
              }//end if
              else{
                $msg="Password not updated " .  $conn->error;
              }//end else

            }//end password preg_match
            else{
              $msg = "Password must be at least 6 characters long and contain only a-z, A-Z and 0-9";
            }
        }//end else
      }//end confirmation of password
    }//end password
  ?>
</head>
<body class="image">
  <div class="container">
    <div class = "Jumbotron">
      <h2 class="header-text">Change Password</h2>
      <hr>
      <!--form for updateing password-->
      <form  method="post" action="" enctype="multipart/form-data">
        <!--input for password-->
        <div class="form-group">
          <label for="password">Password: *</label>
          <input type="password" class="form-control" name="Password" required>
        </div>
        <!--input for confirmation password-->
        <div class="form-group">
          <label for="confpassword">Confirm Password: *</label>
          <input type="password" class="form-control" name="Password-Confirm" required>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
      </form>

      <!--if any messages to display-->
      <?php
        if(isset($msg))
        {
        echo '<h5 style="color:red" id="errorMsg">' . $msg . '</h5>';
        }
      ?>
    </div>
  </div>
</body>
