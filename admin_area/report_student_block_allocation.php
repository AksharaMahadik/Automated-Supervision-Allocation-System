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
                
                <i class="fa fa-dashboard"></i> Dashboard / Student Block Allocation
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Student Block Allocation
                
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
                            
                            Exam Date
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                        
                        <select name="exam_date" id="exam_date" class="form-control action">
            
                            <option selected disabled>Select Date</option>
        
                        </select>
                    
                        </div>
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam Sessions for that day 
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                       
                        <select name="exam_session" id="exam_session" class="form-control">
                    
                            <option value="">Select Session</option>
        
                        </select>
                        
                        </div>
                    
                    </div><!-- form-group finish -->
                   
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Submit Exam Type" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                </form><!-- form-horizontal finish -->
            
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
  
    </div><!-- col-lg-12 finish -->

</div><!-- row 2 finish -->

<a href = "index.php?report_student_block_allocation_pdf" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-pdf-o"></span>Go To PDF</a>
<br><br>
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Exam Block Allocation
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                       
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th>No: </th>
                                <th>Type: </th>
                                <th>Date: </th>
                                <th>Time: </th>
                                <th>Location:</th>
                                <th>Bench:</th>
                                <th>Course: </th>
                               
                                <th>Students: </th>
                                <th>Total:</th>

                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_slots = "select * from students_block_allocation ORDER BY 
                                class_room desc
                                 ";
                                
                                $run_slots = mysqli_query($con,$get_slots);
          
                                while($row_slots=mysqli_fetch_array($run_slots)){
                                      
                                    $slot_id       = $row_slots['id'];
                                    $exam_type     = $row_slots['exam_type'];
                                    $exam_date     = $row_slots['exam_date'];                                    
                                   
                                    $time          = $row_slots['time'];
                                    $exam_session = $time;                 
                                    $course_name = $row_slots['course_name'];
                                    $location  = $row_slots['class_room'];
                                    $location .= " ";
                                    $location .= $row_slots['department_name'];
                                    $students  = $row_slots['student_roll'];
                                   
                                    $capacity  = $row_slots['capacity'];
                                    $bench_l   = $row_slots['course_name_l'];
                                    $bench_side = $row_slots['bench_side'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo "<b>".$i."</b>"; ?> </td>
                                <td> <?php echo $exam_type; ?></td>
                                <td> <?php echo $exam_date; ?></td>
                                <td> <?php echo $exam_session;?> </td>
                                <td> <?php echo $location;?> </td>
                                <td> <?php echo "<b>".$bench_side."</b>";?></td>
                                <td> <?php echo $course_name;?> </td>
                                <!--<td> <<1?php echo $bench_side?></td>-->
                                <td> <?php echo $students;?> </td>
                                <td> <?php echo $capacity;?></td>

                                <td> 
                                     
                                     <a href="index.php?report_student_block_allocation_delete=<?php echo $slot_id; ?>">
                                     
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
    <form action ="" method="post">
        <div class="col-md-2">
            <input type="submit" value="Delete All" name="delete_all" class="form-control btn btn-primary"></input>
        </div>
    </form>
    <?php
        if(isset($_POST['delete_all'])){
            $delete_all = "DELETE FROM `students_block_allocation` WHERE 1";
            $run_delete_all = mysqli_query($con,$delete_all);
            if($run_delete_all != null){
                echo "<script>alert('All Allocation Deleted')</script>";
                echo "<script>window.open('index.php?report_student_block_allocation','_self')</script>";
            }
        }
    ?>

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
              $exam_date = $_POST['exam_date'];
              $exam_session = $_POST['exam_session'];
              $j=1;
              
              $reset_block_details = "update block_details set total = 0, total_r = 0 where 1";
              $run_reset_block_details = mysqli_query($con,$reset_block_details);
              if($exam_type == "ESE" || $exam_type == "REEXAM"){
                $allocation = "";
                //$run_blockallocation_ese="";

                $insert_block_ese_exam_slot = "select * from exam_slots where exam_type = '$exam_type' && exam_date = '$exam_date' && exam_session = '$exam_session' && NOT EXISTS(select * from students_block_allocation where exam_slots.exam_type = students_block_allocation.exam_type && exam_slots.exam_date = students_block_allocation.exam_date && exam_slots.exam_session = students_block_allocation.exam_session) order by id desc";
                $run_block_ese_exam_slot = mysqli_query($con,$insert_block_ese_exam_slot);
                while($row_block_ese_exam_slot = mysqli_fetch_array($run_block_ese_exam_slot)){

                    $offlimitstudents = 0;
                    $start_time = $row_block_ese_exam_slot['start_time'];
                    $end_time = $row_block_ese_exam_slot['end_time'];
                    $time = $start_time." to ".$end_time;
                    $batch_name_ese =$row_block_ese_exam_slot['batch_name'];
                    $course_name_ese = $row_block_ese_exam_slot['course_name'];
                    
                    $get_course_name  = "select * from courses where course_id = '$course_name_ese'";
                    $run_course_name = mysqli_query($con,$get_course_name);
                    $row_course_name_text = mysqli_fetch_array($run_course_name);
                    $course_name_text = $row_course_name_text['course_name'];
                    
                    $course_name_ese1 = "";
                    $course_name_ese1 .= $course_name_ese."-<br>".$course_name_text;
                    $course_name_ese1 .= "-<br>";
                    $course_name_ese1 .= $batch_name_ese;
                    
                    
                    if($course_name_ese == "ME2082_SYA" || $course_name_ese == "ME2082_SYB"){
                        {
                            $select_block_ese_block_details = "select * from lab_details where department_name = 'Mech' or (department_name = 'IT' and not lab_number = 'IL-05') and not exists (select * from students_block_allocation where lab_details.lab_number = students_block_allocation.class_room)";  
                            $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                            while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                                $class_room_ese = $row_block_ese_block_details['lab_number'];
                                $department_name_ese = $row_block_ese_block_details['department_name'];
                                $capacity = $row_block_ese_block_details['capacity'];
                                
                                $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                                $run_student_ese = mysqli_query($con,$select_student_ese);
                                $offlimitstudents = $offlimitstudents + $capacity;
                                
                                
                                { 
                                    $j=1;
                                    $count12 = 0;
                                    while($row_student_ese = mysqli_fetch_array($run_student_ese))
                                    {
                                        if($j<10){
                                            $allocation  .= "<b>(0$j)</b>";
                                        }
                                        else{
                                            $allocation .= "<b>($j)</b>";
                                        }
                                        $student_roll_ese = $row_student_ese[$course_name_ese];
                                        $allocation .= "$student_roll_ese,    ";
                                        $j++;
                                        $count12= $j-1;
                                    }
        
                                }
        
                                if($allocation){
                                    $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                            values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                                    $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                                }
                                $allocation = "";
                            }
                        }

                    }
                    else if($course_name_ese == "AE2022"){
                        {
                            $select_block_ese_block_details = "select * from lab_details where (department_name = 'IT' and (lab_number = 'IL-01' OR lab_number = 'IL-07' OR lab_number='IL-08' or lab_number = 'IL-09' )) 
                                and not exists (select * from students_block_allocation where lab_details.lab_number = students_block_allocation.class_room)";  
                            $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                            while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                                $class_room_ese = $row_block_ese_block_details['lab_number'];
                                $department_name_ese = $row_block_ese_block_details['department_name'];
                                $capacity = $row_block_ese_block_details['capacity'];
                                
                                $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                                $run_student_ese = mysqli_query($con,$select_student_ese);
                                $offlimitstudents = $offlimitstudents + $capacity;
                                
                                
                                { 
                                    $j=1;
                                    $count12 = 0;
                                    while($row_student_ese = mysqli_fetch_array($run_student_ese))
                                    {
                                        if($j<10){
                                            $allocation  .= "<b>(0$j)</b>";
                                        }
                                        else{
                                            $allocation .= "<b>($j)</b>";
                                        }
                                        $student_roll_ese = $row_student_ese[$course_name_ese];
                                        $allocation .= "$student_roll_ese,    ";
                                        $j++;
                                        $count12= $j-1;
                                    }
        
                                }
        
                                if($allocation){
                                    $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                            values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                                    $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                                }
                                $allocation = "";
                            }
                        }

                    }
                    else if($course_name_ese == "SH1132_E" || $course_name_ese == "SH1132_F" || $course_name_ese == "SH1132_G" ||
                            $course_name_ese == "SH1132_H" || $course_name_ese == "SH1132_I"){
                        {
                            $select_block_ese_block_details = "select * from lab_details where department_name = 'IT' OR department_name = 'Civil' OR department_name = 'Mech' or department_name = 'Auto' or department_name = 'Central Computer' or department_name = 'Elect' or department_name = 'ETC' or (department_name = 'CSE' and (lab_number = 'L4' or lab_number = 'L6')) 
                                and not exists (select * from students_block_allocation where lab_details.lab_number = students_block_allocation.class_room)";  
                            $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                            while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                                $class_room_ese = $row_block_ese_block_details['lab_number'];
                                $department_name_ese = $row_block_ese_block_details['department_name'];
                                $capacity = $row_block_ese_block_details['capacity'];
                                
                                $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                                $run_student_ese = mysqli_query($con,$select_student_ese);
                                $offlimitstudents = $offlimitstudents + $capacity;
                                
                                
                                { 
                                    $j=1;
                                    $count12 = 0;
                                    while($row_student_ese = mysqli_fetch_array($run_student_ese))
                                    {
                                        if($j<10){
                                            $allocation  .= "<b>(0$j)</b>";
                                        }
                                        else{
                                            $allocation .= "<b>($j)</b>";
                                        }
                                        $student_roll_ese = $row_student_ese[$course_name_ese];
                                        $allocation .= "$student_roll_ese,    ";
                                        $j++;
                                        $count12= $j-1;
                                    }
        
                                }
        
                                if($allocation){
                                    $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                            values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                                    $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                                }
                                $allocation = "";
                            }
                        }

                    }
                    else if($course_name_ese == "SH3222_AUTO" || $course_name_ese == "SH3222_CIVIL" || $course_name_ese == "SH3222_CSE" || $course_name_ese == "SH3222_ETC" || 
                            $course_name_ese == "SH3222_ELECT" || $course_name_ese == "SH3222_IT" || $course_name_ese == "SH3222_AMECH" || $course_name_ese == "SH3222_BMECH" ){
                        {
                            $select_block_ese_block_details = "select * from lab_details where department_name = 'MBA' OR department_name = 'ETC' or department_name = 'CSE' or department_name = 'IT' or department_name = 'Civil' or department_name = 'Central Computer' 
                                and not exists (select * from students_block_allocation where lab_details.lab_number = students_block_allocation.class_room)";  
                            $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                            while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                                $class_room_ese = $row_block_ese_block_details['lab_number'];
                                $department_name_ese = $row_block_ese_block_details['department_name'];
                                $capacity = $row_block_ese_block_details['capacity'];
                                
                                $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                                $run_student_ese = mysqli_query($con,$select_student_ese);
                                $offlimitstudents = $offlimitstudents + $capacity;
                                
                                
                                { 
                                    $j=1;
                                    $count12 = 0;
                                    while($row_student_ese = mysqli_fetch_array($run_student_ese))
                                    {
                                        if($j<10){
                                            $allocation  .= "<b>(0$j)</b>";
                                        }
                                        else{
                                            $allocation .= "<b>($j)</b>";
                                        }
                                        $student_roll_ese = $row_student_ese[$course_name_ese];
                                        $allocation .= "$student_roll_ese,    ";
                                        $j++;
                                        $count12= $j-1;
                                    }
        
                                }
        
                                if($allocation){
                                    $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                            values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                                    $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                                }
                                $allocation = "";
                            }
                        }

                    }
                    else{
                    //$select_block_ese_block_details = "select * from block_details where not exists (select * from students_block_allocation where block_details.class_room = students_block_allocation.class_room) ";  
                    $select_block_ese_block_details = "SELECT * FROM `block_details` WHERE capacity > total order by class_room asc";
                    $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                    while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                        $update_block_id = $row_block_ese_block_details['id'];
                        $class_room_ese = $row_block_ese_block_details['class_room'];
                        $department_name_ese = $row_block_ese_block_details['department_name'];
                        $capacity = $row_block_ese_block_details['capacity'];
                        $total = $row_block_ese_block_details['total'];
                        $capacity = $capacity - $total;
                        $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                        $run_student_ese = mysqli_query($con,$select_student_ese);
                        $offlimitstudents = $offlimitstudents + $capacity;
                        
                        
                        { 
                            $j=$total+1;
                            
                            $count12 = 0;
                            while($row_student_ese = mysqli_fetch_array($run_student_ese))
                            {
                                if($j<10){
                                    $allocation  .= "<b>(0$j)</b>";
                                }
                                else{
                                    $allocation .= "<b>($j)</b>";
                                }
                                $student_roll_ese = $row_student_ese[$course_name_ese];
                                $allocation .= "$student_roll_ese,    ";
                                $j++;
                                $count12= $j-1;
                            }
                            

                        }

                        if($allocation){
                            $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                    values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                            $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                            $update_block_total = "update block_details set total = $count12 where id = $update_block_id";
                            $run_update_block_total = mysqli_query($con,$update_block_total);
                        }
                        $allocation = "";
                    }
                }
                    
                }

            }
                    
            
            if($exam_type == "UT1" || $exam_type == "UT2"){

                $allocation = "";
                $allocation_r ="";
                $count_rolls ="";
                //$run_blockallocation_ese="";
                
                
                $insert_block_ese_exam_slot = "select * from exam_slots where exam_type = '$exam_type' && exam_date = '$exam_date' && exam_session = '$exam_session' && NOT EXISTS(select * from students_block_allocation where exam_slots.exam_type = students_block_allocation.exam_type && exam_slots.exam_date = students_block_allocation.exam_date && exam_slots.exam_session = students_block_allocation.exam_session) order by id desc";
                $run_block_ese_exam_slot = mysqli_query($con,$insert_block_ese_exam_slot);
                while($row_block_ese_exam_slot = mysqli_fetch_array($run_block_ese_exam_slot)){
                    
                    $offlimitstudents = 0;
                    $start_time = $row_block_ese_exam_slot['start_time'];
                    $end_time = $row_block_ese_exam_slot['end_time'];
                    $time = $start_time." to ".$end_time;
                    $batch_name_ese =$row_block_ese_exam_slot['batch_name'];
                    $course_name_ese = $row_block_ese_exam_slot['course_name'];
                    $bench_side = $row_block_ese_exam_slot['bench_side'];
                    $course_name_ese1 = "";
                    $course_name_ese1 .= $course_name_ese;
                    $course_name_ese1 .= " -- ";
                    $course_name_ese1 .= $batch_name_ese;
                    
                    if($course_name_ese == "ME2082_SYA" || $course_name_ese == "ME2082_SYB"){
                        {
                            $select_block_ese_block_details = "select * from lab_details where department_name = 'Mech' or (department_name = 'IT' and not lab_number = 'IL-05') and not exists (select * from students_block_allocation where lab_details.lab_number = students_block_allocation.class_room)";  
                            $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                            while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                                $class_room_ese = $row_block_ese_block_details['lab_number'];
                                $department_name_ese = $row_block_ese_block_details['department_name'];
                                $capacity = $row_block_ese_block_details['capacity'];
                                
                                $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                                $run_student_ese = mysqli_query($con,$select_student_ese);
                                $offlimitstudents = $offlimitstudents + $capacity;
                                
                                
                                { 
                                    $j=1;
                                    $count12 = 0;
                                    while($row_student_ese = mysqli_fetch_array($run_student_ese))
                                    {
                                        if($j<10){
                                            $allocation  .= "<b>(0$j)</b>";
                                        }
                                        else{
                                            $allocation .= "<b>($j)</b>";
                                        }
                                        $student_roll_ese = $row_student_ese[$course_name_ese];
                                        $allocation .= "$student_roll_ese,    ";
                                        $j++;
                                        $count12= $j-1;
                                    }
        
                                }
        
                                if($allocation){
                                    $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                            values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                                    $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                                }
                                $allocation = "";
                            }
                        }

                    }
                    else if($course_name_ese == "AE2022"){
                        {
                            $select_block_ese_block_details = "select * from lab_details where (department_name = 'IT' and (lab_number = 'IL-01' OR lab_number = 'IL-07' OR lab_number='IL-08' or lab_number = 'IL-09' )) 
                                and not exists (select * from students_block_allocation where lab_details.lab_number = students_block_allocation.class_room)";  
                            $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                            while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                                $class_room_ese = $row_block_ese_block_details['lab_number'];
                                $department_name_ese = $row_block_ese_block_details['department_name'];
                                $capacity = $row_block_ese_block_details['capacity'];
                                
                                $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                                $run_student_ese = mysqli_query($con,$select_student_ese);
                                $offlimitstudents = $offlimitstudents + $capacity;
                                
                                
                                { 
                                    $j=1;
                                    $count12 = 0;
                                    while($row_student_ese = mysqli_fetch_array($run_student_ese))
                                    {
                                        if($j<10){
                                            $allocation  .= "<b>(0$j)</b>";
                                        }
                                        else{
                                            $allocation .= "<b>($j)</b>";
                                        }
                                        $student_roll_ese = $row_student_ese[$course_name_ese];
                                        $allocation .= "$student_roll_ese,    ";
                                        $j++;
                                        $count12= $j-1;
                                    }
        
                                }
        
                                if($allocation){
                                    $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                            values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                                    $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                                }
                                $allocation = "";
                            }
                        }

                    }
                    else if($course_name_ese == "SH1132_E" || $course_name_ese == "SH1132_F" || $course_name_ese == "SH1132_G" ||
                            $course_name_ese == "SH1132_H" || $course_name_ese == "SH1132_I"){
                        {
                            $select_block_ese_block_details = "select * from lab_details where department_name = 'IT' OR department_name = 'Civil' OR department_name = 'Mech' or department_name = 'Auto' or department_name = 'Central Computer' or department_name = 'Elect' or department_name = 'ETC' or (department_name = 'CSE' and (lab_number = 'L4' or lab_number = 'L6')) 
                                and not exists (select * from students_block_allocation where lab_details.lab_number = students_block_allocation.class_room)";  
                            $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                            while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                                $class_room_ese = $row_block_ese_block_details['lab_number'];
                                $department_name_ese = $row_block_ese_block_details['department_name'];
                                $capacity = $row_block_ese_block_details['capacity'];
                                
                                $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                                $run_student_ese = mysqli_query($con,$select_student_ese);
                                $offlimitstudents = $offlimitstudents + $capacity;
                                
                                
                                { 
                                    $j=1;
                                    $count12 = 0;
                                    while($row_student_ese = mysqli_fetch_array($run_student_ese))
                                    {
                                        if($j<10){
                                            $allocation  .= "<b>(0$j)</b>";
                                        }
                                        else{
                                            $allocation .= "<b>($j)</b>";
                                        }
                                        $student_roll_ese = $row_student_ese[$course_name_ese];
                                        $allocation .= "$student_roll_ese,    ";
                                        $j++;
                                        $count12= $j-1;
                                    }
        
                                }
        
                                if($allocation){
                                    $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                            values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                                    $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                                }
                                $allocation = "";
                            }
                        }

                    }
                    else if($course_name_ese == "SH3222_AUTO" || $course_name_ese == "SH3222_CIVIL" || $course_name_ese == "SH3222_CSE" || $course_name_ese == "SH3222_ETC" || 
                            $course_name_ese == "SH3222_ELECT" || $course_name_ese == "SH3222_IT" || $course_name_ese == "SH3222_AMECH" || $course_name_ese == "SH3222_BMECH" ){
                        {
                            $select_block_ese_block_details = "select * from lab_details where department_name = 'MBA' OR department_name = 'ETC' or department_name = 'CSE' or department_name = 'IT' or department_name = 'Civil' or department_name = 'Central Computer' 
                                and not exists (select * from students_block_allocation where lab_details.lab_number = students_block_allocation.class_room)";  
                            $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                            while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                                $class_room_ese = $row_block_ese_block_details['lab_number'];
                                $department_name_ese = $row_block_ese_block_details['department_name'];
                                $capacity = $row_block_ese_block_details['capacity'];
                                
                                $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                                $run_student_ese = mysqli_query($con,$select_student_ese);
                                $offlimitstudents = $offlimitstudents + $capacity;
                                
                                
                                { 
                                    $j=1;
                                    $count12 = 0;
                                    while($row_student_ese = mysqli_fetch_array($run_student_ese))
                                    {
                                        if($j<10){
                                            $allocation  .= "<b>(0$j)</b>";
                                        }
                                        else{
                                            $allocation .= "<b>($j)</b>";
                                        }
                                        $student_roll_ese = $row_student_ese[$course_name_ese];
                                        $allocation .= "$student_roll_ese,    ";
                                        $j++;
                                        $count12= $j-1;
                                    }
        
                                }
        
                                if($allocation){
                                    $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,capacity,student_roll) 
                                            values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$count12','$allocation')";
                                    $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                                }
                                $allocation = "";
                            }
                        }

                    }
                    else if($bench_side == 'left'){
                    $select_block_ese_block_details = "SELECT * FROM `block_details` WHERE capacity > total order by class_room asc";
                    $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                    while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                        $update_block_id = $row_block_ese_block_details['id'];
                        $class_room_ese = $row_block_ese_block_details['class_room'];
                        $department_name_ese = $row_block_ese_block_details['department_name'];
                        $capacity = $row_block_ese_block_details['capacity'];
                        $total = $row_block_ese_block_details['total'];
                        $capacity = $capacity - $total;
                        $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                        $run_student_ese = mysqli_query($con,$select_student_ese);
                        $offlimitstudents = $offlimitstudents + $capacity;
                        
                        
                        { 
                            $j=$total+1;
                            
                            $count12 = 0;
                            while($row_student_ese = mysqli_fetch_array($run_student_ese))
                            {
                                if($j<10){
                                    $allocation  .= "<b>(0$j)</b>";
                                }
                                else{
                                    $allocation .= "<b>($j)</b>";
                                }
                                $student_roll_ese = $row_student_ese[$course_name_ese];
                                $allocation .= "$student_roll_ese,    ";
                                $j++;
                                $count12= $j-1;
                            }
                            

                        }

                        if($allocation){
                            $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,bench_side,capacity,student_roll) 
                                    values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$bench_side','$count12','$allocation')";
                            $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                            $update_block_total = "update block_details set total = $count12 where id = $update_block_id";
                            $run_update_block_total = mysqli_query($con,$update_block_total);
                        }
                        $allocation = "";
                    }
                }else if($bench_side == 'right'){
                    $select_block_ese_block_details = "SELECT * FROM `block_details` WHERE capacity > total_r order by class_room asc";
                    $run_block_ese_block_details = mysqli_query($con,$select_block_ese_block_details);
                    while($row_block_ese_block_details = mysqli_fetch_array($run_block_ese_block_details)){
                        $update_block_id = $row_block_ese_block_details['id'];
                        $class_room_ese = $row_block_ese_block_details['class_room'];
                        $department_name_ese = $row_block_ese_block_details['department_name'];
                        $capacity = $row_block_ese_block_details['capacity'];
                        $total = $row_block_ese_block_details['total_r'];
                        $capacity = $capacity - $total;
                        $select_student_ese = "select id,$course_name_ese from `table 20` where $course_name_ese <> '' order by id limit ".$offlimitstudents.','.$capacity;
                        $run_student_ese = mysqli_query($con,$select_student_ese);
                        $offlimitstudents = $offlimitstudents + $capacity;
                        
                        
                        { 
                            $j=$total+1;
                            
                            $count12 = 0;
                            while($row_student_ese = mysqli_fetch_array($run_student_ese))
                            {
                                if($j<10){
                                    $allocation  .= "<b>(0$j)</b>";
                                }
                                else{
                                    $allocation .= "<b>($j)</b>";
                                }
                                $student_roll_ese = $row_student_ese[$course_name_ese];
                                $allocation .= "$student_roll_ese,    ";
                                $j++;
                                $count12= $j-1;
                            }
                            

                        }

                        if($allocation){
                            $insert_block_ese_allocation = "insert into students_block_allocation(exam_type,exam_date,exam_session,time,course_name,course_name_l,class_room,department_name,bench_side,capacity,student_roll) 
                                    values ('$exam_type','$exam_date','$exam_session','$time','$course_name_ese1','$course_name_ese','$class_room_ese','$department_name_ese','$bench_side','$count12','$allocation')";
                            $run_blockallocation_ese = mysqli_query($con,$insert_block_ese_allocation);
                            $update_block_total = "update block_details set total_r = $count12 where id = $update_block_id";
                            $run_update_block_total = mysqli_query($con,$update_block_total);
                        }
                        $allocation = "";
                    }
                }


                }

            }



            if($run_blockallocation_ese != null){
                    
                echo "<script>alert('New block allocation Has Been Inserted')</script>";
                
                echo "<script>window.open('index.php?report_student_block_allocation','_self')</script>";
                
            }
            else
            {
                echo "<script>alert('Student of same course and batch are not found')</script>";
            }

        }
              
?>

<?php } ?>