<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample question page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 <div class="small-6 large-2 columns"> Left part of the grid</div>

  <div class="small-6 large-8 columns">
  <h1> PAGE CONTENT GOES IN HERE! </h1>
  <?php session_start();
  $email = $_SESSION['email'];  //use to set used to delete row, can get rid of used
  echo $email;
  
  $query3 = "DELETE FROM students WHERE email='".$email."' LIMIT 1";
  $result3 = mysql_query($query3) or die(mysql_error());
  ?>
  	<p> Use this page to create new pages, it was created using foundation 5 CSS framework 
  	so if you should definitely look into that </p>


  </div>

 <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>


<?php include('inc/footer.php'); ?>
