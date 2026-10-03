<?php

session_start();

include 'db.php';


// Check login
if (!isset($_SESSION['member_id'])) {

    header("Location: login.php");

    exit();
}



// =====================================================
// EDIT STUDENT
// =====================================================

if (isset($_GET['member_id'])) {


    $id =
        $_GET['member_id'];


    $result =
        $conn->query(
            "SELECT * FROM members
             WHERE member_id=$id"
        );


    $row =
        $result->fetch_assoc();


    if (!$row) {

        die("Student not found.");
    }



    if (isset($_POST['update_student'])) {


        $name =
            $_POST['member_name'];

        $email =
            $_POST['member_email'];

        $password =
            $_POST['member_pass'];

        $phone =
            $_POST['member_PhoneNumber'];


        $conn->query(

            "UPDATE members SET

            member_name='$name',

            member_email='$email',

            member_pass='$password',

            member_PhoneNumber='$phone'

            WHERE member_id=$id"

        );


        header("Location: index.php");

        exit();
    }

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>
            Edit Student
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
                    ✏️ Edit Student
                </h1>


                <p>
                    Update student information.
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
                            value="<?php echo $row['member_name']; ?>"
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
                            value="<?php echo $row['member_email']; ?>"
                            required>

                    </div>



                    <div class="form-group">

                        <label>
                            Password
                        </label>


                        <input
                            type="text"
                            name="member_pass"
                            class="form-control"
                            value="<?php echo $row['member_pass']; ?>"
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
                            value="<?php echo $row['member_PhoneNumber']; ?>"
                            required>

                    </div>



                    <div class="form-buttons">


                        <button
                            type="submit"
                            name="update_student"
                            class="btn btn-primary">
                            Update Student
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
// EDIT BOOK
// =====================================================

if (isset($_GET['book_id'])) {


    $book_id =
        $_GET['book_id'];


    $result =
        $conn->query(
            "SELECT * FROM books
             WHERE book_id=$book_id"
        );


    $book =
        $result->fetch_assoc();


    if (!$book) {

        die("Book not found.");
    }



    if (isset($_POST['update_book'])) {


        $title =
            $_POST['book_title'];

        $author =
            $_POST['book_author'];

        $category =
            $_POST['book_category'];

        $quantity =
            $_POST['book_quantity'];


        $conn->query(

            "UPDATE books SET

            book_title='$title',

            book_author='$author',

            book_category='$category',

            book_quantity='$quantity'

            WHERE book_id=$book_id"

        );


        header("Location: index.php");

        exit();
    }

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>
            Edit Book
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
                    ✏️ Edit Book
                </h1>


                <p>
                    Update book information.
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
                            value="<?php echo $book['book_title']; ?>"
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
                            value="<?php echo $book['book_author']; ?>"
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
                            value="<?php echo $book['book_category']; ?>"
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
                            value="<?php echo $book['book_quantity']; ?>"
                            min="0"
                            required>

                    </div>



                    <div class="form-buttons">


                        <button
                            type="submit"
                            name="update_book"
                            class="btn btn-primary">
                            Update Book
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

echo "No student or book ID was provided.";

?>