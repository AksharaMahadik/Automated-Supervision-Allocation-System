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

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Exam Timing Slots
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Exam Timing Slots
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            

            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    
                <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam Type
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="exam_type" id="exam_type" class="form-control action">
                        
                                <option value="" selected disabled>Select Type</option>
                        
                                <?php echo $exam_type; ?>
                            
                            </select>
                        
                        </div>

                    </div><!-- form-group finish -->

                <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam Day
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                        
                        <select name="exam_day" class="form-control action">
            
                            <option value="" selected disabled>Select Day</option>
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
                    
                            <option selected disabled> Select Session </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                                    
                            
                        </select>
                        
                        </div>
                    
                    </div><!-- form-group finish -->
                   
                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Course Name
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="course_name" class="form-control"><!-- form-control Begin -->
                        
                                    <option selected disabled> Select Course </option>
                                
                                    <?php 
                                
                                    $get_exam_course = "SELECT COLUMN_NAME
                                    FROM INFORMATION_SCHEMA.COLUMNS
                                    WHERE TABLE_NAME = N'table 20' order by COLUMN_NAME ASC";
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
                        
                                    <option selected disabled> Select Batch </option>
                                
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
                        
                                    <option selected disabled> Select Side </option>
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
                        
                            <input type="time" name="start_time" min="00:00" max="24:00" required>
                        
                        </div>
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam End At 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-4">

                            <input type="time" name="end_time" min="00:00" max="24:00" required>
                        
                        </div>
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Submit Exam Timetable" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                </form><!-- form-horizontal finish -->
            
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
  
    </div><!-- col-lg-12 finish -->

</div><!-- row 2 finish -->


<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Exam Slots
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Type: </th>
                                <th> Date: </th>
                                <th> Session: </th>
                                <th> Course: </th>
                                <th> Batch: </th>
                                <th> Bench: </th>
                                <th> Start Time:</th>
                                <th> End Time: </th>

                                <th> Edit: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_slots = "select * from exam_timetable ORDER BY
                                exam_day ASC,
                                exam_session ASC,
                                start_time ASC;";
                                
                                $run_slots = mysqli_query($con,$get_slots);
          
                                while($row_slots=mysqli_fetch_array($run_slots)){
                                      
                                    $slot_id = $row_slots['id'];
                                    $exam_type = $row_slots['exam_type'];
                                    $exam_day = $row_slots['exam_day'];                                    
                                    $exam_session = $row_slots['exam_session'];                  
                                    $course_name = $row_slots['course_name'];
                                    $bench_side = $row_slots['bench_side'];
                                    $start_time = $row_slots['start_time'];
                                    $end_time = $row_slots['end_time'];
                                    
                                    $batch_id = $row_slots['batch_name'];
                                   
                                    $i++;
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $exam_type; ?></td>
                                <td> <?php echo $exam_day; ?></td>
                                <td> <?php echo $exam_session;?> </td>
                                <td> <?php echo $course_name;?> </td>
                                <td> <?php echo $batch_id;?></td>
                                <td> <?php echo $bench_side;?></td>
                                <td> <?php echo $start_time?> </td>
                                <td> <?php echo $end_time?> </td>
                                
                                <td> 
                                     
                                     <a href="index.php?exam_timetable_edit=<?php echo $slot_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Edit
                                    
                                     </a> 
                                     
                                </td>

                                <td> 
                                     
                                     <a href="index.php?exam_timetable_delete=<?php echo $slot_id; ?>">
                                     
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


<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "exam_type")
   {
    result = 'exam_date';
   }
   else
   {
       result = 'exam_session';
   }
   $.ajax({
    url:"fetch_exam_timing_slot.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>
<?php  

          if(isset($_POST['submit'])){
              
              $exam_type = $_POST['exam_type'];
              $exam_day = $_POST['exam_day'];
              $exam_session = $_POST['exam_session'];
              $course_name = $_POST['course_name'];
              $bench_side = $_POST['bench_side'];
              $start_time = $_POST['start_time'];
              $end_time = $_POST['end_time'];
              $batch = $_POST['batch_name'];

              $insert_exam_slots = "insert into exam_timetable (exam_type,exam_day,exam_session,course_name,batch_name,start_time,end_time,bench_side) 
                    values ('$exam_type','$exam_day','$exam_session','$course_name','$batch','$start_time','$end_time','$bench_side')";
              
              $run_exam_slots = mysqli_query($con,$insert_exam_slots);
              
              if($run_exam_slots){
                  
                  echo "<script>alert('New Exam Details timetable Has Been Inserted')</script>";
                  
                  echo "<script>window.open('index.php?exam_timetable','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 