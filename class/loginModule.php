<?php

//Professor login module 


if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

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