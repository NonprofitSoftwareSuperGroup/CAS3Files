<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>

<!--  This is the home page, this is where a user can login as either a professor or student -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
  <div class="small-6 large-2 columns"> Left part of the grid

  

  </div>
  <div class="small-6 large-8 columns">
  <!--  This is where the login form will go -->
  
  <!-- Before there was one form and now there are two -->
  
  <!-- Sends input from the profesor fields to professorhomepage.php -->
  <form action="professorhomepage.php" name="profForm" method="POST">

  <div class="row">
    <div class="large-6 columns">
      <label>Professor login
        <input type="text" name="username" placeholder="Username" /><!-- name added for post -->
      </label>
      <label>
        <input type="text" name="password" placeholder="Password" />
      </label>
      <a href="javascript:document.profForm.submit()"
	  class="button [tiny small large]">Professor Login</a>
	  <!-- javascript used so post can be used instead of get -->
    </div>
  </div>
  </form>
  
  <form action="studentConfirmationPage.php" name="studentForm" method="POST">

  <div class="row">
    <div class="large-4 columns">
      <label>Student Login
        <input type="text" name="otk" placeholder="OneTimeKey" />
      </label>

    </div>
  </div>


  <div class="row">
    <div class="large-6 columns">
      <label>Course Selection
        <select name="courseSelect"> <!-- Added name -->
          <option value="CMPT-280">CMPT-280</option>
          <option value="CMPT-281">CMPT-281</option>
          <option value="CMPT-371">CMPT-371</option>
          <option value="CMPT-372">CMPT-372</option>
        </select>
      </label>
      <a href="javascript:document.studentForm.submit()" 
	  class="button [tiny small large]">Student Login</a>
    </div>
  </div>
  
</form>

</div>
  <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>





<?php include('inc/footer.php'); ?>

    
    