<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample templet page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 

  <div class="text-center">
  <h1> Resend One Time Key </h1>

  	
  	<form action="adminSent.php" method="POST">
  	<?php for($i = 1; $i <= 1; $i++){ //open for loop to display email space ?>
	<label for="email">Email
		<input type="email" name="email" placeholder="Email:" />
	</label>	
		<label>Course Name
        <select name="courseSelect"> 
          <option value="CMPT-280">CMPT-280</option>
          <option value="CMPT-281">CMPT-281</option>
          <option value="CMPT-371">CMPT-371</option>
          <option value="CMPT-372">CMPT-372</option>
        </select>
      </label>
	  <label>Section
        <select name="sectionSelect"> 
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </label>	
	<?php }//closes for loop to display email ?>

		<input class="button expand alert" type="submit" value="Send" />
	</form>
</div>	



<div class="text-center">
<h1> Add Users </h1>
	<form action="adminAdd.php" method="POST">
  	<?php for($i = 1; $i <= 10; $i++){ //open for loop to display email space ?>
	
		<input name="username<?php echo $i ?>" placeholder="User Name <?php echo $i ?>" />
		
		
			
	<?php }//closes for loop to display email ?>

		<label>Admin
        <select name="admin"> 
          <option value="0">NO</option>
          <option value="1">YES</option>
          
        </select>
      	</label>

		<input class="button expand alert" type="submit" value="Add" />
	</form>

	

  </div>

 
</div>


<?php include('inc/footer.php'); ?>