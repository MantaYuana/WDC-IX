<?php
session_start();
include "../src/action.php";
include "../src/connection.php";

if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}

$email = $_SESSION['email'];
$query = mysqli_query($connect, "SELECT * FROM loginTable WHERE email = '$email'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page with PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="container-sm">
        <h2>Halaman Admin</h2>

        <br> <br>

        <h4>Selamat datang, <?= $row['name']; ?> ! anda telah login</h4>

        <br> <br>

        <a href="../auth/logout.php">Logout</a>
        <button class="btn btn-primary"></button>

        </form>
    </div>
</body>

</html>