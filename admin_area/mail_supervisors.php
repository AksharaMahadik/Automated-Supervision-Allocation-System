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
<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Send Mail Before" name="sendmailbefore" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
</form>

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
        $headers .= 'From: Akshara Mahadik<aksharamahadik1533@gmail.com>'.$eol;
        $headers .= 'Reply-To: Akshara Mahadik<aksharamahadik1533@gmail.com>'.$eol;
        $headers .= 'Return-Path: Akshara Mahadik<aksharamahadik1533@gmail.com>'.$eol;     // these two to set reply address
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

        
        //$get_customer = "select * from supervision_block_allocation";

       // $run_customer = mysqli_query($con,$get_customer);
        //$count = mysqli_num_rows($run_customer);
        
        //while($row_customer=mysqli_fetch_array($run_customer)){
          {
            $email = 'aksharamahadik1533@gmail.com';
            $emailaddress=$email;
            $msg .= "--".$mime_boundary."--".$eol.$eol;   // finish with two eol's for better security. see Injection.
            # SEND THE EMAIL
            $success = mail($emailaddress, $emailsubject, $msg, $headers);
            $msg1=$attachment;
            $insert_email_user = "insert into email_system_works_email (email,subject,msg) values
            ('$emailaddress','$emailsubject','$msg')";
            $run_insert_email_user = mysqli_query($con,$insert_email_user);

        }
        if($success)
        {
            echo "<script>alert('$count Mail Sent successfully')</script>";
        }
        else{
            $errorMessage = error_get_last()['message'];
        }
    }

    if(isset($_POST['sendmailbefore'])){
        //echo "<script>alert('Mail Sent successfully')</script>";
        # Is the OS Windows or Mac or Linux
        if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
            $eol="\r\n";
            } elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
            $eol="\r";
            } else {
            $eol="\n";
            } 
        $headers = '';
        $headers .= 'From: Akshara Mahadik<aksharamahadik1533@gmail.com>'.$eol;
        $headers .= 'Reply-To: Akshara Mahadik<aksharamahadik1533@gmail.com>'.$eol;
        $headers .= 'Return-Path: Akshara Mahadik<aksharamahadik1533@gmail.com>'.$eol;     // these two to set reply address
        $headers .= "Message-ID:<TheSystem@".$_SERVER['SERVER_NAME'].">".$eol;
        $headers .= "X-Mailer: PHP v".phpversion().$eol;           // These two to help avoid spam-filters
        # Boundry for marking the split & Multitype Headers
        $mime_boundary=md5(time());
        $headers .= 'MIME-Version: 1.0'.$eol;
        //$headers .= "Content-Type: multipart/related; boundary=\"".$mime_boundary."\"".$eol;
        //$headers = "From Ahmad \r\n";
        //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
        //$headers .= "CC: susan@example.com\r\n";
        //$headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . $eol;

        $msg = "";


       

        $count1=1;

        $select_faculty_id = "SELECT DISTINCT faculty_id from supervision_block_allocation_final";
        $run_select_faculty_id = mysqli_query($con,$select_faculty_id);
        while($row_select_faculty_id = mysqli_fetch_array($run_select_faculty_id)){
            $msg="";
            $faculty_id = $row_select_faculty_id['faculty_id'];

            $get_faculty_name = "select * from faculty where faculty_id = '$faculty_id'";
            $run_faculty_name = mysqli_query($con,$get_faculty_name);
            while($row_faculty_name = mysqli_fetch_array($run_faculty_name)){
                $faculty_name = $row_faculty_name['faculty_name'];
                $dept_name = $row_faculty_name['department_name'];
            }
            $i=1;
            $supervision_faculty = "<center><b>ADMIT</b></center><br><br>";
            $supervision_faculty .= "<b>Name: </b>".$faculty_name."<br>"."<b>DEPT. :</b> ".$dept_name."<br><br>";
            //$supervision_faculty .= "Name of the Examination: ";
            $supervision_faculty .= "<center><b>Date & Time of Supervision:</b></center><br><br>";
            $supervision_faculty .= "<table class='table table-striped table-bordered table-hover'>
                                        
                                        <thead>
                                            <tr>
                                                <th>Sr.No:</th>
                                                <th>Date:</th>
                                                <th>Time:</th>
                                            </tr>
                                        </thead>
            
                                    
                                    ";
            
            $select_details_final = "select * from supervision_block_allocation_final where faculty_id = '$faculty_id'";
            $run_select_details_final = mysqli_query($con,$select_details_final);
            while($row_select_details_final = mysqli_fetch_array($run_select_details_final)){

                $date = $row_select_details_final['exam_date'];
                $time = $row_select_details_final['time'];
                
                $supervision_faculty .= "
                    
                        <tr>
                            <td>".$i++.")"."</td>
                            <td>"."[".$date."]"."</td>
                            <td>"."[".$time."]"."</td>
                        </tr>
                    
                ";

            }
            $body = '';
            $supervision_faculty .="</table>
            <table>
                                <h4>Instructions:</h4>
                                <p>
                                        <ol style='text-align:justify;'>
                                            <li>Supervisor shall be in attendance at the place of the examination at least <b>Thirty Minutes</b> before.<br>The setting of the first paper & fifteen minutes before the setting of each subsequent paper.</li>
                                            <li>In distributing question papers, junior supervisors shall begin to hand over the papers from the last candidate in the respective blocks.</li>
                                            <li>Additional answer book shall be given only when the book previously given for the whole paper or section is written in, after verifying it personally by the senior supervisor such cases are to be reported 
                                            by the senior supervisor to the R.I.T. on every day. The junior supervisor is not allowed to supply an additional answer book to the student without the permission of the senior supervisor,
                                            junior supervisor shall take particular care to collect all answer books whether used or unused and shall see that no candidate is allowed to retain with him any blanks answer books after the warning bell is rung.</li>
                                            <li>While the examination is going on, junior supervisor shall carefully look after the block fo candidates to which they are assigned.</li>
                                            <li>Supervisor shall use the utmost vigilance to prevent copying or communication by the candidate with one another or with they are assigned.</li>
                                            <li>Adjustment of Jr. Supervision duty (if any) will be allowed with written permission of COE only.</li>
                                            <li>Jr. Supervisor should report exam. <b> Control room 30 min before the exam.</b></li>
                                        </ol>
                                </p>
            </table>";
            $msg .= $supervision_faculty;
             # Setup for text OR html
             
            $emailsubject= "Testing : Date and Time Supervision";
            $emailaddress="aksharamahadik1533@gmail.com";
            
            //$supervision_faculty = "hello";
            $success = mail($emailaddress, $emailsubject, $msg, $headers);
            //$successs= mail("aksharamahadik1533@gmail.com",$emailsubject, $msg, $headers);
            $count1++;
        }
        if($success)
        {
            echo "<script>alert('$count1 Mail Sent successfully')</script>";
        }
        else{
            $errorMessage = error_get_last()['message'];
        }
        
    }
?>


<?php } ?>