<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php
//index.php
$exam_type = '';
$query = "SELECT exam_type_title FROM exam_type GROUP BY exam_type_title ORDER BY exam_type_title ASC";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
 $exam_type .= '<option value="'.$row["exam_type_title"].'">'.$row["exam_type_title"].'</option>';
}
?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Supervision Block Allocation
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<button id = "export" class="btn btn-lg btn-danger clearfix">Download</button>
<br><br>
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Exam Block Allocation
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                
                 <div id="docx">
                    <div class="WordSection1">
                        <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                            
                        <h4>K.E.Society's <b>Rajarambapu Institute of Technology, Rajaramnagar</b>,(An Autonomous Institute, affiliated to Shivaji University, Kolhapur)
                            </h4> 

                            <thead><!-- thead begin -->
                                <tr><!-- tr begin -->
                                    <th width="3%">No: </th>
                                    <th width="7%">Type: </th>
                                    <th width="10%">Date: </th>
                                    <th width="18%">Session: </th>
                                    <th width="16%">Location:</th>
                                    <th width="7%">Side:</th>
                                    <th width="">Faculty: </th>
                                    

                                
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->
                            
                            <tbody><!-- tbody begin -->
                                
                                <?php 
            
                                    $i=0;
                                
                                    $get_slots = "select * from supervision_block_allocation ORDER BY id asc,
                                    exam_date ASC,
                                    exam_session ASC";
                                    
                                    $run_slots = mysqli_query($con,$get_slots);
            
                                    while($row_slots=mysqli_fetch_array($run_slots)){
                                        
                                        $slot_id = $row_slots['id'];
                                        $exam_type = $row_slots['exam_type'];
                                        $exam_date = $row_slots['exam_date'];                                    
                                        //$exam_session = $row_slots['exam_session'];                  
                                        $exam_session = $row_slots['time'];
                                        $location = $row_slots['class_room'];
                                        $location .= " ";
                                        $location .= $row_slots['department_name'];
                                        $bench_side = $row_slots['side'];
                                        $faculty = $row_slots['faculty_name'];
                                        $faculty .= "<br>(".$row_slots['email'].")";
                                        $pdf_name = $exam_type . "-" . $exam_date;                                   
                                       
                                        
                                        $i++;
                                
                                ?>
                                
                                <tr><!-- tr begin -->
                                    <td> <?php echo $i; ?> </td>
                                    <td> <?php echo $exam_type; ?></td>
                                    <td> <?php echo $exam_date; ?></td>
                                    <td> <?php echo $exam_session;?> </td>
                                    <td> <?php echo $location;?> </td>
                                    <td> <?php echo $bench_side;?></td>
                                    <td> <?php echo $faculty;?> </td>
                                    
                                
                                </tr><!-- tr finish -->
                                
                                <?php } ?>
                                
                            </tbody><!-- tbody finish -->
                            <!---
                            <table>
                                <h4>Instructions:</h4>
                                <p>
                                        <ol style="text-align:justify;">
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
                            </table>
                            ---->
                        </table><!-- table table-striped table-bordered table-hover finish -->
                    </div>
                  </div>
                 
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
    
</div><!-- row 2 finish -->


<script type="text/javascript">//<![CDATA[

window.onload=function(){
  
/* HTML to Microsoft Word Export Demo 
* This code demonstrates how to export an html element to Microsoft Word
* with CSS styles to set page orientation and paper size.
* Tested with Word 2010, 2013 and FireFox, Chrome, Opera, IE10-11
* Fails in legacy browsers (IE<10) that lack window.Blob object
*/
window.export.onclick = function() {

if (!window.Blob) {
  alert('Your legacy browser does not support this action.');
  return;
}

var html, link, blob, url, css;

// EU A4 use: size: 841.95pt 595.35pt;
// US Letter use: size:11.0in 8.5in;

css = (
 '<style>' +
 '@page WordSection1{size: 841.95pt 595.35pt;mso-page-orientation: landscape;}' +
 'div.WordSection1 {page: WordSection1;}' +
 'table{border-collapse:collapse;}td{border:1px gray solid;width:5em;padding:2px;}'+
 '</style>'
);

html = window.docx.innerHTML;
blob = new Blob(['\ufeff', css + html], {
 type: 'application/msword'
});
url = URL.createObjectURL(blob);
link = document.createElement('A');
link.href = url;
// Set default file name. 
// Word will append file extension - do not add an extension here.
link.download = '<?php echo "$pdf_name";?>';    
document.body.appendChild(link);
if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, 'Document.doc'); // IE10-11
       else link.click();  // other browsers
document.body.removeChild(link);
};


}

//]]></script>

<script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
      window.parent.parent.postMessage(["resultsFrame", {
        height: document.body.getBoundingClientRect().height,
        slug: "80u2hr9z"
      }], "*")
    }

    // always overwrite window.name, in case users try to set it manually
    window.name = "result"
  </script>


<?php } ?> 