<?php
//fetch.php
include("includes/db.php");
if(isset($_POST["action"]))
{
    $output = '';
    if($_POST["action"] == "exam_type")
    {
        $query = "SELECT exam_details_date FROM exam_details WHERE exam_type_title = '".$_POST["query"]."'";
        $result = mysqli_query($con, $query);
        $output .= '<option value="" selected disabled>Select Date</option>';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '<option value="'.$row['exam_details_date'].'">'.$row['exam_details_date'].'</option>';
        }
    }

    if($_POST["action"] == "exam_date")
    {
        $query = "SELECT exam_details_session FROM exam_details WHERE exam_details_date = '".$_POST["query"]."'";
        $result = mysqli_query($con, $query);

        $output .= '<option value="" selected disabled>Select Session</option>';

        while($row = mysqli_fetch_array($result))
        {
            $x = $row['exam_details_session'];
            for($i=1;$i<=$x;$i++){
                $output .= '<option value="'.$i.'">'.$i.'</option>';
            }
        }
    }
    echo $output;
}
?>