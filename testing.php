<?php
include('attendanceconnect.php');
session_start();
$select=$_SESSION['utilitylogin'];
if(!($select=='utilitylogin'))
{
header("location: utilitylogin.php");
}


print_r ($_SESSION['']);

 $sel = "SELECT empname FROM empleave WHERE lid = 6";
$result = $conn->query($sel);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "welcome: " . $row["empname"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();



include('attendanceconnect.php');
$id=$_SESSION['id'];
if(isset($_POST['submit']))
{
// print_r($_POST);
 echo $empname     = $_POST['name'];
 echo $leavetype   = $_POST['options'];
 echo $selectfrom  = $_POST['date1'];
 echo $selectto    = $_POST['date2'];
 echo $hourtaken   = $_POST['hours'];
 echo $reason      = $_POST['comment'];
 
 /*$vacationfrom = $_POST['vacationfrom'];
 $too = $_POST['too'];
 $substitute = $_POST['substitute'];
 $comment = $comment['comment'];*/
  $sql = "INSERT INTO empleave(empname,leavetype,selectfrom,selectto,hourtaken,reason,lid) 
  VALUES('$empname','$leavetype','$selectfrom','$selectto','$hourtaken','$reason','$id')";
   $res = mysqli_query($conn,$sql);

  if ($res) {
    echo "New record created successfully";

}


}

 



?>



<!DOCTYPE html>
<html>
<head>
  <title></title>

  <meta charset="utf-8">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src = "http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src = "http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="attendances.css">
  
  <h1> <center> Attendance Management System </center> </h1>

</head>
<body>






<script type = "text/javascript">

$(document).ready(function () {
    
var select=function(dateStr) {

	
      var d1 = $('#date1').datepicker('getDate');
      var d2 = $('#date2').datepicker('getDate');
      var diff = 0;
      if (d1 && d2) {
            diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
          var total= diff * 8;

      }
  var abscence = total;
$('#calcula').val(abscence);


       $('#calculated').val(diff);

}



$("#date1").datepicker({ 
    //minDate: new Date(2012, 7 - 1, 8), 
    //maxDate: new Date(2012, 7 - 1, 28),
    onSelect: select
});
$('#date2').datepicker({onSelect: select});
});


</script>

  <form name="myform" method = "POST" action=""  >
  <ul>
   <li>

  <label>Employee Name    </label>   : <input  type  =  "text" name="name" required > </li>  <br>
 <li> <label>leave type       </label>   : <select name  =  "options">
                                         <option value =  "dynamic leave"> dynamic leave </option>
                                         </select>  </li> 

                                         <br>
    

     
    
     <!--   <label> Email Id        </label>   : <input type="text" name ="email" >           <br> -->

       <li> <label>Select from date </label>   : <input type="text" name="date1"           id = "date1"  class="datepicker" required> </li> <br>
        <li><label>Select to date   </label>   : <input type="text" name="date2"           id = "date2"  class="datepicker"  required> </li> <br>   
        <li><label>Hours Taken      </label>   : <input type="text" name="hours"   value="" id = "calcula" > </li> <br> 
       <li> <label>Reason for leave </label>   : <textarea rows="4" name="comment" cols="50" required> </textarea> </li>    <br>                          


<!--    <label>Select from date </label>   : <input type="text" name="date1" class="datepicker" >     <br>
        <label>Select to date   </label>   : <input type="text" name="date2" class="datepicker" >     <br> -->

   <li> <input type="submit" name="submit"  value="Submit"> </li>
   <li> <input type="reset"  name="reset"  value="cancel"> </li>

    </ul>



  </form>



<a class="logout" href="logout.php"> logout </a>

</body>
</html>



