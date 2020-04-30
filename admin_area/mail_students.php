<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Send Mail
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Send Mail
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
    
                            Email Subject
    
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="" name="email_subject" type="text" class="form-control text text-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
    
                            Email
    
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="" name="email1" type="text" class="form-control text text-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->


                    <div class="form-group"><!-- form-group begin -->
                        
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
    
                            Attachment
    
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="" name="attachment" type="file" class="form-control file file-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Send Email" name="email" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->


<?php 
    if(isset($_POST['email'])){
        
        # Is the OS Windows or Mac or Linux
        if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
        $eol="\r\n";
        } elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
        $eol="\r";
        } else {
        $eol="\n";
        } 

        $emailsubject= $_POST['email_subject'];
        $attachment = $_FILES['attachment']['name'];
        $temp_name1 = $_FILES['attachment']['tmp_name'];
        move_uploaded_file($temp_name1,"reports_block_allocation/$attachment");
        $targetDir = "reports_block_allocation/";
        $fileName = basename($_FILES["attachment"]["name"]);
        
        # File for Attachment
        $f_name = $targetDir . $fileName;
        $handle=fopen($f_name, 'rb');
        $f_contents=fread($handle, filesize($f_name));
        $f_contents=chunk_split(base64_encode($f_contents));    //Encode The Data For Transition using base64_encode();
        $f_type=filetype($f_name);
        fclose($handle);
        
        # Message Subject
      
    
        # Message Body
        
        $body="hello there";
        
                
        # Common Headers
        $headers = '';
        $headers .= 'From: Shubham Patil<shubh411409@gmail.com>'.$eol;
        $headers .= 'Reply-To: Shubham Patil<shubh411409@gmail.com>'.$eol;
        $headers .= 'Return-Path: Shubham Patil<shubh411409@gmail.com>'.$eol;     // these two to set reply address
        $headers .= "Message-ID:<TheSystem@".$_SERVER['SERVER_NAME'].">".$eol;
        $headers .= "X-Mailer: PHP v".phpversion().$eol;           // These two to help avoid spam-filters
        # Boundry for marking the split & Multitype Headers
        $mime_boundary=md5(time());
        $headers .= 'MIME-Version: 1.0'.$eol;
        $headers .= "Content-Type: multipart/related; boundary=\"".$mime_boundary."\"".$eol;

        $msg = "";

        # Attachment
        $msg .= "--".$mime_boundary.$eol;
        $msg .= "Content-Type: application/pdf; name=\"".$f_name."\"".$eol;   // sometimes i have to send MS Word, use 'msword' instead of 'pdf'
        $msg .= "Content-Transfer-Encoding: base64".$eol;
        $msg .= "Content-Type: application/octet-stream; name=\"".$f_name."\"\n"
                ."Content-Description: ".$f_name."\n"
                ."Content-Disposition: attachment; filename=\"".$f_name."\"".$eol.$eol; // !! This line needs TWO end of lines !! IMPORTANT !!
        $msg .= $f_contents.$eol.$eol;
        # Setup for text OR html
        $msg .= "Content-Type: multipart/alternative".$eol;
        
        /*
        # Text Version
        $msg .= "--".$mime_boundary.$eol;
        $msg .= "Content-Type: text/plain; charset=iso-8859-1".$eol;
        $msg .= "Content-Transfer-Encoding: 8bit".$eol;
        $msg .= "This is a multi-part message in MIME format.".$eol;
        $msg .= "If you are reading this, please update your email-reading-software.".$eol;
        $msg .= "+ + Text Only Email from Genius Jon + +".$eol.$eol;

        # HTML Version
        $msg .= "--".$mime_boundary.$eol;
        $msg .= "Content-Type: text/html; charset=iso-8859-1".$eol;
        $msg .= "Content-Transfer-Encoding: 8bit".$eol;
        $msg .= $body.$eol.$eol;

        # Finished
        */
        # To Email Address

        
        
      
            $email = $_POST['email1'];
            $emailaddress=$email;
            $msg .= "--".$mime_boundary."--".$eol.$eol;   // finish with two eol's for better security. see Injection.
            # SEND THE EMAIL
            $success = mail($emailaddress, $emailsubject, $msg, $headers);
            $msg1=$attachment;
            $insert_email_user = "insert into email_system_works_email (email,subject,msg) values
            ('$emailaddress','$emailsubject','$msg')";
            $run_insert_email_user = mysqli_query($con,$insert_email_user);

        
        if($success)
        {
            echo "<script>alert('Mail Sent successfully')</script>";
        }
        else{
            $errorMessage = error_get_last()['message'];
        }
    }
?>


<?php } ?>