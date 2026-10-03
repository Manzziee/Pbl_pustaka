<?php

session_start();

include 'db.php';


// Check login
if (!isset($_SESSION['member_id'])) {

    header("Location: login.php");

    exit();
}



// =====================================================
// DELETE STUDENT
// =====================================================

if (isset($_GET['member_id'])) {


    $id =
        $_GET['member_id'];


    $conn->query(

        "DELETE FROM members
         WHERE member_id=$id"

    );


    header("Location: index.php");

    exit();
}



// =====================================================
// DELETE BOOK
// =====================================================

if (isset($_GET['book_id'])) {


    $book_id =
        $_GET['book_id'];


    $conn->query(

        "DELETE FROM books
         WHERE book_id=$book_id"

    );


    header("Location: index.php");

    exit();
}



echo "No ID was provided.";
