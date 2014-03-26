<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>

<!-- This page is respobsible for taking data from the professor. 

Professor enters what course they want to create an assessment for and choose a section
After clicking continue an assessment object should be created with the attributes of

name: course name
section: course section

 -->

<div class="row">

  <div class="small-6 large-3 columns"> Left part of the grid</div>

    

  
  <?php

  $createOrMod = $_POST['createOrModify'];  
  $value = (string)$createOrMod;

  if($value == "create")
  {

  ?>

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
          <select name="sectionSelect"> <!-- Added name -->
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </label>

    
        <div class="small-6 small-centered columns">
          <a href="#" class="button expand alert"> Continue </a>
        </div>  

          
          
      </div>


  <?php

  } else {
  
  ?>


   <div class="small-3 large-6 columns"> 
  This will be the home to the edit/modify assessment page
  </div>


  <?php

  }

  ?>



  <div class="small-6 large-3 columns"> 
  This is the right part
  </div>

  
 </div> 





<?php include('inc/footer.php'); ?>