<?php
require "conn.php";

// get the q parameter from URL
$q = $_REQUEST["q"];

//place wildcard around the parameter
$q = "%" .$q. "%";
//prepare select statement
$stmt=$conn->prepare("Select * from foodlerecipe.rdetails where rname like ? ");
//bind recieved term to statement
$stmt->bind_param("s",$q);
//execute statement
$stmt->execute();
//get results
$result=$stmt->get_result();

//if results were returned
if ($result->num_rows > 0) {

  //whle there are still results
  while($row=$result->fetch_assoc())
  {
    //create a link so theuser can click on it and viw the recipe
    echo "<a href=displayrecipe.php?id=" . $row['Id'] . ">" . $row['rname'] . "</a>, ";
  }
}
else{
  // Output "no suggestion" if no hint was found or output correct values
  echo "no suggestion";
}

?>
