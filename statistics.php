<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample templet page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->


<div class="row">
 <div class="small-6 large-2 columns"> Left part of the grid</div>

  <div class="small-6 large-8 columns">
  <h1> View Statistics For 
    <?php $course = $_POST['courseSelect'];
          $section = $_POST['sectionSelect'];
          echo "$course-$section"; ?>
  </h1>

  	<p> Use this page to create new pages, it was created using foundation 5 CSS framework 
  	so if you should definitely look into that </p>

<?php
 //Retrieve the grades of each student
	$query2 = "SELECT Grade FROM graded_assessments WHERE Course='".$course."' AND Section='".$section."'";
  $result2 = mysql_query($query2) or die(mysql_error());

  //create variable to hold sectional average of correct answers
  $average = 0;

  $x = 0;
  //convoluted way to extract each grade and put it in an array
  while($row = mysql_fetch_array($result2)) {
    foreach($row as $y=>$y_value)
    {
      $gradez[$x] = $y_value;
      $x++;
    }
  }

  $z = 0;  
  //the above method creates duplicates of each entry
  //so this one gets rid of the duplicates
  while ($z < count($gradez)){
    $grades[($z/2)]=$gradez[$z];
    $z+=2;
  }

  //loop through grades
  for ($i = 0; $i < count($grades); $i++)
  {
    //keep running total
    $average += $grades[$i];
    //when the last index is reached, calculate actual average
    if ($i == (count($grades)-1))
    {
      $average /= ($i+1);
    }
  }


  //loop through grades again to fill sqdiffs array
  for ($j = 0; $j < count($grades); $j++)
  {
    $sqdiffs[$j] = pow(($grades[$j]-$average),2);
  }

  //create variable to hold standard deviation
  $stddev = 0;

  //loop through sqdiffs to find actual std dev
  for ($k = 0; $k < count($grades); $k++)
  {
    //keep running total
    $stddev += $sqdiffs[$k];
    //when the last index is reached, calculate actual stddev
    if ($k == (count($grades)-1))
    {
      $stddev = sqrt(($stddev /= ($k+1)));
    }
  }

  //make stddev a little nicer of a number
  $stddev = round($stddev, 2);

  echo "Average score is: $average";
  echo "<br>";
  echo "Standrard deviation is: $stddev";
 ?>

<!-- DEBUG Begin Chart.js Stuff -->
<script src="Chart.js"></script>

<p><canvas id="myChart" width="600" height="400"></canvas></p>

<script type ="text/javascript">
  //get array of grades from PHP above -- good!
  var grades = <?php echo json_encode($grades); ?>;


  //there must be one label per bar
  //so we need to loop through and generate
  //empty space, except for the word grades
  x= 0;
  y = (grades.length)/2;
  z = grades.length;

  var labelz = new Array();
  while (x < y)
  {
    labelz[x] = "";
    x++;
  }

  labelz [y] = "Grades";
  y++;

  while (y < z)
  {
      labelz[y] = "";
      y++;
  }

  var data = {
    labels : labelz,
    datasets : [
    {
      fillColor : "rgba(151,187,205,0.5)",
      strokeColor : "rgba(151,187,205,1)",
      data : grades
    }
    ]
  };
  
  var ctx = document.getElementById("myChart").getContext("2d");
  var myNewChart = new Chart(ctx).Bar(data);
  </script>
  

  </div>

 <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>


<?php include('inc/footer.php'); ?>

