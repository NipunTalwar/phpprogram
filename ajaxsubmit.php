<?php
	


    include('attendanceconnect.php');

	// print_r($_POST);
 // die;
	echo $approve     = $_POST['options'];
	echo $comment     = $_POST['comment'];
	echo $id          = $_POST['id'];




$sql = "UPDATE empleave SET `approve` = '".$approve."', `comment` = '".$comment."' WHERE `id` = '".$id."'";

// print_r($sql);
$res = mysqli_query($conn,$sql);


if($res) {
    echo "Record updated successfully";
} else {
    echo "Error updating record:" . $conn->error;
}

$conn->close();


?>
