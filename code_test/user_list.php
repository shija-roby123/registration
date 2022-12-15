<?php 
include('connection.php');
$select="SELECT * FROM users";
$result = $conn->query($select);
?>
<table>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Age</th>
    <th>Sex</th>
    <th>Image</th>
    <th>Hobbies</th>
    <th>Actions</th>
    <?php
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["user_name"]; ?></td>
        <td><?php echo $row["user_email"]; ?></td>
        <td><?php echo $row["user_phone"]; ?></td>
        <td><?php echo $row["user_age"]; ?></td>
        <td><?php echo $row["user_type"]; ?></td>
        <td><?php echo "<img src='uploads/".$row['user_image']."'  style='width:100px'>"; ?></td>
        <td><?php echo $row["user_hobbies"] ?></td>
        <td><a href="delete.php?id=<?php echo $row["id"];?>" onclick="return confirm('Are you sure?')">Delete</a></br><a href="edit.php?id=<?php echo $row["id"];?>"
        >Edit</a></td>
    </tr>
            
       <?php }
    } else {
        echo "0 results";
    } ?>
  
</table>