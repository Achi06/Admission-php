<?php
function console_log( $data ){
   echo '<script>';
   echo 'console.log('. json_encode( $data ) .')';
   echo '</script>';
 }

console_log($_SESSION);
// initializing variables
$username= $_SESSION['username'];
$userId = "";
$admissionYr= "";
console_log($username);
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'admission');

if(isset($_POST['stud_details']))
{
   //form has been submitted
   // receive all input values from the form
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $middleName = mysqli_real_escape_string($db, $_POST['middleName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $Dob = mysqli_real_escape_string($db, $_POST['Dob']);
  // admissionYr is radio button
  if(!empty($_POST['admissionYr'])) {
    $admissionYr = $_POST['admissionYr'];
    }
  $department = mysqli_real_escape_string($db, $_POST['department']);
  $math = mysqli_real_escape_string($db, $_POST['math']);
  $chem = mysqli_real_escape_string($db, $_POST['chem']);
  $phy = mysqli_real_escape_string($db, $_POST['phy']);
  $aie = mysqli_real_escape_string($db, $_POST['aie']);
  $cet = mysqli_real_escape_string($db, $_POST['cet']);
 
   // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstName)) { array_push($errors, "First name is required"); }
  if (empty($middleName)) { array_push($errors, "Middle name is required"); }
  if (empty($lastName)) { array_push($errors, "Last name is required"); }
  if (empty($Dob)) { array_push($errors, "Date of birth is required"); }
  // admissionYr is radio button
  if (empty($_POST['admissionYr'])) { array_push($errors, "Admission Year is required"); }
  if (empty($department)) { array_push($errors, "Department is required"); }
  if (empty($math && $chem && $phy)) { array_push($errors, "Marks are required"); }

$user_check_id="SELECT * FROM users WHERE username='$username' LIMIT 1";
$result = mysqli_query($db, $user_check_id);
$user = mysqli_fetch_assoc($result);

$userId=$user['id'];

//Insert Values in the Database if no errors
  if (count($errors) == 0) {
  $query = "INSERT INTO applicant (id, firstName, middleName, lastName, 
                                  Dob, admissionYr, department, math, chem, phy, aie, cet, status)
                            VALUES('$userId', '$firstName', '$middleName', '$lastName',
                                  '$Dob', '$admissionYr', '$department', $math, $chem, $phy, $aie, $cet, 'Submitted')";
  mysqli_query($db, $query);
  //die(mysqli_error($db));
  //die(mysqli_error( $res));
  }
}
else{
   
}
?>