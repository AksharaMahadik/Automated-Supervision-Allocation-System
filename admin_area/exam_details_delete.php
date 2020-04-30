<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['exam_details_delete'])){
        
        $delete_id = $_GET['exam_details_delete'];
        
        $delete = "delete from exam_details where id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete);
        
        if($run_delete){
            
            echo "<script>alert('One Detail has been Deleted')</script>";
            
            echo "<script>window.open('index.php?exam_details','_self')</script>";
            
        }
        
    }

?>

<?php } ?>