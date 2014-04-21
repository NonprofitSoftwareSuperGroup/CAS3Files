<?php include('inc/header.php'); ?>

<script type="text/javascript" src="js/custom.js"></script>

<div class="row">
  <div class="small-10 small-left columns"> <p>This is a sample question, if you need help you can click the HELP button in the upper left corner at
 anytime.</p> </div>
</div>


  <div class="row">
    <div class="large-6 columns">
      <label style="color: red"> Select Answer A then hit continue</label>
	  <input type="radio" name="ans" value="correct" id="ans"><label for="ans">Answer A</label><br>
      <input type="radio" name="ans" value="wrong" id="ans"><label for="ans">Answer B</label><br>
      <input type="radio" name="ans" value="wrong" id="ans"><label for="ans">Answer C</label><br>
	  <input type="radio" name="ans" value="wrong" id="ans"><label for="ans">Answer D</label><br>
      <a href="#" onclick="answer();return false;"
	  class="button [tiny small large]">Continue</a>
    </div>
  </div>

<?php include('inc/footer.php'); ?>