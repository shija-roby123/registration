<?php 
include('connection.php');
   $userName = $_POST["userName"]; 
   $userEmail = $_POST["userEmail"]; 
   $userPhone = $_POST["userPhone"]; 
   $userAge = $_POST["userAge"]; 
   $userType = $_POST["userType"]; 
   //$userImage = $_POST["fileToUpload"]; 
   $userHobbies = $_POST["userHobbies"]; 



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

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
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
    $sql= "INSERT INTO users 
    (user_name,user_email,user_phone,user_age,user_type,user_image,user_hobbies) VALUES('$userName','$userEmail','$userPhone','$userAge','$userType','$image','$userHobbies')";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: user_list.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: register.php");
      }
  } else {
    $sql= "INSERT INTO users 
    (user_name,user_email,user_phone,user_age,user_type,user_hobbies) VALUES('$userName','$userEmail','$userPhone','$userAge','$userType','$userHobbies')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: user_list.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: register.php");
      }
   // echo "Sorry, there was an error uploading your file.";
  }
}




?>