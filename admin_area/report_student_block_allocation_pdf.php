<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>



<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Student Block Allocation 
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->



<button id="export" class="btn btn-lg btn-danger clearfix"></span>Download</button>
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
                                    
                            <h5>K.E.Society's <b>Rajarambapu Institute of Technology, Rajaramnagar</b>,(An Autonomous Institute, affiliated to Shivaji University, Kolhapur)
                            </h5>                      
                        
                            <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th width = "3%">No: </th>
                                <th width = "5%">Type: </th>
                                <th width = "8%">Date: </th>
                                <th width = "8%">Time: </th>
                                <th width = "5%">Location:</th>
                                <th width = "5%">Bench:</th>
                                <th width = "5%">Course: </th>
                               
                                <th width = "56%">Students: </th>
                                <th width = "5%">Total:</th>

                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_slots = "select * from students_block_allocation ORDER BY 
                                class_room desc,
                                bench_side desc,
                                capacity asc
                                 ";
                                
                                $run_slots = mysqli_query($con,$get_slots);
          
                                while($row_slots=mysqli_fetch_array($run_slots)){
                                      
                                    $slot_id       = $row_slots['id'];
                                    $exam_type     = $row_slots['exam_type'];
                                    $exam_date     = $row_slots['exam_date'];                                    
                                   
                                    $time          = $row_slots['time'];
                                    $exam_session = $time;                 
                                    $course_name = $row_slots['course_name'];
                                    $location  = $row_slots['class_room'];
                                    $location .= " ";
                                    $location .= $row_slots['department_name'];
                                    $students  = $row_slots['student_roll'];
                                    $pdf_name = $exam_type . "-" . $exam_date . "-" .$time;                                   
                                        
                                   
                                    $capacity  = $row_slots['capacity'];
                                    $bench_l   = $row_slots['course_name_l'];
                                    $bench_side = $row_slots['bench_side'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo "<b>".$i."</b>"; ?> </td>
                                <td> <?php echo $exam_type; ?></td>
                                <td> <?php echo $exam_date; ?></td>
                                <td> <?php echo $exam_session;?> </td>
                                <td> <?php echo $location;?> </td>
                                <td> <?php echo "<b>".$bench_side."</b>";?></td>
                                <td> <?php echo $course_name;?> </td>
                                <!--<td> <<1?php echo $bench_side?></td>-->
                                <td> <?php echo $students;?> </td>
                                <td> <?php echo $capacity;?></td>

                                
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                            
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
            'table{border-collapse:collapse;}td{border:1px gray solid;width:8em;padding:2px;}'+
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