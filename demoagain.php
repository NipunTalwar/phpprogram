<link rel="stylesheet" type="text/css" href="attendances.css">
<?php
$rec_limit = 5;
 include('attendanceconnect.php'); 
 
   $id=$_GET['a'];

         if(isset($_GET{'page_'} ) ) {
            $page = $_GET{'page_'} + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }  


 $left_rec = $rec_count - ($page * $rec_limit);
     $sql = "SELECT * ". 
            "FROM empleave ".
            "LIMIT $offset, $rec_limit";
       $result = $conn->query($sql);
        echo'<h2> <center> <strong> Employee Leave Data </strong> </center> </h2>';
  if($result->num_rows > 0) {
    // output data of each row
     echo" <table border='1' id='example' class='table table-striped table-bordered' cellspacing='0' width='100%'>";
      echo '<tr>
           
                     <td><strong> Id </strong></td>
                     <td><strong>Employee Name </strong></td>
      
                     <td><strong> Leave Type  </strong> </td>
                     <td><strong> Select From </strong> </td>
                     <td><strong>  Select To  </strong> </td>
                     <td><strong>Hourtaken    </strong> </td>
                     <td><strong> Reason      </strong> </td>
                     <td class="adminx"><strong>  Approval Needed </strong></td>
                     <td class="commentx"><strong> Comment </strong></td>


       </tr>';  
            
         while($row = $result->fetch_assoc()) {
       
            echo "<tr class='tablecontentlef'>";
       
     

          echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["empname"]."</td>";
      
               echo "<td>" .$row["leavetype"].      "</td>";
                 echo "<td>" .$row["selectfrom"].   "</td>";
                   echo "<td>" .$row["selectto"].   "</td>";
                     echo "<td>" .$row["hourtaken"]."</td>";
                        echo "<td>" .$row["reason"]."</td>";
       ?>
       </tr>
       <form method='POST'> 
       <tr class="table-right">
       <td ><label> Admin Approval Needed </label> : <select name ='options' id='options'>
                                        
      <option value ='approved'>       Approved </option>
      <option value ='disapproved'> Disapproved </option> </td>

      </select><td><input type='text' value=<?php echo $row['id'] ?> class='name' name='id'/></td><td > <label> Comment </label> : <textarea rows='1' name='comment' cols='10' id='comment'>  </textarea> <input type='submit' name='save' value='save' class='submit'>
      
      </form>
      </tr>
                                              
      <?php


       echo "<td>" .$n= $row["app"]."</td>";

      
     
   }
echo"</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

     
<!DOCTYPE>
<html>
<head>
  
  <link   rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">   </script>
  <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
</head>

<body>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  
<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable();
} );



</script>


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



<?php


       


         echo "</table>";
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Next Page</a> |";
            echo "<a href = \"$_PHP_SELF?page = $page\">Next Page</a>";
         

         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page = $page\">Next Page</a>";
         
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Next Page</a>";
         } 


?>