<!DOCTYPE html>
<html>
<head>
  <?php
    //include navigation bar
    require "navbar.html";
    //make sure user is logged in
    require "checksignin.php";

    //connect to database
    require "conn.php";
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
  //animate recipe image by increasing image size
  //when page has loaded
  $(document).ready(
    function(){
      $("img").animate({
        //increase size
        width:'50%',
        height:'25%'
    })
  });
  </script>

</head>
<body class="image">
  <div class="container">
    <div class="jumbotron">

    <?php

    //simply replaces a ',' with a new line, making it asier to read insruction/ingredients
    function parseList($list){
        //replace , with a <br>
        echo str_replace(".","<br>",$list);
      }
      //recieve id
      $recipeId = $_GET["id"];

      //get recipe details
      //prepare select statement where id is equal to the recieved id
      $stmt=$conn->prepare("select * from foodlerecipe.rdetails where Id = ?");
      //bind recipeId to statement
      $stmt->bind_param("i",$recipeId);
      //execute prepared statement
      $stmt->execute();
      //place result in variable
      $result=$stmt->get_result();
      //get the first row of result
      $row=$result->fetch_assoc();

      ?>



        <div class="rdetails recDispBanner">
          <h2>
            <?php
            //if recipe name is not empty
            if(!empty($row["rname"])){
            echo $row["rname"];
            }
            //if empty
            else{
              echo "Not Available";
            }
            ?>
          </h2>
        </div>


        <div class="rdetails recDispBanner" id="recDispAuthor">
          <label>Created By: </label>
            <?php
            //if recipe author is not empty
            if(!empty($row["rauthor"])){
            echo $row["rauthor"];
            }
            //if empty
            else{
              echo "Not Available";
            }
            ?>
        </div>

        <hr>

        <div class="rdetails">
            <?php
            //if recipe image is not empty
            if(!empty($row["rimage"])){
            echo  "<img src=". $row["rimage"] ." class='recipeImage' >";

            }
            //if empty
            else{
              echo "Not Available";
            }
            ?>
        </div>

        <div class="rdetails">
          <label>Time: </label>
            <?php
            //if recipe completion time is not empty
            if(!empty($row["rtime"])){
            echo $row["rtime"];
            }
            //if empty
            else{
              echo "Not Available";
            }
            ?>
        </div>

        <hr>

        <div class="rdetails">
          <label>Ingredients:  </label>
          <br>
            <?php
            //if recipe ingredients is not empty
            if(!empty($row["ringredients"])){
            parseList($row["ringredients"]);
            //echo $row["ringredients"];
            }
            //if empty
            else{
              echo "Not Available";
            }
            ?>
        </div>

        <hr>

        <div class="rdetails">
          <label>Instructions: </label>
          <br>
            <?php
            //if recipe instructions is not empty
            if(!empty($row["rinstructions"])){
              parseList($row["rinstructions"]);
            //echo $row["rinstructions"];
            }
            //if empty
            else{
              echo "Not Available";
            }
            ?>
        </div>

    </div>
  </div>

</body>
</html>
