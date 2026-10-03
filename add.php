<?php

session_start();

include 'db.php';


// Check login
if (!isset($_SESSION['member_id'])) {

  header("Location: login.php");

  exit();
}


// Get type
$type =
  isset($_GET['type'])
  ? $_GET['type']
  : '';



// =====================================================
// ADD STUDENT
// =====================================================

if ($type == 'student') {


  if (isset($_POST['save_student'])) {


    $name =
      $_POST['member_name'];

    $email =
      $_POST['member_email'];

    $password =
      $_POST['member_pass'];

    $phone =
      $_POST['member_PhoneNumber'];


    $conn->query(

      "INSERT INTO members
            (
                member_name,
                member_email,
                member_pass,
                member_PhoneNumber
            )

            VALUES

            (
                '$name',
                '$email',
                '$password',
                '$phone'
            )"

    );


    header("Location: index.php");

    exit();
  }

?>

  <!DOCTYPE html>

  <html>

  <head>

    <title>
      Add Student
    </title>

    <link
      rel="stylesheet"
      href="style.css">

  </head>


  <body>


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



    <div class="container">


      <div class="form-card">


        <h1>
          👨‍🎓 Add Student
        </h1>


        <p>
          Add a new student to the library system.
        </p>



        <form method="post">


          <div class="form-group">

            <label>
              Student Name
            </label>


            <input
              type="text"
              name="member_name"
              class="form-control"
              placeholder="Enter student name"
              required>

          </div>



          <div class="form-group">

            <label>
              Email
            </label>


            <input
              type="email"
              name="member_email"
              class="form-control"
              placeholder="Enter student email"
              required>

          </div>



          <div class="form-group">

            <label>
              Password
            </label>


            <input
              type="password"
              name="member_pass"
              class="form-control"
              placeholder="Enter password"
              required>

          </div>



          <div class="form-group">

            <label>
              Phone Number
            </label>


            <input
              type="text"
              name="member_PhoneNumber"
              class="form-control"
              placeholder="Enter phone number"
              required>

          </div>



          <div class="form-buttons">


            <button
              type="submit"
              name="save_student"
              class="btn btn-primary">
              Save Student
            </button>


            <a
              href="index.php"
              class="btn btn-secondary">
              Cancel
            </a>


          </div>


        </form>


      </div>


    </div>


  </body>

  </html>

<?php

  exit();
}



// =====================================================
// ADD BOOK
// =====================================================

if ($type == 'book') {


  if (isset($_POST['save_book'])) {


    $title =
      $_POST['book_title'];

    $author =
      $_POST['book_author'];

    $category =
      $_POST['book_category'];

    $quantity =
      $_POST['book_quantity'];


    $conn->query(

      "INSERT INTO books
            (
                book_title,
                book_author,
                book_category,
                book_quantity
            )

            VALUES

            (
                '$title',
                '$author',
                '$category',
                '$quantity'
            )"

    );


    header("Location: index.php");

    exit();
  }

?>

  <!DOCTYPE html>

  <html>

  <head>

    <title>
      Add Book
    </title>

    <link
      rel="stylesheet"
      href="style.css">

  </head>


  <body>


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



    <div class="container">


      <div class="form-card">


        <h1>
          📖 Add Book
        </h1>


        <p>
          Add a new book to the library collection.
        </p>



        <form method="post">


          <div class="form-group">

            <label>
              Book Title
            </label>


            <input
              type="text"
              name="book_title"
              class="form-control"
              placeholder="Enter book title"
              required>

          </div>



          <div class="form-group">

            <label>
              Book Author
            </label>


            <input
              type="text"
              name="book_author"
              class="form-control"
              placeholder="Enter author name"
              required>

          </div>



          <div class="form-group">

            <label>
              Book Category
            </label>


            <input
              type="text"
              name="book_category"
              class="form-control"
              placeholder="Enter book category"
              required>

          </div>



          <div class="form-group">

            <label>
              Book Quantity
            </label>


            <input
              type="number"
              name="book_quantity"
              class="form-control"
              placeholder="Enter quantity"
              min="0"
              required>

          </div>



          <div class="form-buttons">


            <button
              type="submit"
              name="save_book"
              class="btn btn-primary">
              Save Book
            </button>


            <a
              href="index.php"
              class="btn btn-secondary">
              Cancel
            </a>


          </div>


        </form>


      </div>


    </div>


  </body>

  </html>

<?php

  exit();
}



// =====================================================
// INVALID
// =====================================================

echo "Invalid request.";

?>