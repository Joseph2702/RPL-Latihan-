<?php
session_start();
include('connection.php');

if(isset($_POST['cari'])){
    $keyword = $_POST['keyword'];
    $q = "SELECT * FROM users WHERE user_id LIKE '%$keyword%' or user_name
     LIKE '%$keyword%' or user_email LIKE '%$keyword%' ";
}else {
    $q = 'SELECT * FROM users';
}
$result = mysqli_query($conn, $q);


if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

// $result = mysqli_query($conn, "SELECT user_name,user_id,user_email, user_address, user_phone,
// user_city,  user_photo from users");

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: login.php');
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!----Content------>
    <div class="box">
        <div class="container mt-4">
            <form action="" method="post">
                <input type="text" name="keyword" placeholder="Masukkan Keyword" >
                <button  type="submit" class="btn btn-primary" name="cari">Cari</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">DeleteData</th>
                        <th scope="col"> EditData</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?php echo $row['user_id'] ?></td>
                            <td><?php echo $row['user_name'] ?></td>
                            <td><?php echo $row['user_email'] ?></td>
                            <td>
                                <a href="actionDelete.php?user_id=<?php echo $row['user_id'];?>"
                                role="button" onclick="return confirm('Data ini akan dihapus?')">Hapus</a>
                            </td>
                            <td>
                                <a href="actionEdit.php?user_id=<?php echo $row['user_id']; ?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
            <a href="welcome.php?logout=1" id="logout-btn" class="btn btn-danger">LOG OUT</a>
        </div>
    </div>
</body>
</html>

    
    <!-- <center>
    <h1>Welcome</h1> 
        <img style="border-radius: 100%;" src="img/<?php echo $_SESSION['user_photo'] ?> " width="250px" height="250px" class="gambar" >
        <tr>
            <td>
                <p>User ID : <?php echo $_SESSION['user_id']; ?> </p>
            </td>
        
            <td>
                <p>User name : <?php echo $_SESSION['user_name']; ?> </p>
            </td>
            <td>
                <p>User email : <?php echo $_SESSION['user_email']; ?> </p>
            </td>

            <td>
                <p>User phone : <?php echo $_SESSION['user_phone']; ?> </p>
            </td>

            <td>
                <p>User city : <?php echo $_SESSION['user_city']; ?> </p>
            </td>
        
            <td>
                <p>User Address : <?php echo $_SESSION['user_address']; ?> </p>
            </td>
        </tr>
         <br> 

    <a href="welcome.php?logout=1" id="logout-btn" class="btn btn-danger">LOG OUT</a>
    </center> -->