<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>

<div class="row">

  <div class="small-6 large-2 columns"> Left part of the grid</div>

  <div class = "small-3 large-6 columns">


  <?php

  include('class/loginModule.php');

  
  //Code to display professor traits
        
        

       
        

  ?>      
      
      

  	 <h3>Welcome Professor, </h3><br><br>
  	 <label><h4>Edit or Create:</h4>

     <form method="POST" action="professorCreateAssessment.php" >
          <select name="createOrModify">
            <option value="create">Create Assessment</option>
            <option value="modify">Modify Existing Assessment</option>
  		    </select>

          <input class="button expand alert" type="submit" value="Select" />
    
     </form>    

        </label><br><br>
  	  	
  		<p> You can view the progress your students have made and see the statistics of the completed S&As on our statistics page:</p>
  		<a href="statspage.php" class = "button expand alert">View Statistics</a>
  		
  		
  </div>

  <div class="small-6 large-2 columns"> Right part of the grid</div>

  
 </div> 

<?php include('inc/footer.php'); ?>
