<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_course = "select * from courses";
        
        $run_course = mysqli_query($con,$get_course);
        
        $count_course = mysqli_num_rows($run_course);
        
        $get_department = "select * from departments";
        
        $run_department = mysqli_query($con,$get_department);
        
        $count_department = mysqli_num_rows($run_department);
        
        $get_faculty = "select * from faculty";
        
        $run_faculty = mysqli_query($con,$get_faculty);
        
        $count_faculty = mysqli_num_rows($run_faculty);
        

?>
<!-----
author name:rudra;
copyright: 2020 @rudracorporation;
------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COE</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
        
    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php

                    if(isset($_GET['exam_type'])){
                        include("exam_type.php");
                    }

                    if(isset($_GET['exam_details'])){
                        include("exam_details.php");
                    }

                    if(isset($_GET['exam_timetable'])){
                        include("exam_timetable.php");
                    }

                    if(isset($_GET['exam_timetable_edit'])){
                        include("exam_timetable_edit.php");
                    }

                    if(isset($_GET['exam_timetable_delete'])){
                        include("exam_timetable_delete.php");
                    }

                    if(isset($_GET['exam_details_delete'])){
                        include("exam_details_delete.php");
                    }

                    if(isset($_GET['exam_type_delete'])){
                        include("exam_type_delete.php");
                    }


                    if(isset($_GET['exam_timing_slots'])){
                        include("exam_timing_slots.php");
                    }

                    if(isset($_GET['exam_timing_slot_edit'])){
                        include("exam_timing_slot_edit.php");
                    }

                    if(isset($_GET['fetch_exam_timing_slots'])){
                        include("fetch_exam_timing_slots.php");
                    }

                    if(isset($_GET['exam_slot_delete'])){
                        include("exam_slot_delete.php");
                    }

                    if(isset($_GET['exam_view'])){
                        include("exam_view.php");
                    }

                    if(isset($_GET['faculty_insert'])){
                        include("faculty_insert.php");
                    }

                    if(isset($_GET['faculty_designation'])){
                        include("faculty_designation.php");
                    }

                    if(isset($_GET['faculty_reset_for_sem'])){
                        include("faculty_reset_for_sem.php");
                    }

                    if(isset($_GET['faculty_view_allocation'])){
                        include("faculty_view_allocation.php");
                    }

                    if(isset($_GET['faculty_view'])){
                        include("faculty_view.php");
                    }


                    if(isset($_GET['faculty_edit']))
                    {
                        include("faculty_edit.php");
                    }

                    if(isset($_GET['faculty_delete'])){
                        include("faculty_delete.php");
                    }

                    if(isset($_GET['stream_insert'])){
                        include("stream_insert.php");
                    }

                    if(isset($_GET['stream_view'])){
                        include("stream_view.php");
                    }

                    if(isset($_GET['stream_edit'])){
                        include("stream_edit.php");
                    }

                    if(isset($_GET['stream_delete'])){
                        include("stream_delete.php");
                    }

                    if(isset($_GET['department_insert'])){
                        include("department_insert.php");
                    }

                    if(isset($_GET['department_view'])){
                        include("department_view.php");
                    }

                    if(isset($_GET['department_delete'])){
                        include("department_delete.php");
                    }

                    if(isset($_GET['department_edit'])){
                        include("department_edit.php");
                    }

                    if(isset($_GET['batch_insert'])){
                        include("batch_insert.php");
                    }

                    if(isset($_GET['batch_view'])){
                        include("batch_view.php");
                    }

                    if(isset($_GET['batch_delete'])){
                        include("batch_delete.php");
                    }

                    if(isset($_GET['batch_edit'])){
                        include("batch_edit.php");
                    }

                    

                    if(isset($_GET['course_insert'])){
                        include("course_insert.php");
                    }

                    if(isset($_GET['course_view'])){
                        include("course_view.php");
                    }

                    if(isset($_GET['course_delete'])){
                        include("course_delete.php");
                    }

                    if(isset($_GET['course_edit'])){
                        include("course_edit.php");
                    }

                    if(isset($_GET['block_insert'])){
                        include("block_insert.php");
                    }

                    if(isset($_GET['block_view'])){
                        include("block_view.php");
                    }

                    if(isset($_GET['block_delete'])){
                        include("block_delete.php");
                    }

                    if(isset($_GET['block_edit'])){
                        include("block_edit.php");
                    }

                    if(isset($_GET['lab_insert'])){
                        include("lab_insert.php");
                    }

                    if(isset($_GET['lab_view'])){
                        include("lab_view.php");
                    }

                    if(isset($_GET['lab_delete'])){
                        include("lab_delete.php");
                    }

                    if(isset($_GET['lab_edit'])){
                        include("lab_edit.php");
                    }

                    if(isset($_GET['report_student_block_allocation'])){
                        include("report_student_block_allocation.php");
                    }

                    if(isset($_GET['report_student_block_allocation_pdf'])){
                        include("report_student_block_allocation_pdf.php");
                    }

                    if(isset($_GET['report_supervision_allocation_pdf'])){
                        include("report_supervision_allocation_pdf.php");
                    }

                    if(isset($_GET['report_student_block_allocation_delete'])){
                        include("report_student_block_allocation_delete.php");
                    }
                    
                    if(isset($_GET['report_supervision_allocation'])){
                        include("report_supervision_allocation.php");
                    }

                    if(isset($_GET['report_supervision_allocation_delete'])){
                        include("report_supervision_allocation_delete.php");
                    }

                    if(isset($_GET['mail_students'])){
                        include("mail_students.php");
                    }
                   
                    if(isset($_GET['mail_supervisors'])){
                        include("mail_supervisors.php");
                    }


                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }      if(isset($_GET['view_users'])){
                        
                        include("view_users.php");
                        
                }   if(isset($_GET['delete_user'])){
                        
                        include("delete_user.php");
                        
                }   if(isset($_GET['insert_user'])){
                        
                        include("insert_user.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        
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