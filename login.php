<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@800&family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
          href="https://unpkg.com/purecss@2.0.6/build/pure-min.css"
          integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5"
          crossorigin="anonymous"
          origin="anonymous"
    />
    <style>
        th{
            background-color: aliceblue;
        }
    </style>

    <title>Login | Spotless Laundry Services</title>
</head>
<body>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spotless-laundry_dba";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
            
        $query = "SELECT * FROM `user` WHERE `email_address` = '$email' AND `password` = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userId = $row['id_user'];
            $_SESSION['user_id'] = $userId;
            
            $_SESSION['alert_message'] = "Login berhasil!";
            $_SESSION['alert_type'] = "success";
            header("Location: user.php");
            exit();
        } else {
            $_SESSION['alert_message'] = "Login gagal!";
            $_SESSION['alert_type'] = "danger";
            header("Location: login.php");
            exit();
        }
    } elseif (isset($_POST['signup'])) {
        $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : '';
        $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $phoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $idUser = uniqid('id', false);

        $identity = array($firstName,$email,$password,$phoneNumber,$address);
        $isNotNull = false;

        $query = "SELECT * FROM `user` WHERE `email_address` = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            $_SESSION['alert_message'] = "Email already exists!";
            $_SESSION['alert_type'] = "danger";
            header("Location: login.php");
            exit();
        } else{
            $query = "INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email_address`, `password`, `phone_number`, `address`) VALUES ('$idUser', '$firstName', '$lastName', '$email', '$password', '$phoneNumber', '$address')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['alert_message'] = "Pendaftaran berhasil!";
                $_SESSION['alert_type'] = "success";
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['alert_message'] = "Pendaftaran gagal!";
                $_SESSION['alert_type'] = "danger";
                header("Location: login.php");
                exit();
            }
        }
    }
}
?>

    <div class="wrapper">
        <div class="section d-flex flex-column gap-5 y-2 px-5 position-relative align-items-center" id="store-page">
            <img class="position-absolute  top-0 start-0 img-pembatas" src="asset/pembatas.png" alt="">
            <span class="page-identifier position-absolute top-0 end-0" style="font-size: 100px;">Login</span>
            <div class="headline text-center" style="margin-top: 9rem;"><p style="font-size: 64px ; margin: 0px">Halo, Selamat Datang!</p></div>
        
            <form id="signup-form" style="width: 60%; display: none;" method="POST">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" aria-label="Last name">
                    </div>
                </div>
                <div class="row mb-3 " style="padding: 0px 12px;">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="row mb-3" style="padding: 0px 12px;">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <div class="row mb-3" style="padding: 0px 12px;">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" id="exampleInputPassword1">
                </div>
                <div class="row mb-3 form-floating" style="padding: 0px 12px; margin-top: 40px;">
                    <label class="form-label px-4">Address</label>
                    <textarea class="form-control px-3 py-5" name="address" id="floatingTextarea2" style="height: 150px"></textarea>
                </div>
                <button type="submit" class="btn btn-success" name="signup">Sign-Up</button>
                <button type="button" class="btn btn-primary" onclick="LoginActivate()">Saya sudah punya akun.</button>
            </form>



        <form id="login-form" style="width: 60%;" method="POST">
            <div class="row mb-3 " style="padding: 0px 12px;">
                <label  class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" >
              </div>
              <div class="row mb-3" style="padding: 0px 12px;">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-success" name="login" >Login</button>
            <button type="button" class="btn btn-primary" onclick="SignUpActivate()">Saya belum punya akun.</button>
        </form>
        <a class="nav-btn position-relative float-end justify-content-end " onclick=window.location.href='main.html' href="#home" type="button"><img style="height: 70px;" src="asset/back-arrow.png" alt=""></a>
    </div>

    


<script src="script.js"></script>
<?php
if (isset($_SESSION['alert_message']) && isset($_SESSION['alert_type'])) {
    $alertMessage = $_SESSION['alert_message'];
    $alertType = $_SESSION['alert_type'];
    unset($_SESSION['alert_message']);
    unset($_SESSION['alert_type']);
    echo '<script lang="javascript">alert("' . $alertMessage . '");</script>';
    echo '<script lang="javascript">console.log("Alert Type: ' . $alertType . '");</script>';
}
?>
</body>
</html>