<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample templet page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 

  <div class="text-center">
  <h1> Complete </h1>

  	
	<?php



	$otk = rand(1000, 9999);
	$email = $_POST['email'];
	$course = $_POST['courseSelect'];
	$section = $_POST['sectionSelect'];
	$used = "NO";

	$query = "INSERT INTO students (email, otk, used, course, Section) VALUES ('$email','$otk','$used','$course','$section')";
	$result = mysql_query($query) or die(mysql_error());

	

	?>

	<a href="adminHome.php" /><input class="button expand alert" value="Return Home" /> </a>


  </div>

 
</div>


<?php include('inc/footer.php'); ?>