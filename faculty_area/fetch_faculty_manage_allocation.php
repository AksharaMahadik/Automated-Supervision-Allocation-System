<?php
//fetch.php

include("includes/db.php");
if(isset($_POST["action"]))
{

 $output = '';
 if($_POST["action"] == "exam_time")
 {
  $query = "SELECT  *
  FROM    faculty
  WHERE  faculty_id NOT IN (SELECT faculty_id FROM supervision_block_allocation_final)";
  $result = mysqli_query($con, $query);
  $output .= '<option value="">Manage leave</option>';
  while($row = mysqli_fetch_array($result))
  {
    $output .= '<option value="'.$row['faculty_id'].'">'.$row['faculty_name'].'</option>';
  }
} 
    
    echo $output;
}
?>