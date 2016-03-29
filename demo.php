<link rel="stylesheet" type="text/css" href="attendances.css">
<?php
include('attendanceconnect.php');
$id=$_GET['a'];

$sql = "SELECT * FROM empleave ";
$result = $conn->query($sql);
  echo" <h1> <center> Employee Leave Data </center> </h1> ";
if ($result->num_rows > 0) {
    // output data of each row
   echo" <table border='1'>";
    while($row = $result->fetch_assoc()) {
       
       echo "<tr class='tablecontentlef'>";
       


       echo "<td>" .$row["id"].       "</td>" ;
       echo "<td>" .$row["empname"].  "</td>";
      
       echo "<td>".$row["leavetype"]. "</td>";
       echo "<td>".$row["selectfrom"]."</td>";
       echo "<td>".$row["selectto"].  "</td>";
       echo "<td>".$row["hourtaken"]. "</td>";
       echo "<td>".$row["reason"].    "</td>";
       ?>
       </tr>
       <form method='POST' > 
       <tr class="table-right">
       <td><label> Admin Approval Needed </label> : <select name ='options' id='options'>
                                        
      <option value ='approved'>    Approved   </option>
      <option value ='disapproved'> Disapproved </option> </td>

      </select><td><input type='text' value=<?php echo $row['id'] ?> class='name' name='id'/></td><td> <label> Comment  </label> : <textarea rows='1' name='comment' cols='10' id='comment'>  </textarea> <input type='submit' name='save' value='save' class='submit'>
      </form>
      </tr>
                                              
		<?php


       echo "<td>" .$n= $row["app"]."</td>";

      
      // echo  approve;
  
      // echo  disapprove;
   
      // echo  comment;
      // echo  "<br>";
       
       // echo" </tr>";
   }
echo"</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

     
<!DOCTYPE>
<html>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>




<script type="text/javascript">

$(document).ready(function(){
$(".submit").click(function(){
	var id = $(this).parents('tr').children('td').children('.name').val();
    alert(id);
   


var options = $(this).parents('tr').children('td').children('#options').val();
alert(options);

var comment = $(this).parents('tr').children('td').children('#comment').val();
alert(comment);
/*var password = $("#password").val();
var contact = $("#contact").val();*/
// Returns successful data submission message when the entered information is stored in database.
var dataString = '&options='+ options + '&comment='+ comment + '&id='+ id ;
if(options==''||comment=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type   : "POST",
url    : "ajaxsubmit.php",
data   : dataString,
cache  : false,
success: function(result){
alert(result);
}

});
}
return false;
});
});

</script>
</body>
</html>

