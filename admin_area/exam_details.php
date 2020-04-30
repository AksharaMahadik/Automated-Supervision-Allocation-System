<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Exam Details
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Exam Details
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Exam Date 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="exam_details_date" type="date" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                   
                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Exam Sessions for that day 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="exam_details_session" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Exam Type 
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="exam_type_title" class="form-control"><!-- form-control Begin -->
                        
                                    <option selected disabled> Select Type </option>
                                
                                    <?php 
                                
                                    $get_exam_type = "select * from exam_type";
                                    $run_exam_type = mysqli_query($con,$get_exam_type);
                                
                                    while ($row_product=mysqli_fetch_array($run_exam_type)){
                                    
                                        $exam_id = $row_product['id'];
                                        $exam_title = $row_product['exam_type_title'];
                                        echo "
                                        <option value='$exam_title'> $exam_title </option>
                                        ";
                                    }
                                    ?>
                            
                            </select>
                        </div>
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Choose Sem
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            <select name="exam_sem" class="form-control"><!-- form-control Begin -->
                        
                                    <option selected disabled> Select Sem </option>
                                    <option value='SEM-I'>SEM-I</option>
                                    <option value='SEM-II'>SEM-II</option>

                            </select>
                        </div>
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            Academic Year
                        
                        </label><!-- control-label col-md-3 finish --> 

                        <div class="col-md-6">
                            
                            <input name="exam_academic_year" type="text" class="form-control">

                        </div>
                    </div><!-- form-group finish -->



                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Submit Exam Type" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->



<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Exam Details
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Date: </th>
                                <th> Session: </th>
                                <th> Type: </th>
                                <th> SEM: </th>
                                <th> Academic Year:</th>
                        
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_slots = "select * from exam_details ORDER BY
                                exam_details_date ASC";
                                
                                $run_slots = mysqli_query($con,$get_slots);
          
                                while($row_slots=mysqli_fetch_array($run_slots)){
                                      
                                    $slot_id = $row_slots['id'];
                                    $exam_type = $row_slots['exam_type_title'];
                                    $exam_date = $row_slots['exam_details_date'];                                    
                                    $exam_session = $row_slots['exam_details_session'];                      
                                    $sem = $row_slots['sem'];
                                    $academic_year = $row_slots['academic_year'];

                                    $i++;
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $exam_date; ?></td>
                                <td> <?php echo $exam_session;?> </td>
                                <td> <?php echo $exam_type; ?></td>
                                <td> <?php echo $sem;?></td>
                                <td> <?php echo $academic_year;?></td>
                                
                                <td> 
                                     
                                     <a href="index.php?exam_details_delete=<?php echo $slot_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->

                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->



<?php  

          if(isset($_POST['submit'])){
              
              $exam_details_date = $_POST['exam_details_date'];
              $exam_details_session = $_POST['exam_details_session'];
              $exam_type_title = $_POST['exam_type_title'];
              $sem = $_POST['exam_sem'];
              $academic_year = $_POST['exam_academic_year'];
              
              $insert_exam_details = "insert into exam_details (exam_details_date,exam_details_session,exam_type_title,sem,academic_year) 
                    values ('$exam_details_date','$exam_details_session','$exam_type_title','$sem','$academic_year')";
              
              $run_exam_details = mysqli_query($con,$insert_exam_details);
              
              if($run_exam_details){
                  
                  echo "<script>alert('New Exam Details Has Been Inserted')</script>";
                  
                  echo "<script>window.open('index.php?exam_details','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 