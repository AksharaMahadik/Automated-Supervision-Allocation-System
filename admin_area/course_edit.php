<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['course_edit'])){
        
        $edit_course_id = $_GET['course_edit'];
        
        $edit_course_query = "select * from courses where course_id='$edit_course_id'";
        
        $run_edit = mysqli_query($con,$edit_course_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $course_id = $row_edit['course_id'];
        
        $course_name = $row_edit['course_name'];
        
        $department_name = $row_edit['department_name'];
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Course
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Course
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Course ID    
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $course_id; ?>" name="course_id" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Course Name   
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $course_name; ?>" name="course_name" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Department Name
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="department_name" class="form-control"><!-- form-control Begin -->
                        
                                    <option selected><?php echo $department_name; ?>  </option>
                                
                                    <?php 
                                
                                    $get_department = "select * from departments";
                                    $run_department = mysqli_query($con,$get_department);
                                
                                    while ($row_department=mysqli_fetch_array($run_department)){
                                    
                                        $department_id = $row_department['department_id'];
                                        $department_name = $row_department['department_name'];
                                        echo "
                                        <option value='$department_name'> $department_name </option>
                                        ";
                                    }
                                    ?>
                            
                            </select>
                        </div>
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update Department" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['update'])){
              
              $course_id = $_POST['course_id'];
              
              $course_name = $_POST['course_name'];

              $department_name = $_POST['department_name'];

                
                $update_department = "update courses set course_id='$course_id',course_name='$course_name',department_name='$department_name' where course_id='$edit_course_id'";
                
                $run_department = mysqli_query($con,$update_department);
                
                if($run_department){
                    
                    echo "<script>alert('Your Course Has Been Updated')</script>";
                    
                    echo "<script>window.open('index.php?course_view','_self')</script>";
                    
                }
              
              
          }

?>



<?php } ?> 