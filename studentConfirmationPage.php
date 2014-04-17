<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>



<div class="row">
  <div class="small-6 small-centered columns"> <h5>  STUDENT CONFIRMATION PAGE </h5> </div>
</div>





<!--import cas3database.sql and have host be localhost to get this to work -->

<?php 
$course = $_POST["courseSelect"];  

$OTK = $_POST["otk"];

//$db = new mysqli("localhost", "student");

if ($db->connect_errno) //error message if connection fails
{
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
else
{//searches row that matches course selected
$sql = <<<SQL
SELECT otk, otk2, otk3
FROM cas3database.courseotkmatch
WHERE course='$course';
SQL;
//if more that 3 otks are added to a course then the information after select must be changed
if(!$result = $db->query($sql))//error message if query fails
{
    die('There was an error running the query [' . $db->error . ']');
}
$post = array();
while($row = $result->fetch_assoc())
{
	$post[] = $row;//row contents stored in array for comparison
}

$check = true; 

foreach ($post as $row) 
{ 
	foreach ($row as $element)
	{
		if($element==$OTK&&$OTK!='')
		{
			?>

			<div class="row">
  				<div class="small-6 large-centered columns">

			<?php
			echo "Is " .$course. " the correct class?";
			?>

				</div>
			</div>

			<?php
			$check = false;
			//add buttons here

		}
	}
}
if($check == true)
{
	?>

	<div class="row">
  				<div class="small-6 large-centered columns">

			<?php
			echo "Wrong OneTimeKey";
			?>

				</div>
			</div>
			<?php
	}
}

?>
<div class="row">
	<div class="small-3 small-centered columns">
  		<a href="#" class="button expand alert"> Continue </a>
  	</div>	
</div>


<?php include('inc/footer.php'); ?>