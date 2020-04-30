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
                
                <i class="fa fa-dashboard"></i> Dashboard / Supervision Block Allocation
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Supervision Block Allocation
                
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


<a href="index.php?report_supervision_allocation_pdf" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-pdf-o"></span>Go To PDF</a>
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
                                <th>Session: </th>
                                <th>Location:</th>
                                <th>Bench Side:</th>
                                <th>Faculty: </th>
                                

                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_slots = "select * from supervision_block_allocation ORDER BY
                                exam_date ASC,
                                exam_session ASC,
                                class_room asc ";
                                
                                $run_slots = mysqli_query($con,$get_slots);
          
                                while($row_slots=mysqli_fetch_array($run_slots)){
                                      
                                    $slot_id = $row_slots['id'];
                                    $exam_type = $row_slots['exam_type'];
                                    $exam_date = $row_slots['exam_date'];                                    
                                    //$exam_session = $row_slots['exam_session'];                  
                                    $exam_session  = $row_slots['time'];
                                    $location = $row_slots['class_room'];
                                    $location .= " ";
                                    $location .= $row_slots['department_name'];
                                    $faculty = $row_slots['faculty_name'];
                                    $bench_side = $row_slots['side'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $exam_type; ?></td>
                                <td> <?php echo $exam_date; ?></td>
                                <td> <?php echo $exam_session;?> </td>
                                <td> <?php echo $location;?> </td>
                                <td> <?php echo $bench_side;?></td>
                                <td> <?php echo $faculty;?> </td>
                                
                                <td> 
                                     
                                     <a href="index.php?report_supervision_allocation_delete=<?php echo $slot_id; ?>">
                                     
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
            $delete_all = "DELETE FROM `supervision_block_allocation` WHERE 1";
            $run_delete_all = mysqli_query($con,$delete_all);
            if($run_delete_all != null){
                echo "<script>alert('All Allocation Deleted')</script>";
                echo "<script>window.open('index.php?report_supervision_allocation','_self')</script>";
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
              
            $delete_table = "delete FROM supervision_block_allocation";
            $run_delete_table = mysqli_query($con,$delete_table);
            $exam_type = $_POST['exam_type'];
            $exam_type_remain = $exam_type."_remain";
            $exam_date = $_POST['exam_date'];
            $exam_session = $_POST['exam_session'];
            $offlimitsupervision = 0;
            $offlimitsupervision_l = 0;
            $capacitysupervision = 1;
            

              $search_student_block_allocation = "select * from students_block_allocation where exam_type = '$exam_type' && exam_date = '$exam_date' && exam_session = '$exam_session' order by id desc";
              $run_search_student_block_allocation = mysqli_query($con,$search_student_block_allocation);
              while($row_student_block_allocation = mysqli_fetch_array($run_search_student_block_allocation)){
                  $class_room = $row_student_block_allocation['class_room'];
                  $department_name = $row_student_block_allocation['department_name'];
                  $time = $row_student_block_allocation['time'];
                  $bench_side = $row_student_block_allocation['bench_side'];

                  $course_name_l = $row_student_block_allocation['course_name_l'];
                  
                  $select_dept_of_course_l = "select * from courses where course_id = '$course_name_l'";
                  $run_dept_of_course_l = mysqli_query($con,$select_dept_of_course_l);
                  $row_dept_of_course_l = mysqli_fetch_array($run_dept_of_course_l);
                  $dept_of_course_l = $row_dept_of_course_l['department_name'];

                  
                  if($dept_of_course_l == "Auto" || $dept_of_course_l == "Mech" || $dept_of_course_l == "Civil"){
                    $select_supervision_block_allocation = "select * from faculty where (department_name like '%ETC%' or department_name like '%Elect%' or department_name like '%CSE%' or department_name like '%IT%') and $exam_type > $exam_type_remain order by id asc limit ". $offlimitsupervision_l.','.$capacitysupervision;
                    $run_supervision_block_allocation = mysqli_query($con,$select_supervision_block_allocation);
                    $offlimitsupervision_l = $offlimitsupervision_l + $capacitysupervision;
                    while($row_supervision_block_allocation = mysqli_fetch_array($run_supervision_block_allocation))
                    {
                        $faculty_id = $row_supervision_block_allocation['faculty_id'];
                        $faculty_name = $row_supervision_block_allocation['faculty_name'];
                        $faculty_email = $row_supervision_block_allocation['email'];
                    }
                  }
                  else{
                    $select_supervision_block_allocation = "select * from faculty where (department_name like '%Mech%' or department_name like '%Civil%' or department_name like '%Auto%') and $exam_type > $exam_type_remain order by id asc limit ". $offlimitsupervision.','.$capacitysupervision;
                    $run_supervision_block_allocation = mysqli_query($con,$select_supervision_block_allocation);
                    $offlimitsupervision = $offlimitsupervision + $capacitysupervision;
                    while($row_supervision_block_allocation = mysqli_fetch_array($run_supervision_block_allocation))
                    {
                        $faculty_id = $row_supervision_block_allocation['faculty_id'];
                        $faculty_name = $row_supervision_block_allocation['faculty_name'];
                        $faculty_email = $row_supervision_block_allocation['email'];
                    }
                  }

                    if($run_supervision_block_allocation){
                        $insert_supervision_block_allocation = "insert into supervision_block_allocation(exam_type,exam_date,exam_session,time,class_room,department_name,faculty_id,faculty_name,email,side) 
                                values ('$exam_type','$exam_date','$exam_session','$time','$class_room','$department_name','$faculty_id','$faculty_name','$faculty_email','$bench_side')";
                        $run_insertion_supervision = mysqli_query($con,$insert_supervision_block_allocation);
                        if($run_insertion_supervision){
                            $update_allocation_of_faculty = "update faculty SET total_supervision_per_sem_remain = total_supervision_per_sem_remain+1, $exam_type_remain=$exam_type_remain + 1 where faculty_id = '$faculty_id'";
                            $run_allocaiton_of_faculty = mysqli_query($con,$update_allocation_of_faculty);
                        }
                    }
                  

                 
                  
              }
                   
          if($run_supervision_block_allocation != null){
                  
              $copy_table = "INSERT INTO supervision_block_allocation_final SELECT * FROM supervision_block_allocation";
              $run_copy_table = mysqli_query($con,$copy_table);
              echo "<script>alert('New block allocation Has Been Inserted')</script>";
              
              echo "<script>window.open('index.php?report_supervision_allocation','_self')</script>";
              
          }
          else
          {
              echo "<script>alert('Student of same course and batch are not found')</script>";
          }
          
        }
        
            
              
?>



<?php } ?> 