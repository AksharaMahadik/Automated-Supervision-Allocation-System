<?php 
    
    if(!isset($_SESSION['faculty_id'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?> 

<div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Dashboard </h1>
        
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
            
                <i class="fa fa-dashboard"></i> Dashboard
            
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->



    
    <br><br><br><br>
    <div class="col-md-4"><!-- col-md-4 begin -->
        <div class="panel"><!-- panel begin -->
            <div class="panel-body"><!-- panel-body begin -->
                <div class="mb-md thumb-info"><!-- mb-md thumb-info begin -->

                    <img src="faculty_images/<?php echo $faculty_image; ?>" alt="<?php echo $faculty_image; ?>" class="rounded img-responsive">
                    
                    <div class="thumb-info-title"><!-- thumb-info-title begin -->
                       
                        <span class="thumb-info-inner"> <?php echo $faculty_name; ?> </span>
                        <span class="thumb-info-type"> <?php echo $designation; ?> </span>
                        
                    </div><!-- thumb-info-title finish -->

                </div><!-- mb-md thumb-info finish -->
                <br><br>
                <div class="mb-md"><!-- mb-md begin -->
                    <div class="widget-content-expanded"><!-- widget-content-expanded begin -->
                        <i class="fa fa-user"></i> <span> Email: </span> <?php echo $faculty_email; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Contact: </span> <?php echo $faculty_contact; ?> <br/>
                    </div><!-- widget-content-expanded finish -->
                    
                    <hr class="dotted short">
                    
                </div><!-- mb-md finish -->
                
            </div><!-- panel-body finish -->
        </div><!-- panel finish -->
    </div><!-- col-md-4 finish -->
    



<?php } ?>