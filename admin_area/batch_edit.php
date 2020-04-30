<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['batch_edit'])){
        
        $edit_batch_id = $_GET['batch_edit'];
        
        $edit_batch_query = "select * from batches where id='$edit_batch_id'";
        
        $run_edit = mysqli_query($con,$edit_batch_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $batch_name = $row_edit['batch_name'];
        
        $stream_name = $row_edit['stream_name'];

        $department_name = $row_edit['department_name'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Batch
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Batch
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Stream Name
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->

                            <select name="stream_name" class="form-control"><!-- form-control Begin -->
                            
                                <option selected><?php echo $stream_name;?></option>
            
                                <?php 
                            
                                $get_stream = "select * from stream";
                                $run_stream = mysqli_query($con,$get_stream);
                            
                                while ($row_stream=mysqli_fetch_array($run_stream)){
                                
                                    $id = $row_stream['stream_name'];
                                    
                                    echo "
                                    <option value='$id'> $id </option>
                                    ";
                                }
                                ?>

                            </select>
                            
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Department Name   
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           
                            <select name="department_name" class="form-control"><!-- form-control Begin -->
                            
                                <option selected><?php echo $department_name;?></option>
                    
                                <?php 
                            
                                $get_department = "select * from departments";
                                $run_department = mysqli_query($con,$get_department);
                            
                                while ($row_department=mysqli_fetch_array($run_department)){
                                
                                    $department_id = $row_department['department_id'];
                                    $department_name = $row_department['department_name'];
                                    echo "
                                    <option value='$department_name'> $department_name </option>
                                    ";
                                }
                                ?>
                                <option value='null'> NULL </option>
                                

                            </select>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Batch Name   
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           
                            <select name="batch_name" class="form-control"><!-- form-control Begin -->
                            
                                <option selected> <?php echo $batch_name?> </option>
                                <option value='First Year'> First Year </option>
                                <option value='Second Year'> Second Year </option>
                                <option value='Third Year'> Third Year </option>
                                <option value='Final Year'> Final Year</option>

                            </select>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update Batch" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['update'])){
              
              $stream_name = $_POST['stream_name'];
              
              $department_name = $_POST['department_name'];

              $batch_name = $_POST['batch_name'];
                
                $update_batch = "update batches set stream_name='$stream_name',department_name='$department_name',batch_name='$batch_name' 
                where id='$edit_batch_id'";
                
                $run_batch = mysqli_query($con,$update_batch);
                
                if($run_stream){
                    
                    echo "<script>alert('Your batch Has Been Updated')</script>";
                    
                    echo "<script>window.open('index.php?batch_view','_self')</script>";
                    
                }
              
              
          }

?>



<?php } ?> 