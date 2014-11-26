<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>

<!--  This is the home page, this is where a user can login as either a professor or student -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
  <div class="small-6 large-2 columns"> Left part of the grid

  

  </div>
  <div class="small-6 large-8 columns">

  
  <!-- Sends input from the profesor fields to professorhomepage.php -->
  <form action="index.php" name="profForm" method="POST">

  <div class="row">
    <div class="large-6 columns">
      <label>Professor login
        <input type="text" name="username" placeholder="Username" />
      </label>
      <label>
        <input type="password" name="password" placeholder="Password" />
      </label>
      <input class="button expand alert" type="submit" value="Login" />
    </div>
  </div>
  </form>

  
  <form action="index.php" name="studentForm" method="POST">

  <div class="row">
    <div class="large-4 columns">
      <label>Student Login
        <input type="password" name="otk" placeholder="OneTimeKey" />
      </label>

    </div>
  </div>


  <div class="row">
    <div class="large-6 columns">
      <label>Course Name
        <select name="courseSelect"> 
          <option value="CMPT-280">CMPT-280</option>
          <option value="CMPT-281">CMPT-281</option>
          <option value="CMPT-371">CMPT-371</option>
          <option value="CMPT-372">CMPT-372</option>
        </select>
      </label>
	</div>
  </div>
  <div class="row">
    <div class="large-6 columns">
      <label>Course Section
        <select name="courseSection"> 
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </label>
      <input class="button expand alert" type="submit" value="Login" />
    </div>
  </div>
  
</form>

 <?php include('class/loginModule.php'); ?>

</div>
  <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>





<?php include('inc/footer.php'); ?>

    
    
