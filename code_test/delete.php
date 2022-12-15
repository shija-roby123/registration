<?php
include('connection.php');
 $userId = $_GET["id"];
$sql = "DELETE FROM users WHERE id=$userId";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: user_list.php");
} else {
    header("Location: user_list.php");
 // echo "Error deleting record: " . $conn->error;
}


?>