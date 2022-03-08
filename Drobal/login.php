<?php
include("connection.php");
// LOGIN USER
if($_POST)
{
    $email = $_POST['email'];
    $password = $_POST['password'];
  
   /* if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }*/
  
    //if (count($errors) == 0) {
        //$password = md5($password);
        //$query = ;
        $results = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");

        $sql = mysqli_fetch_array($results);

        //User
        echo $sql['email'];
       if($sql['email'] == $email && $sql['password'] == $password && $sql['admin_confirmation'] == 'approved')
        {
            //redirect to the user panel
           header('location:user.php');
            //echo "Login";
        }
        //admin
        else if($sql['email'] == 'admin@gmail.com' && $sql['password'] == 'admin' && $sql['admin_confirmation'] == 'admin')
        {
            //redirect to the admin panel
           header('location:admin.php');
           //echo "Admin";
        }
        //waiting for approval
        else if($sql['admin_confirmation'] == 'waiting')
        {
            echo "<h5 style='text-align:center;'>User is not approved by admin yet.</h5>"."<hr>";
        }
        //error
        else
        {
            echo "<h5 style='text-align:center;'>Wrong password or usernsme!!!</h5>";
        }

        /*if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $first_name;
          $_SESSION['success'] = "You are now logged in";
          header('location: admin.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }*/
    //}
  }
  ?>

