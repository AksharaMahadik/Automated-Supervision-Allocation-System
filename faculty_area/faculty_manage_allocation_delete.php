<?php 
    
    if(!isset($_SESSION['faculty_id'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['faculty_manage_allocation_delete'])){
        
        $delete_id = $_GET['faculty_manage_allocation_delete'];
        
        $delete = "delete from supervision_manage where id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete);
        
        if($run_delete){
            
            echo "<script>alert('One Supervision Manage has been Deleted')</script>";
            
            echo "<script>window.open('index.php?faculty_manage_allocation','_self')</script>";
            
        }
        
    }

?>

<?php } ?>