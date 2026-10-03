<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "library_pustaka"
);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
