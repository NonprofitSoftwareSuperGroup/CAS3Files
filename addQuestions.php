<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>

<!-- This page is respobsible for taking data from the professorCreateAssessment page
This page will display the course name and section selected from previous page. The professor 
can select the number of questions that he would like and the page will dynamically display 
a question form the number of forms depends on how many questions the professor wants. 

 -->



<div class="row">

  <div class="small-6 large-3 columns"> 

  <?php

  $course = $_POST['courseSelect'];
  $section = $_POST['sectionSelect'];
  $questions = $_POST['questionSelect'];
  $exam = $_POST['examSelect'];

  ?>

  <div>
  <h4>
  This is the <?php echo $exam ?> assessment
  for course <?php echo $course ?>
  section <?php echo $section ?>
  with <?php echo $questions ?> questions.
  </h4>
  </div>
    
 </div>

    

  <div class = "small-3 large-6 columns">
  

      
    <h3>
    <?php
    //Display page info, course, section, number if questions
    echo $course . " - " . $section . " - Number of questions - " .$questions;
    ?>
    </h3>

      <!-- This is a loop to display correct number of questions spaces to be displayed and filled in -->
      
      <?php for($i = 0; $i < $questions; $i++){ //open for loop to display question space ?>

      <h3> Question: <?php echo $i + 1; ?> </h3>

      <!-- This space is the empty question form -->
      <form action="sendEmails.php" name="#" method="POST">
        <label>
         <input type="text" name="question<?php echo $i+1; ?>" placeholder="Question: <?php echo $i + 1; ?> " /><!-- name added for post -->
        </label>

        <?php for($y = 0; $y < 4; $y++){ //open for loop to display answer space ?>
        <label for="answer">
         <input id="checkbox1" type="checkbox"><label for="checkbox1"><?php echo $y+1; ?></label>
         <input type="answer" name="password" placeholder="Answer<?php echo $y+1; ?>" />
        </label>
        <?php }//closes for loop to display answer spaces ?>

        

      <?php }//closes for loop to display questions ?>

        <input class="center button [tiny small large]" type="submit" value="Create" />
      </form>
  
          
        

  </div>
  <div class="small-6 large-3 columns"> 
  This is the right part
  </div>

  
 </div> 


<script>

  alert("This is the assessment form, fill out the question and answer spaces and then select all correct answers");

</script>


<?php include('inc/footer.php'); ?>