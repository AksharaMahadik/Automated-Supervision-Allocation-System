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

    if(isset($_GET['faculty_manage_allocation_reject'])){
        
        $delete_id = $_GET['faculty_manage_allocation_reject'];

        $get_details = "select * from supervision_manage where id = '$delete_id'";

        $run_details = mysqli_query($con,$get_details);
        while($row_slots = mysqli_fetch_array($run_details)){
            $exam_id = $row_slots['exam_time_id'];
            $update_status = "UPDATE `supervision_manage` SET `status` = 'REJECTED' where id = '$delete_id'";
            $run_update_status = mysqli_query($con,$update_status);
        }
    
        
        if($run_update_status){
            
            echo "<script>alert('One Supervision Manage Rejected')</script>";
            
            echo "<script>window.open('index.php?faculty_manage_request','_self')</script>";
            
        }
        
    }

?>

<?php } ?>