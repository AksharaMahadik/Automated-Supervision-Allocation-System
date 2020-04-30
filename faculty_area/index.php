<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['faculty_id'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $faculty_id = $_SESSION['faculty_id'];
        
        $get_faculty = "select * from faculty where faculty_id='$faculty_id'";
        
        $run_faculty = mysqli_query($con,$get_faculty);
        
        $row_faculty = mysqli_fetch_array($run_faculty);
        
        $faculty_email = $row_faculty['email'];

        $faculty_name = $row_faculty['faculty_name'];
        
        $department_name = $row_faculty['department_name'];

        $designation = $row_faculty['designation'];
        
        $faculty_image = $row_faculty['faculty_img'];
         
        $faculty_contact = $row_faculty['contact'];


    
            


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
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        
                }   if(isset($_GET['faculty_view_allocation'])){

                        include("faculty_view_allocation.php");

                }    if(isset($_GET['faculty_manage_allocation'])){
                     
                        include("faculty_manage_allocation.php");
                
                }    if(isset($_GET['faculty_manage_allocation_delete'])){

                        include('faculty_manage_allocation_delete.php');
                
                }   if(isset($_GET['faculty_manage_request'])){

                        include('faculty_manage_request.php');
                }
                if(isset($_GET['faculty_manage_allocation_accept'])){
                    include('faculty_manage_allocation_accept.php');
                }
                if(isset($_GET['faculty_manage_allocation_reject'])){
                    include('faculty_manage_allocation_reject.php');
                }
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>       
</body>
</html>


<?php } ?>