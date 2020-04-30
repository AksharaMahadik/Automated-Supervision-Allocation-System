<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['exam_timetable_delete'])){
        
        $delete_slot_id = $_GET['exam_timetable_delete'];
        
        $delete_department = "delete from exam_timetable where id='$delete_slot_id'";
        
        $run_delete = mysqli_query($con,$delete_department);
        
        if($run_delete){
            
            echo "<script>alert('One Entry has been Deleted')</script>";
            
            echo "<script>window.open('index.php?exam_timetable','_self')</script>";
            
        }
        
    }

?>

<?php } ?>