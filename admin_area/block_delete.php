<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['block_delete'])){
        
        $delete_block_id = $_GET['block_delete'];
        
        $delete_block = "delete from block_details where id='$delete_block_id'";
        
        $run_delete = mysqli_query($con,$delete_block);
        
        if($run_delete){
            
            echo "<script>alert('One block has been Deleted')</script>";
            
            echo "<script>window.open('index.php?block_view','_self')</script>";
            
        }
        
    }

?>

<?php } ?>