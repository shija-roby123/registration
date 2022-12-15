<?php
include('connection.php');
 $userId = $_GET["id"];
$sql = "SELECT * FROM users WHERE id=$userId";
$result = $conn->query($sql);
while ($row = $result->fetch_array())
{
$user_name = $row['user_name']; 
$user_email = $row['user_email']; 
$user_phone = $row['user_phone']; 
$user_age = $row['user_age']; 
$user_type = $row['user_type']; 
$user_image = $row['user_image']; 
$user_hobbies = $row['user_hobbies']; 
}
?>
<!DOCTYPE html>
<html>
<body>
<form action="edit_action.php" method="POST" id="register" name="register" enctype="multipart/form-data">
  <label for="fname">Name:</label><br>
  <input type="text" id="userName" name="userName" value="<?php echo $user_name;?>"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="userEmail" name="userEmail" value="<?php echo $user_email;?>"><br><br>
  <label for="phone">Phone:</label><br>
  <input type="text" id="userPhone" name="userPhone" value="<?php echo $user_phone;?>"><br><br>
  <label for="age">Age:</label><br>
  <input type="text" id="userAge" name="userAge" value="<?php echo $user_age;?>"><br><br>
  <label for="sex">Sex:</label><br>
  <select id="userType" name="userType">
  <option value="">Select option</option>
    <option value="Male" <?php if($user_type=='Male'){echo 'selected';}?>>Male</option>
    <option value="Female" <?php if($user_type=='Female'){echo 'selected';}?>>Female</option>
  </select><br><br>
  <label for="image">Profile Image:</label><br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <?php echo "<img src='uploads/".$user_image."'  style='width:100px'>"; ?>
  <br><br>
  <label for="hobbies">Hobbies:</label><br>
  <textarea id="userHobbies" name="userHobbies" rows="4" cols="50"><?php echo $user_hobbies;?></textarea><br><br>
  <input type="hidden" name="hiddenId" id="hiddenId" value="<?php echo  $userId;?>"/>
  <input type="hidden" name="hiddenImage" id="hiddenImage" value="<?php echo  $user_image;?>"/>
  <input type="submit" value="Submit">
</form> 
</body>
</html>
