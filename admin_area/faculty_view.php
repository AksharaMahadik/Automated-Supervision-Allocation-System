    <?php 
        
        if(!isset($_SESSION['admin_email'])){
            
            echo "<script>window.open('login.php','_self')</script>";
            
        }else{

    ?>

    <div class="row"><!-- row 1 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <ol class="breadcrumb"><!-- breadcrumb begin -->
                <li class="active"><!-- active begin -->
                    
                    <i class="fa fa-dashboard"></i> Dashboard / View Faculty
                    
                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags"></i>  View Faculty
                    
                </h3><!-- panel-title finish --> 
                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->
                    <div class="table-responsive"><!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                            <thead><!-- thead begin -->
                                <tr><!-- tr begin -->
                                    <th> No: </th>
                                    <th> Faculty ID: </th>
                                    <th> Faculty Name: </th>
                                    <th> Designation: </th>
                                    <th> Department Name: </th>
                                    <th> Email:</th>
                                    <th> Delete Faculty:</th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody><!-- tbody begin -->
                                
                                <?php 

                                    $i=0;
                                
                                    $get_faculty = "select * from faculty order by id";
                                    
                                    $run_faculty = mysqli_query($con,$get_faculty);

                                    while($row_faculty=mysqli_fetch_array($run_faculty)){
                                        
                                        $faculty_id = $row_faculty['faculty_id'];
                                        
                                        $faculty_name = $row_faculty['faculty_name'];
                                        
                                        $designation = $row_faculty['designation'];

                                        $department_name = $row_faculty['department_name'];
                                        
                                        $contact = $row_faculty['contact'];

                                        $email = $row_faculty['email'];

                                        $i++;

                                ?>

                                <tr><!-- tr begin -->
                                    <td> <?php echo $i; ?> </td>
                                    <td> <?php echo $faculty_id; ?> </td>
                                    <td> <?php echo $faculty_name; ?> </td>
                                    <td> <?php echo $designation; ?> </td>
                                    <td> <?php echo $department_name?></td>
                                    <td> <?php echo $email?></td>
                                    
                                    <td> 

                                        <a href="index.php?faculty_delete=<?php echo $faculty_id; ?>">

                                            <i class="fa fa-trash-o"></i> Delete

                                        </a> 

                                    </td>
                                </tr><!-- tr finish -->
                                
                                <?php } ?>
                                
                            </tbody><!-- tbody finish -->
                            
                        </table><!-- table table-striped table-bordered table-hover finish -->
                    </div><!-- table-responsive finish -->
                </div><!-- panel-body finish -->
                
            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

    <?php } ?>