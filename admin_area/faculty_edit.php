<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['faculty_edit'])){
        
        $edit_faculty_id = $_GET['faculty_edit'];
        
        $edit_faculty_query = "select * from faculty where faculty_id='$edit_faculty_id'";
        
        $run_edit = mysqli_query($con,$edit_faculty_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $faculty_id = $row_edit['faculty_id'];
        
        $faculty_name = $row_edit['faculty_name'];
        
        $designation = $row_edit['designation'];

        $department_name = $row_edit['department_name'];
    
        $contact = $row_edit['contact'];

        $email = $row_edit['email'];
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Faculty
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Faculty
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Faculty ID    
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $faculty_id; ?>" name="faculty_id" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Faculty Name   
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $faculty_name; ?>" name="faculty_name" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                        <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Designation   
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $designation; ?>" name="designation" type="text" class="form-control">
                        
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

                            Contact 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $contact; ?>" name="contact" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Email
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $email; ?>" name="email" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update Faculty" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['update'])){
              
              $faculty_id = $_POST['faculty_id'];
              
              $faculty_name = $_POST['faculty_name'];

              $designation = $_POST['designation'];

              $department_name = $_POST['department_name'];

              $contact = $_POST['contact'];

              $email = $_POST['email'];
                
                $update_faculty = "update faculty set faculty_id='$faculty_id',faculty_name='$faculty_name',designation = '$designation',
                    department_name='$department_name', contact = '$contact', email = '$email'  where faculty_id='$edit_faculty_id'";
                
                $run_faculty = mysqli_query($con,$update_faculty);
                
                if($run_faculty){
                    
                    echo "<script>alert('Faculty Information Has Been Updated')</script>";
                    
                    echo "<script>window.open('index.php?faculty_view','_self')</script>";
                    
                }
              
              
          }

?>



<?php } ?> 