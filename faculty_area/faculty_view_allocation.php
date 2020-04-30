<?php 
    
    if(!isset($_SESSION['faculty_id'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        $faculty_id = $_SESSION['faculty_id'];
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Faculty View Allocation
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Faculty View Allocation
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Exam Type:</th>
                                <th> Exam Date: </th>
                                <th> Time: </th>
                                <th> Location:</th>
                                <th> Side: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                //$get_batches = "select * from batches order by stream_name ASC, department_name ASC";
                                $get_details_of_allocation = "SELECT * FROM `supervision_block_allocation_final` where faculty_id = '$faculty_id'";
                                
                                //$run_batches = mysqli_query($con,$get_batches);
                                $run_get_details_of_allocation = mysqli_query($con,$get_details_of_allocation);

                                while($row_details=mysqli_fetch_array($run_get_details_of_allocation)){
                                    
                                    $exam_type = $row_details['exam_type'];

                                    $exam_date = $row_details['exam_date'];
                                    
                                    $time = $row_details['time'];

                                    $location = $row_details['class_room'];

                                    $location .= "<br>".$row_details['department_name'];

                                    $side = $row_details['side'];

                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $exam_type; ?> </td>
                                <td> <?php echo $exam_date; ?> </td>
                                <td> <?php echo $location;?></td>
                                <td> <?php echo $time; ?> </td>
                                <td> <?php echo $side;?></td>
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