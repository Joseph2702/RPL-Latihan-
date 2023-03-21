<?php
    include('connection.php');

    if(count($_POST) > 0){
        mysqli_query($conn,"UPDATE users set user_name='". $_POST['user_name']."', user_email='".
        $_POST['user_email']."' WHERE user_id='". $_POST['user_id']."'");
        $message = "<p style='color:green;'> Record Modified Successfully !</p>";
    }

    $result = mysqli_query($conn,"SELECT * FROM users WHERE user_id='". $_GET['user_id']. "'");
    $row = mysqli_fetch_array($result);
?>

<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <title>UPDATE DATA</title>
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <form name="frmUsers" method="post" action="">
        <div>
            <?php if(isset($message)) { echo $message; } ?>
        </div>
        <div style="padding-bottom :5px;">
        <a href="welcome.php" class="nav-link active" aria-current="page">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
        </svg>
        </a>
        </div>
        <input type="hidden" name="user_id" class="txtField" value="<?php echo $row['user_id'];?> ">
        <b>Username  : </b>
        <input type="text" name="user_name" class="txtField" value=" <?php echo $row['user_name']; ?> "> <br> <br>
        <b>UserEmail :</b>
        <input type="text" name="user_email" class="txtField" value=" <?php echo $row['user_email'];?> ">
        <br> <br>
        <input type="submit" name="submit" value="Submit" class="button">
        </form>
    </body>
</html>