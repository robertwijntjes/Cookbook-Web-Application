<!DOCTYPE html>
<html>
<head>
  <?php
    //add navigation bar
    require "navbar.html";
    //check that a user is logged in
    require "checksignin.php";
  ?>
</head>
<body class="image">

  <div class="container">
    <div class="jumbotron">

      <h2>Create Recipe</h2>

      <!--form for adding a recipe-->
      <form action="addRecipeScript.php" method="post" enctype="multipart/form-data">

        <!--input for recipe name-->
        <div class="form-group">
          <label for="recipeName">Recipe Name: *</label>
          <input type="text" class="form-control" id="recipeName"  name="recipeName" required>
        </div>

        <!--input for recipe completion time-->
        <div class="form-group">
          <label for="time">Completion Time: *</label>
          <input type="number" class="form-control" id="time" name="time" required>
        </div>

        <!--input for recipe ingredients-->
        <div class="form-group">
          <label for="ingredients">Ingredients: * </label> (Separate with a fullstop '.')
          <textarea  class="form-control" id="ingredients" name="ingredients" required></textarea>
        </div>
        <!-- <button type="button" class="btn btn-default" onclick="addIngredient()">Add Ingredient</button>
        <ul id="ingredientList"></ul> -->

        <!--input for recipe instructions-->
        <div class="form-group">
          <label for="instructions">Instructions: * </label> (Separate with a fullstop '.')
          <textarea class="form-control" id="instructions" name="instructions" required></textarea>
        </div>
        <!-- <button type="button" class="btn btn-default" onClick="addInstruction()">Add Instruction</button>
        <ol id="instructionList"></ol> -->

        <!--input for recipe image-->
        <label for="recipeImage">Select image to upload:</label>
        <input type="file" name="recipeImage" id="recipeImage">

        <br>
        <input type="submit" value="Submit Recipe" name="submit">

      </form>
    </div>
  </div>

</body>
</html>
