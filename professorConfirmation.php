<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>
<?php include('class/StudentClass.php'); ?>

	<!--  This is a sample question page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 <div class="small-6 large-2 columns"> Left part of the grid</div>

  <div class="small-6 large-8 columns">
  

  <?php
  //Print all emails and what one time key was sent to them.
  $emailCount = 0;
  $emailArray = array();

  for($i = 1; $i < 50; $i++){

  	$email = $_POST['email' . $i];

  	if($email != ""){
  		
  		$emailArray[$emailCount] = $email;
  ?>

  <p> <?php //echo "Email: " . $email;  ?> </p>
  
  <?php
  		$emailCount++;
  	}
  }
  ?>


  <?php
 

	//creates array with 50 student objects
		$students = array();
		for($s = 0; $s < $emailCount; $s++){
			$students[$s] = new Student();
		}

	//add random key and email to each student object
		for($y = 0; $y < $emailCount; $y++){
			$students[$y]->key = rand(1000, 9999);
			$students[$y]->email = $emailArray[$y];
			//sets each student->email and student-> to variable
			$email = $students[$y]->email;
			$otk = $students[$y]->key;
			$used = "NO";

			//add email. otk and boolean used to student table in cas3database
			$query = "INSERT INTO students (email, otk, used) VALUES ('$email','$otk','$used')";
			$result = mysql_query($query) or die(mysql_error());

			//Send emails and keys

			$subject = "Welcome to CAS3 testing system.";
			$message = "Your email is: " . $email . " and your One Time Key is " . $otk;

			mail($email,$subject,$message,"From: System");
    		echo "Thank you for sending us feedback";

		}

	

		
		
	
	
	
	var_dump($students);

	
	



	?>





  </div>

 <div class="small-12 large-2 columns"> 

 	<?php  echo $emailCount . " emails were sent";?>

 </div>
</div>


<?php include('inc/footer.php'); ?>