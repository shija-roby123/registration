<?php 
include('connection.php');
   $userId = $_POST["hiddenId"];
   $userName = $_POST["userName"]; 
   $userEmail = $_POST["userEmail"]; 
   $userPhone = $_POST["userPhone"]; 
   $userAge = $_POST["userAge"]; 
   $userType = $_POST["userType"]; 
   $userHobbies = $_POST["userHobbies"]; 
   $hiddenImage = $_POST["hiddenImage"];


$target_dir = "uploads/";
$image = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $sql= "UPDATE users SET
    user_name='$userName',user_email='$userEmail',user_phone='$userPhone',user_age='$userAge',user_type='$userType',user_image='$image',user_hobbies='$userHobbies' WHERE id='$userId' ";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "User data updated successfully";
        header("Location: user_list.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: user_list.php");
      }
  } else {
    $sql= "UPDATE users SET
    user_name='$userName',user_email='$userEmail',user_phone='$userPhone',user_age='$userAge',user_type='$userType',user_image='$hiddenImage',user_hobbies='$userHobbies' WHERE id='$userId' ";
    if ($conn->query($sql) === TRUE) {
        echo "User data updated successfully";
        header("Location: user_list.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: user_list.php");
      }
   // echo "Sorry, there was an error uploading your file.";
  }
}




?>