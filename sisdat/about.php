<?php
$koneksi = mysqli_connect("localhost","root","","zis");
if(!$koneksi){
    die("tidak tersambung");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="shortcut icon" href="give.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-2 border-bottom">
            <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="give.png" alt="" width="32px">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2">Home</a></li>
                <li><a href="penyaluran.php" class="nav-link px-2">Penyaluran</a></li>
                <li><a href="about.php" class="nav-link px-2">about</a></li>
            </ul>

            <div class="col-md-3 text-end">
            <a href="./login.php">          
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
            </a>
            </div>
        </header>
    <body>
        <h1>Deskripsi</h1>
        <p>Pengelolaan zakat merupakan salah satu kegiatan dakwah yang mengajak masyarakat muslim untuk mengeluarkan hartanya di jalan Allah. Untuk memudahkan sistem pengelolaan zakat maka diperlukan solusi bagaimana sistem perzakatan dapat dikelola dengan benar dan setiap proses bisnis berjalan lebih efektif dan efisien.</p>
        <h1>Kontak</h1>
        <ul>
            <li>IG      : @zis.islamiyah</li>
            <li>LINE  : @zis.islamiyah</li>
            <li>LINE  : 082349571232</li>
        </ul>
    </body>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>