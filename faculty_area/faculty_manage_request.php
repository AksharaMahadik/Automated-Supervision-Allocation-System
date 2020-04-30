<?php 
    
    if(!isset($_SESSION['faculty_id'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        $faculty_id = $_SESSION['faculty_id'];

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Manage Allocation
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<?php
//index.php
$exam_time = '';
$query = "SELECT * FROM supervision_block_allocation_final where faculty_id = '$faculty_id'";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $exam_time .= '<option value="'.$row["id"].'">'."Date-".$row["exam_date"]."\ Time-".$row["time"].'</option>';
}
?>

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Requests
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                       
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th>No: </th>
                                <th>Date and Session: </th>
                                <th>Managed Faculty:</th>
                                <th>Accept: </th>

                                <th>Reject: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_slots = "select * from supervision_manage where manage_faculty ='$faculty_id' ORDER BY 
                                id desc
                                 ";
                                
                                $run_slots = mysqli_query($con,$get_slots);
          
                                while($row_slots=mysqli_fetch_array($run_slots)){
                                      
                                    $slot_id = $row_slots['id'];
                                    $exam_id = $row_slots['exam_time_id'];
                                    $get_exam_time_id = "select * from supervision_block_allocation_final where id = '$exam_id'";
                                    $run_exam_time_id= mysqli_query($con,$get_exam_time_id);
                                    while($row_exam_time_id = mysqli_fetch_array($run_exam_time_id)){
                                        $exam_details = "Date-".$row_exam_time_id['exam_date']."\Time-".$row_exam_time_id['time'];
                                    }
                                    $requested_faculty = $row_slots['requested_faculty'];
                                    $get_faculty_details = "select * from faculty where faculty_id = '$requested_faculty'";
                                    $run_faculty_details = mysqli_query($con,$get_faculty_details);
                                    while($row_faculty_details = mysqli_fetch_array($run_faculty_details)){
                                        $requested_faculty_name=$row_faculty_details['faculty_name'];
                                    }
                                    $status = $row_slots['status'];
                                    $managed_faculty = $row_slots['manage_faculty'];
                                    
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo "<b>".$i."</b>"; ?> </td>
                                <td> <?php echo $exam_details; ?></td>
                                <td> <?php echo $requested_faculty_name; ?></td>
                                 
                                <?php 
                                if($status == 'pending') {  ?>
                                    <td> 
                                        
                                        <a href="index.php?faculty_manage_allocation_accept=<?php echo $slot_id; ?>">
                                        
                                            <i class="fa fa-trash-o"></i> Accept
                                        
                                        </a> 
                                        
                                    </td>
                                    <td> 
                                        
                                        <a href="index.php?faculty_manage_allocation_reject=<?php echo $slot_id; ?>">
                                        
                                            <i class="fa fa-trash-o"></i> Reject
                                        
                                        </a> 
                                        
                                    </td>
                                <?php
                                }else if($faculty_id == $managed_faculty){ ?>
                                    <td> 
                                        <?php 
                                        if($status == "ACCEPTED")
                                            echo $status;
                                        else    
                                            echo "-";
                                        ?>
                                    </td>
                                    <td> 
                                        <?php 
                                        if($status == "REJECTED")
                                            echo $status;
                                        else
                                            echo "-";    
                                        ?>
                                    </td>

                                <?php
                                }else{?>
                                    <td> 
                                        <?php 
                                         
                                            echo "-";
                                        ?>
                                    </td>
                                    <td> 
                                        <?php 
                                            echo "-";    
                                        ?>
                                    </td>                           
                                
                                <?php } 
                                ?>
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
   if(action == "exam_time")
   {
    result = 'exam_manage';
   }
   $.ajax({
    url:"fetch_faculty_manage_allocation.php",
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
              $exam_time = $_POST['exam_time'];
              $exam_manage = $_POST['exam_manage'];

              $insert_department = "insert into supervision_manage(exam_time_id,requested_faculty,manage_faculty) 
                    values ('$exam_time','$faculty_id','$exam_manage')";
              
              $run_department = mysqli_query($con,$insert_department);
              
              if($run_department){
                  
                  echo "<script>alert('New Request Has Been sent')</script>";
                  
                  echo "<script>window.open('index.php?faculty_manage_allocation','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 