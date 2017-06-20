<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="stylesheet.css" rel="stylesheet" type="text/css"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
    // increase height of search bar
    $(document).ready(function(){
      $("#searchterm").animate({
        height: '30px'
      });

      //fade in welcome text
      $("h2").delay(500).fadeOut(1000, function() {
        //fade in search text
        $("h2").fadeIn("slow");
        $("h2").html("Search <span class = 'glyphicon glyphicon-search' aria-hidden='true' style='font-size:20px'></span>");
      });

    });
  </script>

  <script>
    function showUser(str) {
      if (str=="") {
        document.getElementById("txtHint").innerHTML="";
        return;
      }

      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }

      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("txtHint").innerHTML=this.responseText;
        }
      }

      xmlhttp.open("GET","getRecipeSuggestion.php?q="+str,true);
      xmlhttp.send();
    }
  </script>

  <?php
    //include navigation bar
    require "navbar.html";
    //check that a user has logged in
    require "checksignin.php";
  ?>
</head>
<body class="image">

  <div class="container" id="search-center">
      <div class="jumbotron">
          <h2>Welcome <?php echo $_SESSION['username']; ?> </h2>
          <hr>
          <!--form for searching for recipes-->
          <form method="POST" action="results.php" class="horizontal-form">
              <div class="form-group">
                  <div id="txtHint"></div>
                  <input type="text" name="searchterm" id="searchterm" class="form-control" onkeyup="showUser(this.value)" autocomplete="off"></input>
                  <br>
                  <button type="submit" id="submit" class="btn btn-default" value="send">Search</button>
                  <input type="reset" value="Reset" class="btn btn-default">
              </div>
          </form>
      </div>
  </div>

</body>
</html>
