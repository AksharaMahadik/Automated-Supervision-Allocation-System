<?php 
    
    if(!isset($_SESSION['faculty_id'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

        $faculty_id = $_SESSION['faculty_id'];
        $get_faculty_details = "select * from faculty where faculty_id = '$faculty_id'";
        $run_faculty_details = mysqli_query($con,$get_faculty_details);
        while($row_faculty_details = mysqli_fetch_array($run_faculty_details)){
            $faculty_name = $row_faculty_details['faculty_name'];
            $faculty_email = $row_faculty_details['email'];
        }
?>

<?php 

    if(isset($_GET['faculty_manage_allocation_accept'])){
        
        $delete_id = $_GET['faculty_manage_allocation_accept'];

        $get_details = "select * from supervision_manage where id = '$delete_id'";

        $run_details = mysqli_query($con,$get_details);
        while($row_slots = mysqli_fetch_array($run_details)){
            $exam_id = $row_slots['exam_time_id'];
            $get_requested_faculty_id = "select * from supervision_block_allocation_final where id = ''$exam_id";
            $run_requested_faculty_id = mysqli_query($con,$get_requested_faculty_id);
            while($row_requested_faculty_id = mysqli_fetch_array($run_requested_faculty_id)){
                $requested_faculty_id = $row_requested_faculty_id['faculty_id'];
                $requested_faculty_name = $row_requested_faculty_id['faculty_name'];
                $exam_date = $row_requested_faculty_id['exam_date'];
                $exam_time = $row_requested_faculty_id['time'];
                $exam_type = $row_requested_faculty_id['exam_type'];
            }
            $update_supervision = "UPDATE `supervision_block_allocation_final` SET `faculty_id`='$faculty_id',`faculty_name`='$faculty_name',`email`='$faculty_email' where id = '$exam_id'";
            $run_update_supervision = mysqli_query($con,$update_supervision);
            $update_status = "UPDATE `supervision_manage` SET `status` = 'ACCEPTED' where id = '$delete_id'";
            $run_update_status = mysqli_query($con,$update_status);
        }
    
        
        if($run_update_status){
            $exam_type_remain = $exam_type."_remain";
            $update_rem_for_requested_faculty = "UPDATE `faculty` SET total_supervision_per_sem_remain=total_supervision_per_sem_remain-1,$exam_type_remain=$exam_type_remain-1  WHERE faculty_id = $requested_faculty_id";
            $run_update_rem_for_requested_faculty = mysqli_query($con,$update_rem_for_requested_faculty);
            $update_rem_for_managed_faculty = "UPDATE `faculty` SET total_supervision_per_sem_remain=total_supervision_per_sem_remain+1,$exam_type_remain=$exam_type_remain+1  WHERE faculty_id = $faculty_id";
            $run_update_rem_for_managed_faculty = mysqli_query($con,$update_rem_for_managed_faculty);

            $delete_all_request = "DELETE FROM `supervision_manage` WHERE exam_time_id = '$exam_id',requested_faculty = '$requested_faculty_id',status='pending'";
            $run_delete_all_request = mysqli_query($con,$delete_all_request);

            

            echo "<script>alert('One Supervision Manage Accepeted')</script>";
            
            echo "<script>window.open('index.php?faculty_manage_request','_self')</script>";
            
        }
        else{
            echo "<script>alert('Something Went Wrong')</script>";
            
            echo "<script>window.open('index.php?faculty_manage_request','_self')</script>";
        }
        
    }

?>

<?php } ?>