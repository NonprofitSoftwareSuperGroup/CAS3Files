<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>

<dl class="accordion" data-accordion>
  <dd>
    <a href="#panel1">Login</a>
    <div id="panel1" class="content active">
      <dl class="tabs" data-tab>
        <dd class="active"><a href="#panel2-1">Professor</a></dd>
        <dd><a href="#panel2-2">Student</a></dd>
      </dl>
      <div class="tabs-content">
        <div class="content active" id="panel2-1">
          <p>To log in as a professor you will use the username 
          given to you by the Department head. All defaul passwords are set to 
          1234 by default</p>
        </div>
        <div class="content" id="panel2-2">
          <p>To log in as a student you will need a one time key or OTK. This is 
          sent to you by email from your professor. Once your OTK has been used to 
          login and submit an assessment it will no longer be valid. If you need to 
          take another assessment you will need another OTK that corresponds to that 
          course. If your OTK is not functioning please contact the Department Head.</p>
        </div>
      </div>
    </div>
  </dd>
  <dd>
    <a href="#panel2">Other</a>
    <div id="panel2" class="content">
     This space is reserved for other issues that the user might run into.
    </div>
  </dd>
  <dd>
    <a href="#panel3">Report Issues</a>
    <div id="panel3" class="content">
      To report bugs please email admin@CAS3.com
    </div>
  </dd>
</dl>


<?php include('inc/footer.php'); ?>