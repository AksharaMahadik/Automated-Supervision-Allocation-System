<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php
//index.php
$exam_type = '';
$query = "SELECT exam_type_title FROM exam_type GROUP BY exam_type_title ORDER BY exam_type_title ASC";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $exam_type .= '<option value="'.$row["exam_type_title"].'">'.$row["exam_type_title"].'</option>';
}
?>

<?php 

    if(isset($_GET['exam_timetable_edit'])){
        
        $edit_exam_timing_slot = $_GET['exam_timetable_edit'];
        
        $edit_exam_timing_slot_query = "select * from exam_timetable where id ='$edit_exam_timing_slot'";
        
        $run_edit = mysqli_query($con,$edit_exam_timing_slot_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $exam_type = $row_edit['exam_type']; 

        $exam_day = $row_edit['exam_day'];

        $exam_session = $row_edit['exam_session'];

        $exam_course_name = $row_edit['course_name'];

        $exam_batch_name = $row_edit['batch_name'];

        $bench_side = $row_edit['bench_side'];

        $exam_start = $row_edit['start_time'];

        $exam_end = $row_edit['end_time'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Exam Timing Slots
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Exam Timing Slots
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam Type
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            
                            <select name="exam_type" class="form-control action">
                        
                                <option value="<?php echo $exam_type;?>" selected><?php echo $exam_type;?></option>
                            
                            </select>
                        
                        </div>

                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam Day
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                        
                        <select name="exam_day" class="form-control action">
            
                            <option value="<?php echo $exam_day;?>"><?php echo $exam_day;?></option>
                            <option value="Day 1">Day 1</option>
                            <option value="Day 2">Day 2</option>
                            <option value="Day 3">Day 3</option>
                            <option value="Day 4">Day 4</option>
        
                        </select>
                    
                        </div>
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam Sessions for that day 
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                       
                        <select name="exam_session" class="form-control">
                    
                            <option value="" selected disabled>Select Session</option>
                            <option value="<?php echo $exam_session;?>" selected><?php echo $exam_session;?></option>

                        </select>
                        
                        </div>
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Course Name
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="course_name" class="form-control"><!-- form-control Begin -->
                        
                                    <option value="<?php echo $exam_course_name;?>"><?php echo $exam_course_name;?></option>
                                
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
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Batch Name
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="batch_name" class="form-control"><!-- form-control Begin -->
                        
                                    <option value="<?php echo $exam_batch_name;?>" selected><?php echo $exam_batch_name;?></option>
                                
                                    <?php 
                                
                                    $get_exam_batch = "select * from batches ORDER BY batch_name asc";
                                    $run_exam_batch = mysqli_query($con,$get_exam_batch);
                                
                                    while ($row_batch=mysqli_fetch_array($run_exam_batch)){
                                    
                                        $batch_id = $row_batch['id'];
                                        $batch_name = $row_batch['batch_name'];
                                        $stream_name = $row_batch['stream_name'];
                                        $department_name = $row_batch['department_name'];
                                        echo "
                                        <option value='$batch_name$stream_name$department_name'>$batch_name-$stream_name-$department_name</option>
                                        ";

                                    }
                                    ?>
                            
                            </select>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Bench Side
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="bench_side" class="form-control"><!-- form-control Begin -->
                        
                                    <option value="<?php echo $bench_side;?>" selected><?php echo $bench_side;?></option>
                                    <option value='left'>Left</option>
                                    <option value='right'>Right</option>
                                        
                            </select>
                        </div>
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam Start From 
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-1">
                        
                            <input type="time" name="start_time" min="00:00" max="24:00" value="<?php echo $exam_start;?>" required>
                        
                        </div>
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam End At 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-4">

                            <input type="time" name="end_time" min="00:00" max="24:00" value = "<?php echo $exam_end;?>" required>
                        
                        </div>
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update Exam Type" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->




<?php  

          if(isset($_POST['submit'])){
              
                $exam_type = $_POST['exam_type'];

                $exam_day = $_POST['exam_day'];

                $exam_session = $_POST['exam_session'];

                $exam_course = $_POST['course_name'];

                $exam_batch = $_POST['batch_name'];

                $bench_side = $_POST['bench_side'];

                $exam_start = $_POST['start_time'];

                $exam_end = $_POST['end_time'];
               
                
                $update_exam_detail = "update `exam_timetable` set exam_type='$exam_type', exam_day='$exam_day',exam_session = '$exam_session',
                    course_name='$exam_course', start_time = '$exam_start', end_time = '$exam_end',batch_name='$exam_batch',bench_side = '$bench_side'
                    where id='$edit_exam_timing_slot'";
                
                $run_exam_details = mysqli_query($con,$update_exam_detail);
                
                if($run_exam_details){
                    
                    echo "<script>alert('Exam Timing Details Has Been Updated')</script>";
                    
                    echo "<script>window.open('index.php?exam_timetable','_self')</script>";
                    
                }
              
              
          }

?>



<?php } ?> 