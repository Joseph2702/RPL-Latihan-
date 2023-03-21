<?php
    include("connection.php");

    $id = $_GET['user_id'];

    $query = "DELETE from users WHERE user_id = '$id'";
    mysqli_query($conn, $query);

    header("location: welcome.php");
    die();
?>