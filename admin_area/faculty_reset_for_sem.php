<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Reset Faculty
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Reset Faculty
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Reset Faculty" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['submit'])){
              $designation = "Jr. Supervisor";
              {
                
                $reset_faculty = "UPDATE `faculty` SET `Exam_Condution_Duty`='$designation',`total_supervision_per_sem`=15,`total_supervision_per_sem_remain`=0,`UT1`=3,
                    `UT1_remain`=0,`UT2`=3,`UT2_remain`=0,`ESE`=9,`ESE_remain`=0 WHERE designation<>'Director'";

              }
              $run_faculty = mysqli_query($con,$reset_faculty);
              
              if($run_faculty){
                  
                  echo "<script>alert('Faculty Has Been Reseted')</script>";
                  
                  echo "<script>window.open('index.php?faculty_reset_for_sem','_self')</script>";
                  
              }
              else{
                echo "<script>alert('Resetting of faculty failed please retry')</script>";
            }
              
          }

?>



<?php } ?> 