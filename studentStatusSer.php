<?php

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }



  $username= $_SESSION['username'];

  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'admission');
  
  $student_check_id="SELECT * FROM users WHERE username='$username' LIMIT 1";
  $output = mysqli_query($db, $student_check_id);
  $student = mysqli_fetch_assoc($output);
  
  $student_id=$student['id'];
  
  $find_query = "SELECT * FROM applicant WHERE id='$student_id' ";
  $table_ans = mysqli_query($db, $find_query);

  if (isset($_POST['accept'])) {
    
    $accept_id= $_POST['accept'];
    $accept_query = "UPDATE applicant SET status='Accepted' WHERE appl_no='$accept_id'";
    mysqli_query($db, $accept_query);
    header("Refresh:0");
  }

  if (isset($_POST['reject'])) {
    
    $reject_id= $_POST['reject'];
    $reject_query = "UPDATE applicant SET status='Rejected' WHERE appl_no='$reject_id'";
    mysqli_query($db, $reject_query);
    header("Refresh:0");
  }
?>