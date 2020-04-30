<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Course
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Course
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Course ID
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                        <select name="course_id" class="form-control"><!-- form-control Begin -->
                        
                        <option selected disabled> Select Course </option>
                    
                        <?php 
                    
                        $get_exam_course = "SELECT COLUMN_NAME
                        FROM INFORMATION_SCHEMA.COLUMNS
                        WHERE TABLE_NAME = N'table 20'";
                        $run_exam_course = mysqli_query($con,$get_exam_course);
                    
                        while ($row_course=mysqli_fetch_array($run_exam_course)){
                        
                            $exam_id = $row_course['COLUMN_NAME'];
                            //$course_id = $row_course['course_id'];
                            //$exam_course = $row_course['course_name'];
                            //$department_name = $row_course['department_name'];
                            echo "
                            <option value='$exam_id'>$exam_id</option>
                            ";

                        }
                        ?>
                
                </select>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Course Name
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="course_name" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Department Name
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="department_name" class="form-control"><!-- form-control Begin -->
                        
                                    <option selected disabled> Department Name </option>
                                
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
                        
                            <input value="Submit Course" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['submit'])){
              
              $course_id = $_POST['course_id'];

              $course_name = $_POST['course_name'];


              $department_name = $_POST['department_name'];
              
              $insert_course = "insert into courses (course_id,course_name,department_name) 
                    values ('$course_id','$course_name','$department_name')";
              
              $run_course = mysqli_query($con,$insert_course);
              
              if($run_course){
                  
                  echo "<script>alert('New Course Has Been Inserted')</script>";
                  
                  echo "<script>window.open('index.php?course_insert','_self')</script>";
                  
              }
              else{
                  echo "<script>alert('Insertion of new course failed please retry')</script>";
              }
              
          }

?>



<?php } ?> 