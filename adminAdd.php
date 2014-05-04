<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample templet page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 

  <div class="text-center">
  <h1> Complete </h1>

  	
	<?php
	

	///$query = "INSERT INTO students (email, otk, used, course, Section) VALUES ('$email','$otk','$used','$course','$section')";
	//$result = mysql_query($query) or die(mysql_error());

  $userCount = 0;
  $userArray = array();

  for($i = 1; $i < 10; $i++){

  	$user = $_POST['username' . $i];

  	if($user != ""){
  		
  		$userArray[$userCount] = $user;
  ?>

  <p> <?php echo "Users: " . $user;  ?> </p>
  
  <?php
  		$userCount++;
  	}
  }
  ?>

  <p>  Users were added, with a default password 1234 </p>


  <?php
	
	for($y = 0; $y < $userCount; $y++){
		$newUser = $userArray[$y];
		$pass = 1234;
		$admin = $_POST['admin'];;

		$query = "INSERT INTO professor (username, password, Admin) VALUES ('$newUser','$pass','$admin')";
		$result = mysql_query($query) or die(mysql_error());
	}

	?>

	<a href="adminHome.php" /><input class="button expand alert" value="Return Home" /> </a>


  </div>

 
</div>


<?php include('inc/footer.php'); ?>