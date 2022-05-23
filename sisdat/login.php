<?php
$koneksi = mysqli_connect("localhost","root","","zis");
if(!$koneksi){
  die("Tidak dapat masuk");
}
$nama = "";
$nik = "";
$sukses = "";
$error = "";
if(isset($_POST["login"])){
  $nama = $_POST["nama"];
  $nik = $_POST["nik"];

    $result = mysqli_query($koneksi, "SELECT * FROM panitia WHERE nama = '$nama' AND nik ='$nik'");
    $cek = mysqli_num_rows($result);
    if($cek == 1){
      $sukses = "Login berhasil";
    }
    else{
      $error = "Login gagal";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  </head>
  <body>
    <div class="container">
      <header class="d-flex flex-wrap align-items-end justify-content-end py-3 mb-2 border-bottom text-center">
      <a href="index.php">
          <button type="submit" name="keluar" class="btn btn-danger" id="myBtn">Keluar</button>
          </a>
      </header>
      <?php
        if($error){
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
            
        <?php
            header("refresh:2;url=login.php");
        }
        ?>
        <?php
        if($sukses){
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $sukses ?>
            </div>
        <?php
            header("refresh:2;url=panitia.php");
        }
        ?>

      <div class="card" style="max-width: 300px;margin: auto;margin-top:150px">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?php echo $nama ?>"/>
              <label for="nama">Nama</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="nik" name="nik" placeholder="nik" value="<?php echo $nik ?>"/>
              <label for="nik">NIK</label>
            </div>
            <div class="text-center">
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
