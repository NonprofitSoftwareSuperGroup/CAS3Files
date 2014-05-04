<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample templet page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 <div class="small-6 large-2 columns"> Left part of the grid</div>

  <div class="small-6 large-8 columns">
  <h1> PAGE CONTENT GOES IN HERE! </h1>

  	<p> Use this page to create new pages, it was created using foundation 5 CSS framework 
  	so if you should definitely look into that <br><br><br> </p>

  	<?php
  		$arr[0] = 1;
  		$arr[1] = 2;
  		$arr[2] = 3;
  		$course  = "CMPT280";
  		$section = 1;

  		$serialized = serialize($arr);

		$query = "INSERT INTO answer_keys (Serials, Course, Section) VALUES ('$serialized','$course','$section')";
		$result = mysql_query($query) or die(mysql_error());

		$query2 = "SELECT Serials FROM answer_keys WHERE Course='".$course."' AND Section='".$section."' LIMIT 1";
 		$result2 = mysql_query($query2) or die(mysql_error());

		while ($fetched = mysql_fetch_array($result2))
		{
			$test = unserialize($fetched['Serials']);
		}
		echo "<br>";
		print_r($test);
	
  	?>


  </div>

 <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>


<?php include('inc/footer.php'); ?>