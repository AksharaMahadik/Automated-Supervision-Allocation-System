<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['department_delete'])){
        
        $delete_department_id = $_GET['department_delete'];
        
        $delete_department = "delete from departments where department_id='$delete_department_id'";
        
        $run_delete = mysqli_query($con,$delete_department);
        
        if($run_delete){
            
            echo "<script>alert('One Department has been Deleted')</script>";
            
            echo "<script>window.open('index.php?department_view','_self')</script>";
            
        }
        
    }

?>

<?php } ?>