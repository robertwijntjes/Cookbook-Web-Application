<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="stylesheet.css" rel="stylesheet" type="text/css"/>

  <?php
    // include navigation bar
    require "navbar.html";
    //check that a user is logged in
    require "checksignin.php";

    //animate error messages
    require "animateError.js";

    //connect to database
    require "conn.php";

    //set any error messages
    if(!empty($_GET["msg"])){
      $msg=$_GET["msg"];
    }
  ?>

</head>
<body class="image">
  <div class="container">
    <div class="jumbotron">

    <!--display any error messages-->
    <?php
      if(isset($msg))
      {
        echo '<h5 style="color:red" id="errorMsg">' . $msg . '</h5>';
      }

      //get username
      $searchterm = $_SESSION['username'];
      //find all recipes by username
      //create prepared select statement to retrieve recipes made by user
      $stmt=$conn->prepare("select * from foodlerecipe.rdetails where rauthor = ?");
      //bind username to statement
      $stmt->bind_param("s",$searchterm);
      //execute prepared statement
      $stmt->execute();
      //get result of execution
      $result=$stmt->get_result();

      ?>

      <!--create table to display results in-->
      <table class='table table-striped table-hover'>
        <thead>
          <th>Name</th>
          <th>Time</th>
          <th>Author</th>
        </thead>

      <?php
      //display results
      //if any results are returned
      if($result->num_rows>0)
      {
        //while there are results left
        while($row=$result->fetch_assoc())
        {
          echo "<tr>";
          echo "<td>" . $row["rname"] . "</td>";
          echo "<td>" . $row["rtime"] . "</td>";
          echo "<td>" . $row["rauthor"] . "</td>";
          echo "<td>" . "<a href='removeRecipeScript.php?id=" . $row["Id"] ."'>Remove" ."</td>";
          echo "<td>" . "<a href='displayRecipe.php?id=" . $row["Id"] ."'>View" ."</td>";
          echo "</tr>";
        }
      }
      ?>

      </table>

      <?php
        //if no results
        if($result->num_rows<=0)
        {
          echo "<h2>No Result Found!</h2>";
        }
      ?>

    </div>
  </div>
</body>
</html>
