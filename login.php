<?php

session_start();

include 'db.php';

$error = "";

if (isset($_POST['login'])) {

    $email = $_POST['member_email'];

    $password = $_POST['member_pass'];

    $result = $conn->query(
        "SELECT * FROM members
         WHERE member_email='$email'
         AND member_pass='$password'"
    );

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();

        $_SESSION['member_id'] =
            $row['member_id'];

        $_SESSION['member_name'] =
            $row['member_name'];

        $_SESSION['member_email'] =
            $row['member_email'];

        header("Location: index.php");

        exit();
    } else {

        $error =
            "Invalid email or password!";
    }
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Library Login</title>

    <link
        rel="stylesheet"
        href="style.css">

</head>

<body class="login-page">


    <div class="login-box">


        <div class="login-logo">
            📚
        </div>


        <h1>
            Library System
        </h1>


        <p class="login-subtitle">
            Welcome back! Please login to continue.
        </p>


        <?php

        if ($error != "") {

            echo "
        <div class='error'>
            $error
        </div>
        ";
        }

        ?>


        <form method="post">


            <div class="form-group">

                <label>
                    Email Address
                </label>

                <input
                    type="email"
                    name="member_email"
                    class="form-control"
                    placeholder="Enter your email"
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
                    placeholder="Enter your password"
                    required>

            </div>


            <button
                type="submit"
                name="login"
                class="btn-login">
                Login
            </button>


        </form>


    </div>


</body>

</html>