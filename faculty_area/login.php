<?php 

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COE</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Faculty Login </h2>
           
           <input type="text" class="form-control" placeholder="User Id" name="faculty_id" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="faculty_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="faculty_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>


<?php 

    if(isset($_POST['faculty_login'])){
        
        $faculty_id = mysqli_real_escape_string($con,$_POST['faculty_id']);
        
        $faculty_pass = mysqli_real_escape_string($con,$_POST['faculty_pass']);
        
        $get_faculty = "select * from faculty where faculty_id ='$faculty_id' AND password='$faculty_pass'";
        
        $run_faculty = mysqli_query($con,$get_faculty);
        
        $count = mysqli_num_rows($run_faculty);
        
        if($count==1){
            
            $_SESSION['faculty_id']=$faculty_id;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
            
            echo "<script>alert('Email or Password is Wrong !')</script>";
            
        }
        
    }

?>