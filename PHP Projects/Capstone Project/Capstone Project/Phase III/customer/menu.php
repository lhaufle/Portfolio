<?php
  ini_set( "display_errors", 0);
  include("../template/database.php");
 session_start();
 $id = $_SESSION["id"];
  //check if a post request was sent
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    //verfiy that the requests were not empty
    if(!empty($_POST['menuItem']) && !empty($_POST['cost_to_produce']) && !empty($_POST['sale_price']) && !empty($_POST['description'])){
       //remove any tags
       $menuItem = strip_tags($_POST['menuItem']);
       $cost = strip_tags($_POST['cost_to_produce']);
       $sale = strip_tags($_POST['sale_price']);
       $description = strip_tags($_POST['description']);
      
      //add the input to the database
       addMenuItem($id, $menuItem, $description, $cost, $sale); 
      //refresh the page again to make sure item is showing
     }
  } elseif($_SERVER['REQUEST_METHOD'] == "GET"){
    
    $delete = strip_tags($_GET['delete']);
    
    deleteMenu($delete);
  }
?>


<?php
include("../template/template.php"); 
?>

<?php
  displayHeader("Menu Portal");
?>

<div class="container">
  
 <!-- NavBar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sysco Consulting</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="hompe.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="financials.php">Financials</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="menu.php">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="message.php">Message</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
  
<?php
  displayJumbo("Menu", "Add and view menu items");
?> 
   
	
     
	<!--Add Menu Item-->
    <div class="col">
		<form class="itemForm" action="menu.php" method="POST">
		<!--Menu Name-->
		  <div class="form-group">
    			<label for="menuItem">Name of Menu Item:</label>
    		<input type="text" class="form-control" name = "menuItem" id="menuItem" aria-describedby="menuName" 	placeholder="Menu Item" Required>
		  </div>

		<!--Menu Price-->

		  <div class="form-group">
    			<label for="costToProduce">Cost to Produce: </label>
    		<input type="text" name="cost_to_produce" class="form-control" id="costToProduce" aria-describedby="costToProduce" 	placeholder="Enter cost to produce" Required>
		  </div>
      
      <div class="form-group">
    			<label for="salePrice">Sale Price: </label>
    		<input type="text" name="sale_price" class="form-control" id="menuItem" aria-describedby="salePrice" 	placeholder="Enter sale price" Required>
		  </div>

		<!--Menu Description-->
		<div class="form-group">
    		<label for="description"> Description:</label>
    		<textarea class="form-control" id="description" name="description" rows="3" Required></textarea>
  	</div>
	 <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
  
   <br/>
  <h3>
    Menu Items
  </h3>
 
  <hr/>

  <!--Display Menu Item-->
	 <?php displayMenu($id); //<--############# Actual location id to be added here once login created ?>


<?php
  displayFooter();
?>