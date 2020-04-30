<?php 

    if(!isset($_SESSION['faculty_id'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<?php
    $user_11 = $_SESSION['faculty_id'];

    if(isset($_GET['user_profile'])){
        
        $edit_user = $_GET['user_profile'];
        
        $get_user = "select * from faculty where faculty_id='$edit_user'";
        
        $run_user = mysqli_query($con,$get_user);
        
        $row_user = mysqli_fetch_array($run_user);
        
        $user_id = $row_user['faculty_id'];
        
        $user_name = $row_user['faculty_name'];
        
        $user_job = $row_user['designation'];
        
        $user_department = $row_user['department_name'];

        $user_contact = $row_user['contact'];
        
        $user_email = $row_user['email'];
        
        $user_pass = $row_user['password'];
        
        $user_image = $row_user['faculty_img'];
        
    }

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit User
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit User
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Username </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $user_name; ?>" name="user_name" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> E-mail </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $user_email; ?>"  name="user_email" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $user_pass; ?>"  name="user_pass" type="password" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Department Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                        <select name="user_department" class="form-control"><!-- form-control Begin -->
                        
                            <option selected><?php echo $user_department; ?>  </option>
                        
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

                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $user_contact;?>"  name="user_contact" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Designation </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $user_job;?>"  name="user_job" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Image </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="user_image" type="file" class="form-control">
                          
                          <img src="admin_images/<?php echo $faculty_image; ?>" alt="<?php echo $faculty_name; ?>" width="70" height="70">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update User" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->


<?php 

if(isset($_POST['update'])){
    
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_department = $_POST['user_department'];
    $user_contact = $_POST['user_contact'];
    $user_job = $_POST['user_job'];
    
    $user_image = $_FILES['user_image']['name'];
    $temp_faculty_image = $_FILES['user_image']['tmp_name'];
    
    move_uploaded_file($temp_faculty_image,"faculty_images/$user_image");
    
    $update_user = "update faculty set faculty_name='$user_name',email='$user_email',password='$user_pass',department_name='$user_department',
    contact='$user_contact',designation='$user_job',faculty_img='$user_image' where faculty_id='$edit_user'";
    
    $run_user = mysqli_query($con,$update_user);
    
    if($run_user){
        
        echo "<script>alert('User has been updated sucessfully')</script>";
        echo "<script>window.open('login.php','_self')</script>";
        
        session_destroy();
        
    }
    
}

?>


<?php } ?>