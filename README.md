# Spotless Laundry Website Project

Oleh : Fairly Ardasa

### Untuk apa website ini?
Spotless adalah sebuah perusahaan fiktif yang bergerak dalam bidang jasa laundry. Project ini ditujukan sebagai website resmi dari perusahaan tersebut.  Website ini terdiri dari beberapa bagian, yaitu hero section, about section, service section, store section, login page, dan juga user page. 

### Kebutuhan klien
- Dapat mengenalkan perusahaan mereka kepada khalayak umum
- Menjelaskan apa saja yang mereka tawarkan sebagai perusahaan yang bergerak dalam bidang laundry
- Memberikan penjelasan mengenai toko fisik milik perusahaan
- Memudahkan dalam monitoring laundry milik pelanggan

### Permasalahan yang coba di-cover dengan website
-  Dengan memiliki website company profile, perusahaan dapat dikenal lebih luas secara online sehingga akan mendatangkan calon pelanggan, mitra bisnis, maupun investor.
- Website company profile yang profesional dan informatif dapat membantu meningkatkan kepercayaan dan kredibilitas perusahaan di mata calon pelanggan.
- Website ini bisa menjadi tempat untuk menyampaikan informasi lengkap tentang produk atau layanan yang ditawarkan oleh perusahaan. Ini akan membantu calon pelanggan memahami produk atau layanan dengan lebih baik dan memutuskan apakah mereka tertarik atau tidak.
- Website ini juga dilengkapi dengan fitur user, yang membantu pengguna/pelanggan dalam melihat riwayat laundry mereka dan juga statusnya yakni bisa diambil atau tidak.

### Penjelasan mengenai keempat requirements

1 . Desain rapi mengikuti kaidah atau prinsip desain,
Desain dari website ini mengikuti beberapa kaidah prinsip desain yakni konsistensi, readability, aksesibilitas, kesederhanaan, dan juga kemudahan navigasi. Berikut ini adalah penjelasannya :

a. Konsistensi 
Website ini dibuat menggunakan 3 warna primer yaitu #212121 , #C4DCE0, dan juga #FFFF. Setiap section/ halaman dari website ini sangat konsisten dalam mengadopsi ketiga warna tersebut. Atas 3 warna tersebut, diberlakukan juga aturan 60 30 10, yang dimana dalam sebuah page 60% akan menggunakan warna #C4DCE0, kemudian 30% untuk warna #212121, dan #FFFFFF sebesar 10%. Ketiga warna tersebut juga tidak serta merta hanya itu saja, namun juga bisa dikombinasikan dengan warna komplementernya. Berikut adalah contoh penggunaanya :

```css
...
body{
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 400;
    font-size: 16px;
    background-color: #C4DCE0;
    color: #212121;
}
...
.accordion-button::after{
    content: "";
    background: #ffff;
    transform: scale(1.2);
    border-radius: 3px;
    transition: .5s !important;

}
```

Selain warna, terdapat juga konsistensi dalam penggunaan fontnya. sebagian besar dari website ini menggunakan font Space Grotesk https://fonts.google.com/specimen/Space+Grotesk?query=space] dan juga font Plus Jakarta Sans[https://fonts.google.com/specimen/Plus+Jakarta+Sans?query=plus+jaka] untuk penanda setiap page nya. 


```css
.page-identifier{
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 800;
    letter-spacing: -6 px;
    font-size: 200px  ; 
    color: rgba(33,33,33,0.2);
    z-index: -1;
}

.headline{
    margin-top: 18.125rem;
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 700;
    font-size: 64px;
    
}

.desc{
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 400;
    font-size: 16px;
}
```

b. Readability atau dapat dibaca juga ditekankan pada website ini. Pasalnya dengan penggunaan warna yang cukup kontrast antara font dan juga backgroundnya.
c. Desain UI yang sederhana dan terorganisir akan membantu pengguna dalam mengerti dan menggunakan produk dengan mudah. Menghindari kelebihan informasi, penggunaan tata letak yang jelas juga mendukung dalam aspek kesederhanaan. 
d. Website ini juga memiliki struktur menu yang jelas yang merupakan contoh elemen yang membantu pengguna menemukan apa yang mereka butuhkan dengan cepat.


![Tampilan Web](https://www.dropbox.com/s/344146gebe8fsw0/Hero%20Section.png?dl=0)


2 . Website responsive, dapat diakses melalui device: Mobile, Tablet dan Laptop,
Website responsive adalah sebuah website yang dirancang agar dapat menyesuaikan tampilannya dengan baik di berbagai perangkat dan ukuran layar yang berbeda. Tujuannya adalah agar pengguna dapat mengakses dan menjelajahi website tersebut dengan nyaman, tanpa harus mengalami kesulitan melihat atau berinteraksi dengan kontennya.

Hal ini dicapai dengan menggunakan teknik desain web yang responsif, seperti CSS media queries. Media queries memungkinkan pengembang web untuk mengatur tata letak, ukuran font, dan properti lainnya berdasarkan ukuran layar pengguna. Selain itu, flexbox juga digunakan untuk mengatur tata letak secara fleksibel, sehingga elemen-elemen website dapat disusun dengan baik di berbagai perangkat.

Penggunaan media screen dengan ukuran 780px kebawah dikarenakan nilai pixel 700-an adalah breakpoint dari tablet dan juga handphone.

```css
@media screen and (max-width: 780px) {
    .nav-btn{
        display: none;
    }
    .page-identifier{
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800;
        font-size: 100px  ; 
        color: rgba(33,33,33,0.2);
        z-index: -1;
    }

    .wrap-maps{
        display: none;
    }

    #header{
        font-size: 96px !important;
    }
    
    #desc-hero{
        width: 100% !important;
    }

    body{
        font-size: 16px;
    }

    .service-pics{
        display: none;
    }

    .desc-wrapper{
        width: 80% !important;
    }

    .headline{
        margin-top: 9rem;
    }
    
    .table{
        margin-left: 0px;
        margin-top: 10px !important;
    }
    
    .accordion{
        margin-top: 10px !important;
    }

    .img-pembatas{
        height: 20px;
    }

    .sub-header{
        margin: 0;
    }
    
    .section{
        gap: 1rem !important;
    }
}
```

3 . Direct feedback ke pengguna website,
Salah satu direct feedback ke pengguna website adalah fitur alert yang terdapat dalam javascript. Berikut ini adalah contoh penggunaanya :

> Kode berikut ini adalah php yang memuat logic dari login page, apabila gagal maka alert yang akan tersimpan dalam session adalah "Login gagal" dan jika berhasil akan muncul alert "Login berhasil". 
```php
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
```
> Untuk pemanggilan alertnya adalah sebagai berikut. Diperlukan session untuk menyimpan alert dikarenakan, alert akan tertutup oleh header ketika dijalankan.
```
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
```
4 . Konten dinamis dari database.
Untuk konten yang bersifat dinamis, dalam proyek ini terdapat sebuat fitur yang akan menampilkan transaksi apa saja yang dilakukan user. Riwayat transaksi ini akan disajikan dalam bentuk tabel yang sepenuhnya ditulis dengan php yang berada dalam file user.php. Isi dari riwayat ini juga dapat berubah tergantung pada id_user yang didapatkan dari session login.php. 

```php
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
          
```
