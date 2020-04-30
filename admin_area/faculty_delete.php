<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['faculty_delete'])){
        
        $delete_faculty_id = $_GET['faculty_delete'];
        
        $delete_faculty = "delete from faculty where faculty_id='$delete_faculty_id'";
        
        $run_delete = mysqli_query($con,$delete_faculty);
        
        if($run_delete){
            
            echo "<script>alert('One faculty has been Deleted')</script>";
            
            echo "<script>window.open('index.php?faculty_view','_self')</script>";
            
        }
        else{
            echo "<script>alert('Something Went Wrong, Please Retry')</script>";
        }
        
    }

?>

<?php } ?>