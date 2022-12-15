<!DOCTYPE html>
<html>
<body>
<form action="register_action.php" method="POST" id="register" name="register" enctype="multipart/form-data" onsubmit="validation()">
  <label for="fname">Name:</label><br>
  <input type="text" id="userName" name="userName"  min="2"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="userEmail" name="userEmail" min="2"><br><br>
  <label for="phone">Phone:</label><br>
  <input type="text" id="userPhone" name="userPhone" min="10"><br><br>
  <label for="age">Age:</label><br>
  <input type="text" id="userAge" name="userAge" min="2"><br><br>
  <label for="sex">Sex:</label><br>
  <select id="userType" name="userType">
  <option value="">Select option</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select><br><br>
  <label for="image">Profile Image:</label><br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
  <label for="hobbies">Hobbies:</label><br>
  <textarea id="userHobbies" name="userHobbies" rows="4" cols="50"></textarea><br><br>
  <input type="submit" value="Submit">
</form> 

<script>
    function validation(){
        // var input = document.getElementById("input");
        // if(!input.checkValidity()){
        //     document.getElementById("register").innerHTML =  input.validationMessage;
        // }

        let text = "Value OK";
  if (document.getElementById("userName").validity.rangeUnderflow) {
    text = "Please enter name";
  }
  if (document.getElementById("userEmail").validity.rangeUnderflow) {
    text = "Please enter email";
  }
  if (document.getElementById("userPhone").validity.rangeUnderflow) {
    text = "Please enter phone numer";
  }

    }
</script>
</body>
</html>
