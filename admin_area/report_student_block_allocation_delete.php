<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['report_student_block_allocation_delete'])){
        
        $delete_id = $_GET['report_student_block_allocation_delete'];
        
        $delete = "delete from students_block_allocation where id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete);
        
        if($run_delete){
            
            echo "<script>alert('One Block allocation has been Deleted')</script>";
            
            echo "<script>window.open('index.php?report_student_block_allocation','_self')</script>";
            
        }
        
    }

?>

<?php } ?>