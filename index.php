<?php

session_start();

include 'db.php';


// Check login
if (!isset($_SESSION['member_id'])) {

  header("Location: login.php");

  exit();
}


// Count students
$student_count_result = $conn->query(
  "SELECT COUNT(*) AS total
     FROM members"
);

$student_count =
  $student_count_result
    ->fetch_assoc()['total'];


// Count books
$book_count_result = $conn->query(
  "SELECT COUNT(*) AS total
     FROM books"
);

$book_count =
  $book_count_result
    ->fetch_assoc()['total'];


// Count total book quantity
$quantity_result = $conn->query(
  "SELECT SUM(book_quantity) AS total
     FROM books"
);

$total_quantity =
  $quantity_result
    ->fetch_assoc()['total'];

if ($total_quantity == null) {

  $total_quantity = 0;
}

?>

<!DOCTYPE html>

<html>

<head>

  <title>
    Library Dashboard
  </title>

  <link
    rel="stylesheet"
    href="style.css">

</head>


<body>


  <!-- =========================
     NAVBAR
========================= -->

  <nav class="navbar">


    <div class="logo">

      <div class="logo-icon">
        📚
      </div>

      <h2>
        Library System
      </h2>

    </div>


    <div class="user-area">

      <span class="user-name">

        Welcome,
        <?php
        echo $_SESSION['member_name'];
        ?>

      </span>


      <a
        href="logout.php"
        class="logout-btn">
        Logout
      </a>

    </div>


  </nav>



  <!-- =========================
     MAIN CONTAINER
========================= -->

  <div class="container">


    <h1 class="page-title">
      Dashboard
    </h1>


    <p class="page-description">
      Manage your students and books from one place.
    </p>



    <!-- =========================
         DASHBOARD CARDS
    ========================= -->

    <div class="dashboard">


      <!-- STUDENTS -->

      <div class="stat-card">

        <div class="stat-icon purple">
          👨‍🎓
        </div>


        <div>

          <h3>
            <?php
            echo $student_count;
            ?>
          </h3>

          <p>
            Total Students
          </p>

        </div>

      </div>



      <!-- BOOK TITLES -->

      <div class="stat-card">

        <div class="stat-icon blue">
          📚
        </div>


        <div>

          <h3>
            <?php
            echo $book_count;
            ?>
          </h3>

          <p>
            Book Titles
          </p>

        </div>

      </div>



      <!-- TOTAL BOOKS -->

      <div class="stat-card">

        <div class="stat-icon green">
          📦
        </div>


        <div>

          <h3>
            <?php
            echo $total_quantity;
            ?>
          </h3>

          <p>
            Total Books
          </p>

        </div>

      </div>


    </div>



    <!-- =========================
         STUDENT LIST
    ========================= -->

    <div class="section">


      <div class="section-header">


        <h2>
          👨‍🎓 Student List
        </h2>


        <a
          href="add.php?type=student"
          class="btn btn-primary">
          + Add Student
        </a>


      </div>



      <div class="table-wrapper">


        <table>


          <tr>

            <th>
              ID
            </th>

            <th>
              Name
            </th>

            <th>
              Email
            </th>

            <th>
              Password
            </th>

            <th>
              Phone Number
            </th>

            <th>
              Action
            </th>

          </tr>


          <?php


          $result =
            $conn->query(
              "SELECT * FROM members"
            );


          while (
            $row =
            $result->fetch_assoc()
          ) {


            echo "

                    <tr>


                        <td>
                            {$row['member_id']}
                        </td>


                        <td>
                            <strong>
                                {$row['member_name']}
                            </strong>
                        </td>


                        <td>
                            {$row['member_email']}
                        </td>


                        <td>
                            {$row['member_pass']}
                        </td>


                        <td>
                            {$row['member_PhoneNumber']}
                        </td>


                        <td>


                            <div class='action'>


                                <a
                                    href='edit.php?member_id={$row['member_id']}'
                                    class='btn btn-edit'
                                >
                                    Edit
                                </a>


                                <a
                                    href='delete.php?member_id={$row['member_id']}'
                                    class='btn btn-delete'

                                    onclick=\"return confirm('Are you sure you want to delete this student?');\"
                                >
                                    Delete
                                </a>


                            </div>


                        </td>


                    </tr>

                    ";
          }

          ?>


        </table>


      </div>


    </div>



    <!-- =========================
         BOOK LIST
    ========================= -->

    <div class="section">


      <div class="section-header">


        <h2>
          📚 Book List
        </h2>


        <a
          href="add.php?type=book"
          class="btn btn-primary">
          + Add Book
        </a>


      </div>



      <div class="table-wrapper">


        <table>


          <tr>

            <th>
              ID
            </th>

            <th>
              Book Title
            </th>

            <th>
              Author
            </th>

            <th>
              Category
            </th>

            <th>
              Quantity
            </th>

            <th>
              Action
            </th>

          </tr>


          <?php


          $book_result =
            $conn->query(
              "SELECT * FROM books"
            );


          while (
            $book =
            $book_result->fetch_assoc()
          ) {


            echo "

                    <tr>


                        <td>
                            {$book['book_id']}
                        </td>


                        <td>

                            <strong>
                                {$book['book_title']}
                            </strong>

                        </td>


                        <td>
                            {$book['book_author']}
                        </td>


                        <td>
                            {$book['book_category']}
                        </td>


                        <td>
                            {$book['book_quantity']}
                        </td>


                        <td>


                            <div class='action'>


                                <a
                                    href='edit.php?book_id={$book['book_id']}'
                                    class='btn btn-edit'
                                >
                                    Edit
                                </a>


                                <a
                                    href='delete.php?book_id={$book['book_id']}'
                                    class='btn btn-delete'

                                    onclick=\"return confirm('Are you sure you want to delete this book?');\"
                                >
                                    Delete
                                </a>


                            </div>


                        </td>


                    </tr>

                    ";
          }

          ?>


        </table>


      </div>


    </div>


  </div>


</body>

</html>