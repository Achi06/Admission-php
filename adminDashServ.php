<?php

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'admission');
  
  $studentDetails_query = "SELECT * FROM applicant";
  $student_table = mysqli_query($db, $studentDetails_query);

  if (isset($_POST['invite'])) {
    
    $invite_id= $_POST['invite'];
    $invite_query = "UPDATE applicant SET status='Invited' WHERE appl_no='$invite_id'";
    mysqli_query($db, $invite_query);
    header("Refresh:0");
  }

  if (isset($_POST['enroll'])) {
    
    $enroll_id= $_POST['enroll'];
    $enroll_query = "UPDATE applicant SET status='Enrolled' WHERE appl_no='$enroll_id'";
    mysqli_query($db, $enroll_query);
    header("Refresh:0");
  }

?>