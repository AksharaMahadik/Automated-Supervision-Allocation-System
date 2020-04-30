<?php 
        
        if(!isset($_SESSION['admin_email'])){
            
            echo "<script>window.open('login.php','_self')</script>";
            
        }else{

    ?>

    <div class="row"><!-- row 1 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <ol class="breadcrumb"><!-- breadcrumb begin -->
                <li class="active"><!-- active begin -->
                    
                    <i class="fa fa-dashboard"></i> Dashboard / View Faculty
                    
                </li><!-- active finish -->
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
                
                    <i class="fa fa-tags"></i>  View Faculty
                    
                </h3><!-- panel-title finish --> 
                </div><!-- panel-heading finish -->
                
                <div class="panel-body"><!-- panel-body begin -->
                    <div class="table-responsive"><!-- table-responsive begin -->
                    <div id="docx">
                    <div class="WordSection1">
                        <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                            <thead><!-- thead begin -->
                                <tr><!-- tr begin -->
                                    <th> No: </th>
                                    <th> Faculty ID: </th>
                                    <th> Faculty Name: </th>
                                    <th> Designation: </th>
                                    <th> Department Name: </th>
                                    <th> Email:</th>
                                    <th> UT1:</th>
                                    <th> UT2:</th>
                                    <th> ESE:</th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody><!-- tbody begin -->
                                
                                <?php 

                                    $i=0;
                                
                                    $get_faculty = "select * from faculty order by id";
                                    
                                    $run_faculty = mysqli_query($con,$get_faculty);

                                    while($row_faculty=mysqli_fetch_array($run_faculty)){
                                        
                                        $faculty_id = $row_faculty['faculty_id'];
                                        
                                        $faculty_name = $row_faculty['faculty_name'];
                                        
                                        $designation = $row_faculty['designation'];

                                        $department_name = $row_faculty['department_name'];
                                        
                                        $contact = $row_faculty['contact'];

                                        $email = $row_faculty['email'];

                                        $ut1 = $row_faculty['UT1_remain'];

                                        $ut2 = $row_faculty['UT2_remain'];

                                        $ese = $row_faculty['ESE_remain'];

                                        $i++;

                                ?>

                                <tr><!-- tr begin -->
                                    <td> <?php echo $i; ?> </td>
                                    <td> <?php echo $faculty_id; ?> </td>
                                    <td> <?php echo $faculty_name; ?> </td>
                                    <td> <?php echo $designation; ?> </td>
                                    <td> <?php echo $department_name;?></td>
                                    <td> <?php echo $email;?></td>
                                    <td> <?php echo $ut1;?></td>
                                    <td> <?php echo $ut2;?></td>
                                    <td> <?php echo $ese;?></td>
     
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
//$pdf_name = "Faculty-Allocation-Report";

link.download = '<?php echo "Faculty_Allocation_Report";?>';    
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