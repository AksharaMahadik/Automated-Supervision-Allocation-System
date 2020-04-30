<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['stream_edit'])){
        
        $edit_stream_id = $_GET['stream_edit'];
        
        $edit_stream_query = "select * from stream where id='$edit_stream_id'";
        
        $run_edit = mysqli_query($con,$edit_stream_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $stream_name = $row_edit['stream_name'];
        
        $graduate_name = $row_edit['graduate_name'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Stream
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Stream
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Stream Name
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $stream_name; ?>" name="stream_name" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 

                            Graduate Name   
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           
                            <select name="graduate_name" class="form-control"><!-- form-control Begin -->
                            
                                <option selected> <?php echo $graduate_name;?> </option>
                                <option value='UG'> Under Graduate </option>
                                <option value='PG'> Post Graduate </option>
                            
                            </select>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update Stream" name="update" type="submit" class="form-control btn btn-primary">
                        
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
              
              $graduate_name = $_POST['graduate_name'];

                
                $update_stream = "update stream set stream_name='$stream_name',graduate_name='$graduate_name' where id='$edit_stream_id'";
                
                $run_stream = mysqli_query($con,$update_stream);
                
                if($run_stream){
                    
                    echo "<script>alert('Your Stream Has Been Updated')</script>";
                    
                    echo "<script>window.open('index.php?stream_view','_self')</script>";
                    
                }
              
              
          }

?>



<?php } ?> 