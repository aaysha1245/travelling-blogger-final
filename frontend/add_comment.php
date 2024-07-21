<?php
include('../db/conn.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: loginform.php');
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_id = $_POST["blog_id"];
    $comment = $_POST["comment"];
    $useremail = $_SESSION['user_id'];

    $sql = "INSERT INTO comments (blog_id, useremail, comment, created_at) VALUES ('$blog_id', '$useremail', '$comment', NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
