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
    <title>User | Spotless Laundry Services</title>
</head>
<body>
    <div class="wrapper">
        <div class="section d-flex flex-column gap-5 y-2 px-5 position-relative align-items-center" id="store-page">
            <img class="position-absolute  top-0 start-0 img-pembatas" src="asset/pembatas.png" alt="">
            <span class="page-identifier position-absolute top-0 end-0" style="font-size: 100px;">User</span>
            <!-- <div class="headline text-center" style="margin-top: 9rem;"><p class="sub-header" style="font-size: 64px ;">Halo, Selamat Datang!</p></div> -->

            <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "spotless-laundry_dba";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $user_id = $_SESSION['user_id'];
            echo "User ID: " . $user_id;

            $query = "SELECT * FROM USER WHERE id_user = '{$user_id}'";
            $thisUser = mysqli_query($conn,$query);
            $value = mysqli_fetch_assoc($thisUser);

            echo '
            <div class="headline text-center" style="margin-top: 5rem;"><p class="sub-header" style="font-size: 64px ;">Selamat datang '.$value['first_name'].' !</p>
            <p style="font-size: 16px ;">Berikut ini adalah riwayat transaksi anda :</p></div>
            ';
          
            echo '
            <table class="pure-table" style="width: 100%;">
            <tr>
              <th>ID Transaksi</th>
              <th>Berat</th>
              <th>Tanggal Masuk</th>
              <th>Tanggal Selesai</th>
              <th>Status</th>
            </tr>';

            $query2 = "SELECT * FROM transaksi WHERE id_user = '{$user_id}'";
            
            $result = mysqli_query($conn, $query2);
            $rowCount = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result)) {

              $today = date("Y-m-d");
              if ($today >= $row['tanggal_selesai']) {
                $status = "dapat diambil";
              } else $status = "diproses";

              echo '
              <tr>
                  <td>'.$row['id_transaksi'].'</td>
                  <td>'.$row['berat'].'</td>
                  <td>'.$row['tanggal_masuk'].'</td>
                  <td>'.$row['tanggal_selesai'].'</td>
                  <td>'.$status.'</td>
              </tr>
              ';
            
            
          }
          echo '</table>';
          ?> 
          
        
          
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