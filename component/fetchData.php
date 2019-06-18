<?php
 session_start();//start session if session not start
   include('../config/dbconnect.php');

   if(isset($_POST["action"]))
   {
    $query = "SELECT * FROM courses WHERE courseStatus = '1'";
 

    if(isset($_POST["courseCategory"]))
    {
     $courseCategoryFilter = implode("','", $_POST["courseCategory"]);
     $query .= "AND courseCategory IN('".$courseCategoryFilter."')";
    }
    if(isset($_POST["courseLanguage"]))
    {
     $courseLanguageFilter = implode("','", $_POST["courseLanguage"]);
     $query .= "AND courseLanguage IN('".$courseLanguageFilter."')";
    }

 $result = $con->query($query);
 $output = '';
 if ($result->num_rows > 0) 
 {
    while($row = $result->fetch_assoc()) 
  {
   $output .= '
   <div class="col-sm-4 col-lg-3 col-md-3">
   <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:430px; width:200px">
   <img src="../assets/images/courses/'. $row['courseImg'] .'" alt="" class="img-responsive" style="width:170px;height:200px">
    <p align="center"><strong><a href="#">'. $row['courseName'] .'</a></strong></p>
    <span><strong><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;:&nbsp;'. $row['courseDate'] .'</strong></span><br/>
      <span><strong><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;:&nbsp;'. $row['courseTime'] .'</strong></span>
      <div style="position:absolute;bottom:0px;margin:30px 0px;">
      <h6 style="font-weight:600;color:red;margin:15px 0px;font-size:18px" class="text-danger" >Start From : $'. $row['coursePrice'] .'</h6>
      
      <a href="booking_ticket_page.php?courseID='. $row['courseID'] .'">
      <button class="btn btn-warning" name="bookCourse" style="margin:0px 36px">Buy Now
     </button>
     </a>
     </div>
   </div>

  </div>
   ';
  }
 }else{
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>


