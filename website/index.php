        <?php
            require "conn.php";
            require "animateError.js";

            if(!empty($_GET["msg"])){
              $msg=$_GET["msg"];
            }

            if(isset($_POST["username"]) && !empty($_POST["username"]) )
            {
                if( isset($_POST['password']) && !empty($_POST['password']) )
                {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    $password= hash("whirlpool",$password);

                    $stmt=$conn->prepare("select * from foodlerecipe.userdetails where Username = ?");
                    $stmt->bind_param("s",$username);
                    $stmt->execute();
                    $result=$stmt->get_result();
                    $row=$result->fetch_assoc();

                    if(mysqli_num_rows($result) > 0) {
                      if(strcmp($password, $row["Password"]) == 0)
                      {
                        session_start();
                        $_SESSION['username'] = $username;

                        header('Location: searchpage.php');
                      }
                      else{
                          $msg = "Password entered Incorrectly";
                      }
                    }
                    else{
                        $msg = "Username does not exist";
                    }

                }
            }

            $conn->close();
        ?>
<html>
    <head>
        <title>Foodle</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="image">
      <div class="container">
        <div class = "jumbotron">
            <a href="index.php" id="noDecLink"><h2 class="title-text main-header" >Foodle Recipes</h2></a>
        </div>

        <div class = "Jumbotron">
          <div  class="container">
            <h2 class="header-text">Login</h2>
            <hr>

            <!-- form for registering a new user-->
            <form  method="post" action="" enctype="multipart/form-data">
              <!--insert a username-->
              <div class="form-group">
                <label for="Name">Username:</label>
                <input type="text" class="form-control" name="username" required>
              </div>

              <!-- insert a paswword-->
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
              </div>

              <button type="submit" class="btn btn-default">Submit</button>
              <a href ="register.php"  class="btn btn-default">Register</a>
            </form>



              <?php
                  if(isset($msg))
                  {
                      echo '<tr><td><h5 style="color:red" id="errorMsg">' . $msg . '</h5></td></tr>';
                  }
              ?>

          </div>
      </div>
    </body>
<html>
