<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample question page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 <div class="small-6 large-2 columns"> Left part of the grid</div>

 
  <form method="POST" action="modify.php" >
    <div class = "small-3 large-6 columns">
         <h3>Modify Assessment</h3><br><br>
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

	<div class="small-6 small-centered columns">
          <input class="center button [tiny small large]" type="submit" value="Modify" />
        </div>
	</form>

	</div>
 <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>


<?php include('inc/footer.php'); ?>