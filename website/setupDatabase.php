<?php

require "conn.php";

//create database
$sql = "Create Database foodlerecipe";

//attempt to create database
if($conn->query($sql)==true){
  echo "Database Created<br>";
}
else {
  //display if error occurs
 echo "Error Creating Database: " . $conn->error . "<br>";
}

//create table
$sql = "Create Table foodlerecipe.rdetails(
    Id int(11) auto_increment primary key,
    rname varchar(60),
    rauthor varchar(20),
    rtime varchar(5),
    rinstructions varchar(1000),
    ringredients varchar(1000),
    rimage varchar(100)
  )";

  //attempt to create table
  if($conn->query($sql)==true){
    echo "Table rdetails Created<br>";
  }
  else{
    //display if error occurs
    echo "Error creating Table: " . $conn->error . "<br>";
  }


$sql = "Create Table foodlerecipe.userdetails(
    Id int(11) auto_increment primary key,
    Username varchar(20),
    Password varchar(512)
  )";

  //attempt to create table
  if($conn->query($sql)==true){
    echo "Table Users Created<br>";
  }
  else{
    //display if error occurs
    echo "Error creating Table: " . $conn->error . "<br>";
  }

//prepare insertion statement for recipe details
$stmt = $conn->prepare("INSERT INTO foodlerecipe.rdetails (rname,rauthor, rtime, ringredients,rinstructions,rimage) VALUES (?,?,?,?,?,?)");

//insert black forest cake by Test
$rname="Black Forest Cake";
$rauthor="Test";
$rtime=60;
$ingredients="1 devil's food chocolate cake mix. 1 1/4 cups water. 3 eggs. 2 cups heavy whipping cream";
$rinstructions="Preheat oven to 350 degrees. Beat cake mix, water, eggs, and oil in a large bowl with an electric mixer on low speed until combined about 30 seconds.
Bake cakes in the preheated oven. Grate chocolate bar. Refrigerate cake ";
$rimage="uploads/blackforest.jpg";

//bind variables from above
$stmt->bind_param("ssssss",$rname,$rauthor,$rtime, $ingredients, $rinstructions,$rimage);
//execute prepared statement
$stmt->execute();

//Insert Red Velevt Cake by Test
$rname="Red Velvet Cake";
$rauthor="Test";
$rtime=120;
$ingredients="2 cups all-purpose flour. 1 teaspoon baking soda. 1 teaspoon baking powder. 2 cups sugar";
$rinstructions="Preheat oven to 325.  In a medium bowl, whisk together flour, baking soda, baking powder, cocoa powder and salt. Set aside. Mix in the eggs, buttermilk, vanilla and red food coloring until combined.
Pour the batter evenly into each pan. Bake in the middle rack for 30-40 minutes";
$rimage="uploads/redvelvet.jpg";

//bind variables from above
$stmt->bind_param("ssssss",$rname,$rauthor,$rtime, $ingredients, $rinstructions,$rimage);
//execute prepared statement
$stmt->execute();

//Insert Curried Crab by Test
$rname="Curried Crab with Coconut and Chili";
$rauthor="Test";
$rtime=120;
$ingredients="2 1/4 pounds live crab. 1/4 cup coriander seeds. 1 1/2 tablespoons cumin seeds. 2 ounces desiccated coconut";
$rinstructions="Place the crab in the freezer for 2 hours or until it stops moving.  Remove the legs and crack them with a rolling pin. Heat a medium saute pan over medium heat.
Divide the crab pieces and sauce among shallow wide soup plates and serve immediately";
$rimage="uploads/curriedcrab.jpg";

//bind variables from above
$stmt->bind_param("ssssss",$rname,$rauthor,$rtime, $ingredients, $rinstructions,$rimage);
//execute prepared statement
$stmt->execute();

//prepare statement to insert user Test
$stmt = $conn->prepare("INSERT INTO foodlerecipe.userdetails (Username, Password) VALUES (?, ?)");

$username="Test";
$password=hash("whirlpool",$username);

//bind variables
$stmt->bind_param("ss",$username,$password);

//execute prepared insert statement
$stmt->execute();
echo "The database has been setup<br>";
echo "<hr>";
echo "Username:Test <br>Password:Test<br>";
echo "<hr>";
echo "<a href='index.php'>Home</a>";
?>
