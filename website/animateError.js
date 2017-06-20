<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
//hides the error message after a certain amount of time
//when document has loaded
$(document).ready(
  function(){
  //display message for 2000ms
  $("#errorMsg").delay(5000).slideUp();
});
</script>
