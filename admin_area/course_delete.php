<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['course_delete'])){
        
        $delete_course_id = $_GET['course_delete'];
        
        $delete_course = "delete from courses where course_id='$delete_course_id'";
        
        $run_delete = mysqli_query($con,$delete_course);
        
        if($run_delete){
            
            echo "<script>alert('One course has been Deleted')</script>";
            
            echo "<script>window.open('index.php?course_view','_self')</script>";
            
        }
        
    }

?>

<?php } ?>