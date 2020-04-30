<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['stream_delete'])){
        
        $delete_stream_id = $_GET['stream_delete'];
        
        $delete_stream = "delete from stream where id='$delete_stream_id'";
        
        $run_delete = mysqli_query($con,$delete_stream);
        
        if($run_delete){
            
            echo "<script>alert('One Stream has been Deleted')</script>";
            
            echo "<script>window.open('index.php?stream_view','_self')</script>";
            
        }
        
    }

?>

<?php } ?>