<?php
$koneksi = mysqli_connect("localhost","root","","zis");
if(!$koneksi){
  echo "Tidak dapat masuk";
}
$id = "";
$nama = "";
$nik = "";
$kelamin = "";
$alamat = "";
$sukses = "";
$error = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id         = $_GET['id'];
    $q1         = mysqli_query($koneksi,"delete from panitia where id_panitia = '$id'");
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from panitia where id_panitia = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama = $r1['nama'];
    $nik = $r1['nik'];
    $kelamin = $r1['kelamin'];
    $alamat = $r1['alamat'];

    if ($nama == '') {
        $error = "Data tidak ditemukan";
    }
}

//panitia
if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $kelamin = $_POST['kelamin'];
    $alamat = $_POST['alamat'];

    if($nama && $nik && $kelamin && $alamat){
        if($op == 'edit'){
            $cek = mysqli_query($koneksi, "update panitia set id_panitia = '$id', nama = '$nama', nik = '$nik', kelamin = '$kelamin', alamat = '$alamat' where id_panitia = '$id'");
            if($cek == 1){
                $sukses = "Data berhasil diinput";
            }else{
                $error = "Data tidak berhasil diinput";
            }
        }else{
            $cek = mysqli_query($koneksi, "INSERT INTO panitia(nama,nik,kelamin,alamat) VALUES ('$nama','$nik','$kelamin','$alamat')");
            if($cek == 1){
                $sukses = "Data berhasil diinput";
            }else{
                $error = "Data tidak berhasil diinput";
            }
        }
    }else{
        $error = "Data tidak berhasil diinput";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panitia</title>
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
            <li><a href="panitia.php" class="nav-link px-2">Panitia</a></li>
            <li><a href="muzakki.php" class="nav-link px-2">Muzakki</a></li>
            <li><a href="mustahiq.php" class="nav-link px-2">Mustahiq</a></li>
            <li><a href="sumbangan.php" class="nav-link px-2">Sumbangan</a></li>
        </ul>
        <div class="col-md-3 text-end">
            <a href="index.php">
                <button type="submit" name="keluar" class="btn btn-danger" id="myBtn">Keluar</button>
            </a>
        </div>
    </header>
    <section>
        <?php
        if($error){
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
            
        <?php
            header("refresh:5;url=panitia.php");
        }
        ?>
        <?php
        if($sukses){
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $sukses ?>
            </div>
        <?php
            header("refresh:5;url=panitia.php");
        }
        ?>
          <div class="panitia border-bottom pb-3">
            <div class="text-center text-primary m-3">
              <h1>PANITIA</h1>
              <h4>create/edit</h4>
            </div>
            <form action="" method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama ?>"/>
                <label for="nik">Nama</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?php echo $nik ?>"/>
                <label for="nik">NIK</label>
              </div>
              <div class="mb-3">
                <select class="form-select p-3" id="kelamin" name="kelamin">
                  <option selected disabled>Jenis Kelamin</option>
                  <option value="Laki-laki" <?php if($kelamin == "Laki-laki") echo "selected"?>>Laki-Laki</option>
                  <option value="Perempuan" <?php if($kelamin == "Perempuan") echo "selected" ?>>Perempuan</option>
                </select>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $alamat ?>"/>
                <label for="alaamt">Alamat</label>
              </div>
              <div class="text-center">
                <button type="submit" name="daftar" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </section>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $cek = mysqli_query($koneksi, "select * from panitia order by id_panitia desc");
                        $urut = 1;
                        while($r = mysqli_fetch_array($cek)){
                            $id = $r['id_panitia'];
                            $nama = $r['nama'];
                            $nik = $r['nik'];
                            $kelamin = $r['kelamin'];
                            $alamat = $r['alamat'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td scope="row"><?php echo $id ?></th>
                        <td scope="row"><?php echo $nama ?></th>
                        <td scope="row"><?php echo $nik ?></th>
                        <td scope="row"><?php echo $kelamin ?></th>
                        <td scope="row"><?php echo $alamat ?></th>
                        <td scope="row">
                            <a href="panitia.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                            <a href="panitia.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>     
                        </td>
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