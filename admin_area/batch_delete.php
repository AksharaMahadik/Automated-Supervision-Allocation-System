<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['batch_delete'])){
        
        $delete_batch_id = $_GET['batch_delete'];
        
        $delete_batches = "delete from batches where id='$delete_batch_id'";
        
        $run_delete = mysqli_query($con,$delete_batches);
        
        if($run_delete){
            
            echo "<script>alert('One Batch has been Deleted')</script>";
            
            echo "<script>window.open('index.php?batch_view','_self')</script>";
            
        }
        
    }

?>

<?php } ?>