<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "ecom_store");  
      $sql = "SELECT * FROM students_block_allocation";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                            
                          <td>'.$row["exam_type"].'</td>
                          <td>'.$row["exam_date"].'<br><br>'.$row["time"].'</td>  
                           
                          
                          <td>'.$row["course_name"].'</td>  
                          <td>'.$row["class_room"].'<br><br>'.$row["department_name"].' </td>  
                            
                          <td>'.$row["capacity"].'</td>  
                          <td>'.$row["student_roll"].'</td>
                          
                          
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf_min/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '1', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
     // $obj_pdf->SetAutoPageBreak(TRUE, 3);  
      $obj_pdf->SetFont('helvetica', '', 10);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Report of student allocation for UT</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="2">  
           <tr>  
                
                <th width="10%">exam_type</th> 
                <th width="10%">exam_date</th>  
                
                
                <th width="10%">course_name</th> 
                <th width="10%">class_room</th>  
                 
                <th width="10%">capacity</th>  
                <th width="50%">student_roll</th>
                
                
                
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:1000px;">  
                <h3 align="center">Report of student allocation for UT</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                                
                               <th width="10%">exam_type</th>
                               <th width="10%">exam_date</th>  
                                
                                
                               <th width="10%">course_name</th> 
                              <th width="10%">class_room</th>  
                               
                               <th width="10%">capacity</th> 
                               <th width="50%">student_roll</th>
                              
                              
                               
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
