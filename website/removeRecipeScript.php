<?php
  //connect to database
  require "conn.php";
  require "checksignin.php";

  //recieve id for deletion
  $recipeID=$_GET["id"];

  //need to check that the correct user is deleting recipe
  //get recipe details
  //prepare select statement where id is equal to the recieved id
  $stmt=$conn->prepare("select * from foodlerecipe.rdetails where Id = ?");
  //bind recipeId to statement
  $stmt->bind_param("i",$recipeID);
  //execute prepared statement
  $stmt->execute();
  //place result in variable
  $result=$stmt->get_result();
  //get the first row of result
  $row=$result->fetch_assoc();

  if($_SESSION['username']==$row["rauthor"]){
    //prepre deletion statement
    $stmt=$conn->prepare("delete from foodlerecipe.rdetails where Id= ?");
    //bind recipeId to statement
    $stmt->bind_param("s",$recipeID);

    //execute statement
    if($stmt->execute()){
      $msg="Recipe removed";
    }
    else{
      $msg="Unable to remove recipe";
    }
  }



  //reload page
  header('Location: mycookbook.php?msg=' . $msg);

 ?>
