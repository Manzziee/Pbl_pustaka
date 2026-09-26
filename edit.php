<?php include 'db.php';
// edit.php — UPDATE (the "U" in CRUD)
// Loads one student's current details into a form, then saves the changes.

// $_GET is a built-in PHP array that holds values coming from the URL.
// The list page links here as  edit.php?member_id=3 , so here $_GET['member_id'] would be 3.
$id = $_GET['member_id'];

// Fetch just that one student. "WHERE id=$id" limits the result to the matching row.
$result = $conn->query("SELECT * FROM members WHERE member_id=$id");

// fetch_assoc() reads the single row we found into $row (values read by column name).
$row = $result->fetch_assoc();
?>
<h2>Edit Student</h2>

<!--
  The same kind of form as add.php, but each field is PRE-FILLED using
  value="<?php // echo $row['...']; 
            ?>"  so the user sees the current data
  and can change it. <?php // echo ... 
                        ?> prints a PHP value into the HTML.
-->
<form method="post">
    Name: <input type="text" name="member_name" value="<?php echo $row['member_name']; ?>"><br>
    Email: <input type="email" name="member_email" value="<?php echo $row['member_email']; ?>"><br>
    Password: <input type="password" name="member_pass" value="<?php echo $row['member_pass']; ?>"><br>
    Phone Number: <input type="text" name="member_PhoneNumber" value="<?php echo $row['member_PhoneNumber']; ?>"><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
// IF the Update button was clicked (its name is "update")...
if (isset($_POST['update'])) {
    // ...read the new values the user typed.
    $name   = $_POST['member_name'];
    $email  = $_POST['member_email'];
    $password = $_POST['member_pass'];
    $PhoneNumber = $_POST['member_PhoneNumber'];

    // UPDATE ... SET ... WHERE id=$id  changes the existing row — only the one with this id.
    // WARNING: without the WHERE, it would overwrite EVERY student, so the WHERE matters a lot!
    $conn->query("UPDATE members SET member_name='$name', member_email='$email', member_pass='$password', member_PhoneNumber='$PhoneNumber' WHERE member_id=$id");

    // Redirect back to the list to see the updated student.
    header("Location: index.php");
}
