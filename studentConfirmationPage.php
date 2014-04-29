<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>



<div class="row">
  <div class="small-4 small-centered columns"> <h5>  STUDENT CONFIRMATION PAGE </h5> </div>
</div>


<?php
 include('class/loginModule.php');
 ?>
				<div class="row">
						<?php session_start();
					  echo '<div class="small-7 small-centered columns"> <h4>  Is ' . $_SESSION['courseName'] .'-'. $_SESSION['section'] .' the correct class? If so click continue. </h4> </div>';
						?>
					<div class="small-7 small-centered columns">
						<a href="sampleQuestion.php" class="button expand alert"> Continue </a>
					</div>	
				</div>


<?php include('inc/footer.php'); ?>
