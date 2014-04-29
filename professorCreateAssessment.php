<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>

<!-- This page is responsible for taking data from the professor. 

Professor enters what course they want to create an assessment for and choose a section
After clicking continue an assessment object should be created with the attributes of

name: course name
section: course section

 -->

<div class="row">

  <div class="small-6 large-3 columns"> Left part of the grid</div>


  <form method="POST" action="addQuestions.php" >
    <div class = "small-3 large-6 columns">
         <h3>Create Assessment</h3><br><br>
         <label>Course: 
          <select name="courseSelect"> <!-- Added name -->
            <option value="CMPT-280">CMPT-280</option>
            <option value="CMPT-281">CMPT-281</option>
            <option value="CMPT-371">CMPT-371</option>
            <option value="CMPT-372">CMPT-372</option>
          </select>
        </label>

        <label>Section: 
        <!--  use for loop to display more -->
          <select name="sectionSelect"> <!-- Added name -->
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </label>

        <label>Number of Questions: 
          <!--  use for loop to display more -->
          <select name="questionSelect"> <!-- Added name -->
          <?php for($i = 1; $i <= 50; $i++){ //open for loop to display email space ?>  
            <option value="<?php echo $i ?>"> <?php echo $i ?> </option>
          <?php }//closes for loop to display questions ?>  
          </select>

        </label>

        <label>Number of Questions: 
          <!--  use for loop to display more -->
          <select name="examSelect"> <!-- Added name -->
            <option value="entry">ENTRY</option>
            <option value="exit">EXIT</option>
          </select>

        </label>

    
        <div class="small-6 small-centered columns">
          <input class="center button [tiny small large]" type="submit" value="Create" />
        </div>  
  </form>
         
          
      </div>



  <div class="small-6 large-3 columns"> 
  This is the right part
  </div>

  
 </div> 





<?php include('inc/footer.php'); ?>
