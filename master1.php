

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Web Forte Technologies Pvt Ltd </a>
       <h6> <strong> </strong> </h6>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="#"></a></li>
      <li><a href="#"></a></li>
      
    </ul>




    <?php if($_SESSION){ ?>
      <div class = "btn-group">
   
   <button type = "button" class = "btn btn-default dropdown-toggle" data-toggle = "dropdown">
      Welcome: 
      <?php
 
include('attendanceconnect.php');

 $sel = "SELECT empname FROM empleave WHERE lid = $id";
$result = $conn->query($sel);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        echo $row["empname"]."";
    }
} else {
    echo "0 results";
}
$conn->close();





?>

      <span class = "caret"></span>
   </button>
   
   <ul class = "dropdown-menu" role = "menu">
      <li><a href = "#">Messages</a></li>
      <li><a href = "#">Friends</a></li>
      <li><a href = "#">Notifications</a></li>
      <li><a href = "logout.php">Logout</a></li>
      <li class = "divider">  </li>
      
   </ul>
</div>
<?php } ?>
  </div>


</nav>
  
<div class="container">
  <h3></h3>
  <p></p>
</div>

</body>
</html>
