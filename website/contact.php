<!DOCTYPE html>
<html>
<head>
  <?php
    //include navigation bar
    require "navbar.html";
    //check that user is logged in
    require "checksignin.php";
  ?>
</head>
<body class="image">

  <div class="container">
    <!--contact details-->
    <div class="jumbotron">
      <h2>Contact Us</h2>
      <table class="table">
          <tr>
            <td>Address</td>
            <td>Unit 61B,Heather Road,Sandyford Industrial Estate,Dublin 18</td>
          <tr>
          <tr>
            <td>Phone</td>
            <td>01 2974200</td>
          <tr>
          <tr>
            <td>Email</td>
            <td>contact@foodle.com</td>
          <tr>
      </table>
    </div>

    <!--form for messaging us-->
    <div class="jumbotron">
      <h2>Message Us</h2>

      <!--form for mailing user input-->
      <form action="mailto:someone@example.com" method="post" enctype="text/plain">
        <!--input to enter full name-->
        <div class="form-group">
          <label for="name">Full Name: *</label>
          <input type="text" class="form-control" id="name" required>
        </div>

        <!--input to enter email-->
        <div class="form-group">
          <label for="email">Email: *</label>
          <input type="email" class="form-control" id="email" required>
        </div>

        <!--input to enter phone number-->
        <div class="form-group">
          <label for="phoneNumber">Phone:</label>
          <input type="text" class="form-control" id="phoneNumber">
        </div>

        <!--input to enter subject of message-->
        <div class="form-group">
          <label for="subject">Subject:</label>
          <input type="text" class="form-control" id="subject">
        </div>

        <!--input to enter message-->
        <div class="form-group">
          <label for="message">Message: *</label>
          <textarea rows="10"  class="form-control" id="message" required></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>

  </div>

  </div>

</body>
</html>
