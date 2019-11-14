<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'admission');

// LOGIN USER
if (isset($_POST['login_user'])) {
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
           echo  $user['role'];
          $_SESSION['username'] = $username;
          $_SESSION['role']= $user['role'];
          if($user['role'] == 'student'){
            header('location: student.php');
          }
          else{
              header('location: admin.php');
          }
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  
?>