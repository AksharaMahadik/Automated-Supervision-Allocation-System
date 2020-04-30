<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Allocate Designation
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i>  Allocate Designation
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Faculty Name
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <select name="faculty_name" class="form-control"><!-- form-control Begin -->
                            
                                <option selected disabled> Faculty Name </option>
                            
                                <?php 
                            
                                $get_faculty = "select * from faculty";
                                $run_faculty = mysqli_query($con,$get_faculty);
                            
                                while ($row_faculty=mysqli_fetch_array($run_faculty)){
                                
                                    $faculty_id = $row_faculty['faculty_id'];
                                    $faculty_name = $row_faculty['faculty_name'];
                                    echo "
                                    <option value='$faculty_id'>$faculty_name</option>
                                    ";
                                }
                                ?>
                        
                            </select>
                            
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                   

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Designation
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <select name="designation" class="form-control"><!-- form-control Begin -->
                                
                                <option selected disabled>Designation</option>
                                <option value="Jr. Supervisor">Jr. Supervisor</option>
                                <option value="Sr. Supervisor">Sr. Supervisor</option>
                                <option value="Fly. Squad">Flying Squad</option>
                        
                            </select>
                            
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Submit Faculty" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['submit'])){
              $faculty_name = $_POST['faculty_name'];

              $designation = $_POST['designation'];

              if($designation == 'Fly. Squad'){
                
                $insert_faculty = "UPDATE `faculty` SET `Exam_Condution_Duty`='$designation',`total_supervision_per_sem`=6,`total_supervision_per_sem_remain`=0,`UT1`=0,
                    `UT1_remain`=0,`UT2`=0,`UT2_remain`=0,`ESE`=6,`ESE_remain`=0 WHERE faculty_id = '$faculty_name'";
                
              }else if($designation == 'Jr. Supervisor'){

                $insert_faculty = "UPDATE `faculty` SET `Exam_Condution_Duty`='$designation',`total_supervision_per_sem`=15,`total_supervision_per_sem_remain`=0,`UT1`=3,
                    `UT1_remain`=0,`UT2`=3,`UT2_remain`=0,`ESE`=9,`ESE_remain`=0 WHERE faculty_id = '$faculty_name'";

              }else if($designation == 'Sr. Supervisor'){

                $insert_faculty = "UPDATE `faculty` SET `Exam_Condution_Duty`='$designation',`total_supervision_per_sem`=12,`total_supervision_per_sem_remain`=0,`UT1`=3,
                    `UT1_remain`=0,`UT2`=3,`UT2_remain`=0,`ESE`=6,`ESE_remain`=0 WHERE faculty_id = '$faculty_name'";

              }
              $run_faculty = mysqli_query($con,$insert_faculty);
              
              if($run_faculty){
                  
                  echo "<script>alert('Faculty Has Been Updated')</script>";
                  
                  echo "<script>window.open('index.php?faculty_designation','_self')</script>";
                  
              }
              else{
                echo "<script>alert('Updation of faculty failed please retry')</script>";
            }
              
          }

?>



<?php } ?> 