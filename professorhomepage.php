<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>

<div class="row">

  <div class="small-6 large-2 columns"> Left part of the grid</div>

  <div class = "small-3 large-6 columns">


  <?php  
  //Code to display professor traits

  if(isset($_POST['username']) && isset($_POST['password']))
{
        $username = $_POST['username'];
        $password = $_POST['password'];

        $prof = new $Professor($username, $password);

        $query = "SELECT * FROM professor WHERE username='".$username."' AND password='".$password."' LIMIT 1";
        $result = mysql_query($query) or die(mysql_error());

        if(mysql_num_rows($result) == 1){

          echo "Thanks for logging in";

          print "<script>";
          print ' window.open("professorhomepage.php","_self","false") ';
          print "</script>";

          $un = "SELECT * FROM professor WHERE username='".$username."'' LIMIT 1";

        }else{
          echo "invalid login info";
        }

 }
       
        

  ?>      
      
      

  	 <h3>Welcome Professor, </h3><br><br>
  	 <label><h4>Edit Your Assessments:</h4>

     <form method="POST" action="professorCreateAssessment.php" >
          <select name="createOrModify">
            <option value="create">Create Assessment</option>
            <option value="modify">Modify Existing Assessment</option>
  		    </select>

          <input class="center button [tiny small large]" type="submit" value="Create" />
    
     </form>    

        </label><br><br>
  	  	
  		<p> You can view the progress your students have made and see the statistics of the completed S&As on our statistics page:</p>
  		<a href="statspage.php" class = "button [tiny small large]">View Statistics</a>
  		
  		
  </div>

  <div class="small-6 large-2 columns"> Right part of the grid</div>

  
 </div> 

<?php include('inc/footer.php'); ?>
