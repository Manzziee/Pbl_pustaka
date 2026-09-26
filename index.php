<?php include 'db.php'; ?>
<!--
  index.php — READ (the "R" in CRUD)
  Lists every student from the database in a table.
  The line above runs db.php first, so $conn (our database
  connection) already exists and is ready to use here.
-->
<h2>Student List</h2>

<!-- A link (the <a> "anchor" tag). Clicking it opens the add-student page. -->
<a href="add.php">Add New Student</a>

<!-- Start an HTML table. border="1" draws the grid lines; cellpadding adds spacing inside each cell. -->
<table border="1" cellpadding="10">
    <tr>
        <!-- <tr> = table row.  <th> = a bold header cell (table heading). -->
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>
    <?php
    // $conn->query(...) sends an SQL command to the database and returns the result.
    // "SELECT * FROM members" means: fetch ALL columns (*) of every row in the "members" table.
    $result = $conn->query("SELECT * FROM members");

    // A "while" loop repeats its block once for each row that comes back.
    // $result->fetch_assoc() returns the NEXT row as an "associative array"
    // (an array whose values are read by column name, e.g. $row['name']).
    // When there are no rows left it returns null, which ends the loop.
    while ($row = $result->fetch_assoc()) {
        // echo prints HTML to the page. The dots ( . ) glue the text and the variables together.
        // <td> = a normal table cell (table data).
        echo "<tr>
    <td>" . $row['member_id'] . "</td>
    <td>" . $row['member_name'] . "</td>
    <td>" . $row['member_email'] . "</td>
    <td>" . $row['member_pass'] . "</td>
    <td>" . $row['member_PhoneNumber'] . "</td>
    <td>
      <a href='edit.php?member_id=" . $row['member_id'] . "'>Edit</a> |
      <a href='delete.php?member_id=" . $row['member_id'] . "'>Delete</a>
    </td>
  </tr>";
        // Note: edit.php?member_id=...  and  delete.php?member_id=...  put the member's id into the
        // URL, so the next page knows exactly which member to edit or delete.
    }
    ?>
</table>