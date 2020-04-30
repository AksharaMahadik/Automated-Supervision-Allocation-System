<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->

            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button><!-- navbar-toggle finish -->

        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>

    </div><!-- navbar-header finish -->

    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->

        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                
                <i class="fa fa-user"></i> <?php echo $admin_name;  ?> <b class="caret"></b>
                
            </a><!-- dropdown-toggle finish -->
            
            <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
               
                
                <li class="divider"></li>
                
                <li><!-- li begin -->
                    <a href="logout.php"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li><!-- li begin -->
                <a href="index.php?dashboard"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#exams"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> EXAMS
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="exams" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?exam_type"> Insert Exam Type </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?exam_details"> Insert Exam Details </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?exam_timetable"> Insert Exam Time Table </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?exam_timing_slots"> Insert Timing slots </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#faculty"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-edit"></i> Faculty
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="faculty" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?faculty_insert"> Insert Faculty </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?faculty_designation"> Allocate Designation to Faculty </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?faculty_reset_for_sem"> Faculty Reset For Sem </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?faculty_view_allocation"> Allocation View </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?faculty_view"> View Faculty </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#stream"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Stream
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="stream" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?stream_insert"> Insert Stream </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?stream_view"> View Stream </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->            

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#department"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Department
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="department" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?department_insert"> Insert Department </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?department_view"> View Department </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#batches"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Batches
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="batches" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?batch_insert"> Insert Batches </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?batch_view"> View Batches </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#course"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Course
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="course" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?course_insert"> Insert Course </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?course_view"> View Course </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#blocks"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Blocks
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="blocks" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?block_insert"> Insert Block </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?block_view"> View Block </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#labs"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Labs
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="labs" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?lab_insert"> Insert Lab </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?lab_view"> View Lab </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->


            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#reports"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Reports
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="reports" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?report_student_block_allocation"> Student Block Allocation </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?report_supervision_allocation"> Supervisor Allocation </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#mail"><!-- a href begin -->
                    <i class="fa fa-fw fa-edit"></i> Mail
                    <i class="fa fa-fw fa-caret-down"></i>
                </a><!-- a href finish -->

                <ul id="mail" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?mail_students"> To Students </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?mail_supervisors"> To Supervisors </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="logout.php"><!-- a href begin -->
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->


<?php } ?>