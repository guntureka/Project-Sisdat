<?php
$koneksi = mysqli_connect("localhost","root","","zis");

if(!$koneksi){
    die("data tidak muncul");
}
$id = "";
$nominal = "";
$jenis = "";
$id_muzakki = "";
$id_mustahiq = "";
$id_panitiaPenerima = "";
$id_panitiaPenyalur = "";
$sukses = "";
$error = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id         = $_GET['id'];
    $q1         = mysqli_query($koneksi,"delete from sumbangan where id_sumbangan = '$id'");
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from sumbangan where id_sumbangan = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nominal        = $r1['nominal'];
    $jenis       = $r1['jenis_sumbangan'];
    $id_muzakki     = $r1['id_muzakki'];
    $id_mustahiq   = $r1['id_mustahiq'];
    $id_panitiaPenerima   = $r1['id_panitiaPenerima'];
    $id_panitiaPenyalur   = $r1['id_panitiaPenyalur'];

    if ($nominal == '') {
        $error = "Data tidak ditemukan";
    }
}

if(isset($_POST['submit'])){
    $nominal = $_POST['nominal'];
    $jenis = $_POST['jenis'];
    $id_muzakki = $_POST['muzakki'];
    $id_mustahiq = $_POST['mustahiq'];
    $id_panitiaPenerima = $_POST['penerima'];
    $id_panitiaPenyalur = $_POST['pemberi'];

    if($nominal && $jenis && $id_muzakki && $id_mustahiq && $id_panitiaPenerima && $id_panitiaPenyalur){
            if($op == 'edit'){
                $cek = mysqli_query($koneksi, "update sumbangan set id_sumbangan = '$id', nominal = '$nominal', jenis_sumbangan = '$jenis', id_muzakki = '$id_muzakki', id_mustahiq = '$id_mustahiq', id_panitiaPenerima = '$id_panitiaPenerima', id_panitiaPenyalur = '$id_panitiaPenyalur'");
                if($cek == 1){
                    $sukses = "Data berhasil diinput";
                }else{
                    $error = "Data tidak berhasil diinput";
                }

            }else{
                $cek = mysqli_query($koneksi, "insert into sumbangan(nominal,jenis_sumbangan,id_muzakki,id_mustahiq,id_panitiaPenerima,id_panitiaPenyalur) values ('$nominal','$jenis','$id_muzakki','$id_mustahiq','$id_panitiaPenerima','$id_panitiaPenyalur')");
                if($cek == 1){
                    $sukses = "Data berhasil diinput";
                }else{
                    $error = "Data tidak berhasil diinput";
                }
            }
        }else{
            $error = "Data tidak berhasil di input";
        }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZIS</title>
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
                header("refresh:5;url=sumbangan.php");
            }
            ?>
            <?php
            if($sukses){
            ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
            <?php
                header("refresh:5;url=sumbangan.php");
            }
            ?>
          <div class="panitia border-bottom pb-3">
            <div class="text-center text-primary m-3">
              <h1>ZIS</h1>
              <h4>create/edit</h4>
            </div>
            <form action="" method="post">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="nominal" name="nominal" placeholder="nominal" value="<?php echo $nominal ?>"/>
                <label for="jenisSumbangan">nominal</label>
              </div>
              <div class="mb-3">
                <select class="form-select p-3" id="jenis" name="jenis">
                  <option selected disabled>Jenis Sumbangan</option>
                  <option value="Zakat" <?php if($jenis == "Zakat") echo "selected"?>>Zakat</option>
                  <option value="Infaq" <?php if($jenis == "Infaq") echo "selected" ?>>Infaq</option>
                  <option value="Shadaqah" <?php if($jenis == "Shadaqah") echo "selected" ?>>Shadaqah</option>
                </select>
              </div>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="muzakki" name="muzakki" placeholder="muzakki" value="<?php echo $id_muzakki ?>"/>
                <label for="muzakki">Id Muzakki</label>
              </div>           
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="mustahiq" name="mustahiq" placeholder="mustahiq" value="<?php echo $id_mustahiq ?>"/>
                <label for="mustahiq">Id Mustahiq</label>
              </div>  
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="penerima" name="penerima" placeholder="penerima" value="<?php echo $id_panitiaPenerima ?>"/>
                <label for="penerima">Id Panitia Penerima</label>
              </div>     
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="pemberi" name="pemberi" placeholder="pemberi" value="<?php echo $id_panitiaPenyalur ?>"/>
                <label for="pemberi">Id Panitia Pemberi</label>
              </div> 
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
                        <th scope="col">nominal</th>
                        <th scope="col">jenis Sumbangan</th>
                        <th scope="col">Id Muzakki</th>
                        <th scope="col">Id Mustahiq</th>
                        <th scope="col">Id Panitia Penerima</th>
                        <th scope="col">Id Panitia Penyalur</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $cek = mysqli_query($koneksi, "select * from sumbangan order by id_sumbangan desc");
                        $urut = 1;
                        while($r = mysqli_fetch_array($cek)){
                            $id = $r['id_sumbangan'];
                            $nominal = $r['nominal'];
                            $jenis = $r['jenis_sumbangan'];
                            $id_muzakki = $r['id_muzakki'];
                            $id_mustahiq = $r['id_mustahiq'];
                            $id_panitiaPenerima = $r['id_panitiaPenerima'];
                            $id_panitiaPenyalur = $r['id_panitiaPenyalur'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td scope="row"><?php echo $id ?></th>
                        <td scope="row"><?php echo $nominal ?></th>
                        <td scope="row"><?php echo $jenis ?></th>
                        <td scope="row"><?php echo $id_muzakki ?></th>
                        <td scope="row"><?php echo $id_mustahiq ?></th>
                        <td scope="row"><?php echo $id_panitiaPenerima ?></th>
                        <td scope="row"><?php echo $id_panitiaPenyalur ?></th>
                        <td scope="row">
                            <a href="sumbangan.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                            <a href="sumbangan.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>     
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