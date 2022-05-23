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
    <title>Penyaluran</title>
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
    </section>
        <div>
            <div class="text-center border-bottom">
                <h1>Penyaluran Dana</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id Muzakki</th>
                        <th scope="col">nominal</th>
                        <th scope="col">jenis Sumbangan</th>
                        <th scope="col">Id Mustahiq</th>
                        <th scope="col">Id Panitia Penerima</th>
                        <th scope="col">Id Panitia Penyalur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $cek = mysqli_query($koneksi, "select * from sumbangan join panitia where id_panitia = id_panitiaPenerima order by id_sumbangan desc");
                        $urut = 1;
                        while($r = mysqli_fetch_array($cek)){
                            
                            $id = $r['id_sumbangan'];
                            $nominal = $r['nominal'];
                            $jenis = $r['jenis_sumbangan'];
                            $id_muzakki = $r['id_muzakki'];
                            $id_mustahiq = $r['id_mustahiq'];
                            $id_panitiaPenerima = $r['id_panitiaPenerima'];
                            $id_panitiaPenyalur = $r['id_panitiaPenyalur'];
                            $cek2 = mysqli_query($koneksi, "select * from panitia where id_panitia = '$id_panitiaPenerima'");
                            $cek3 = mysqli_query($koneksi, "select * from panitia where id_panitia = '$id_panitiaPenyalur'");
                            $r2 = mysqli_fetch_array($cek2);
                            $r3 = mysqli_fetch_array($cek3);
                            $namaPenerima = $r2['nama'];
                            $namaPenyalur = $r3['nama'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td scope="row"><?php echo $id_muzakki ?></th>
                        <td scope="row"><?php echo $nominal ?></th>
                        <td scope="row"><?php echo $jenis ?></th>
                        <td scope="row"><?php echo $id_mustahiq ?></th>
                        <td scope="row"><?php echo $namaPenerima ?></th>
                        <td scope="row"><?php echo $namaPenyalur ?></th>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>