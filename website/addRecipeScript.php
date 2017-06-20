<?php
//Reference: The upload mechanism below was adapted from the following link: http://www.w3schools.com/php/php_file_upload.asp

//the directory that the images will be placed into
$target_dir = "uploads/";
//the file Location and name
$target_file = $target_dir . basename($_FILES["recipeImage"]["name"]);
//will help determine whether an image has been uploaded successfully
$uploadOk;
//get the file type
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//give the image a unique name
$target_file = $target_dir .  round(microtime(true)) . "." . $imageFileType;

//if submit is pressed
if(isset($_POST["submit"])) {
  //if file uploaded
  if(!empty($_FILES["recipeImage"]["tmp_name"])){

    //check file type
    $check = getimagesize($_FILES["recipeImage"]["tmp_name"]);

    //file is an image
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;

      // Check if file already exists
      if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
      }
      // Check if file is not a supported format
      if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
          echo "Sorry, please upload a supported image file type. (.jpg, .jpeg, .png, .gif )";
          $uploadOk = 0;
      }

    }
    //file is not an image
    else {
    echo "File is not an image.";
    $uploadOk = 0;
    }
  }
  else{
    $uploadOk = 1;
    $target_file=null;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    //set file to null
    $target_file=null;
    echo "Sorry, your file was not uploaded.";
  }
  //attempt upload of image
  else {
    //if upload succeded
    if (move_uploaded_file($_FILES["recipeImage"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["recipeImage"]["name"]). " has been uploaded.";
    }
    //if failed to upload
    else {
      echo "Sorry, there was an error uploading your image, please try again.";
    }
  }
}

?>
<?php

  if($uploadOk=1){

    session_start();

    require "conn.php";

    //if a recipe name has been entered
    if(isset($_POST["recipeName"]) && !empty($_POST["recipeName"])){
      //if a recipe completion time has been entered
      if(isset($_POST["time"]) && !empty($_POST["time"])){
          //if a recipe ingredients has been entered
          if(isset($_POST["ingredients"]) && !empty($_POST["ingredients"])){
          //if a recipe instructions has been entered
            if(isset($_POST["instructions"]) && !empty($_POST["instructions"])){

                //place posted variables into local variables
                $rname = $_POST["recipeName"];
                $rauthor = $_SESSION['username'];
                $rtime = $_POST["time"];
                $ingredients=$_POST["ingredients"];
                $rdes = $_POST["instructions"];
                $rimage=$target_file;

                //prepare insertion statement for recipe details
                $stmt = $conn->prepare("INSERT INTO foodlerecipe.rdetails (rname,rauthor, rtime, ringredients,rinstructions,rimage) VALUES (?,?,?,?,?,?)");
                //bind variables from above
                $stmt->bind_param("ssssss",$rname,$rauthor,$rtime, $ingredients, $rdes,$rimage);
                //execute prepared statement
                $stmt->execute();
                //get insertion id
                $last_id = $conn->insert_id;

              }//end instructions
            }//end ingredients
        }//end time
    }//end recipename

    //open recipe display for the insertion id
    $url = "displayrecipe.php?id=" . $last_id;
    header('Location:'. $url);
  }

?>
