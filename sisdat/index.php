<?php
$koneksi = mysqli_connect("localhost","root","","zis");
if(!$koneksi){
  echo "Tidak dapat masuk";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="icon" href="./assets/img/give-small.png" type="image" />
    <style>
      .card-cover {
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <div id="header"class="container">
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
      </div>
      <div class="container px-4 py-5" id="custom-cards">
        <h1 class="pb-2 border-bottom text-center">ZIS</h1>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
          <div class="col">
            <a href="#zakat">
              <div class="card card-cover h-100 overflow-hidden text-dark bg-dark rounded-4 shadow-lg" style="background-image: url('./assets/img/zakat.png')">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                  <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"></h2>
                </div>
              </div>  
            </a>
          </div>

          <div class="col">
            <a href="#infaq">
              <div class="card card-cover h-100 overflow-hidden text-dark bg-dark rounded-4 shadow-lg" style="background-image: url('./assets/img/give.png')">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-dark text-shadow-1">
                  <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"></h2>
                </div>
              </div>
            </a>
          </div>

          <div class="col">
            <a href="#shadaqah">
              <div class="card card-cover h-100 overflow-hidden text-dark bg-dark rounded-4 shadow-lg" style="background-image: url('./assets/img/charity.png')">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                  <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"></h2>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="zakat" class="container">
      <div class="mb-5">
        <h1 class="border-bottom text-center">Zakat</h1>
        <p class="">Ditinjau dari segi bahasa, kata Zakat merupakan kata dasar (mashdar) dari Zakaa yang berarti berkah, tumbuh, bersih, dan baik. Sesuatu itu zakaa berarti tumbuh dan berkembang, dan seseorang itu zakaa, berarti orang itu baik.[1]

          <p>Dari kata itu (زَكَى), menjadi kata “zakat”, yaitu sesuatu yang dikeluarkan oleh manusia dari sebagian hak Allah swt. untuk disalurkan kepada Fakir Miskin. Dinamai demikian karena padanya ada harapan mendapat berkah atau membersihkan jiwa atau menumbuhkannya dengan kebaikan dan berkah.
          </p>
          <p>Zakat menurut bahasa adalah berkembang dan suci. Yakni membersihkan jiwa atau mengembangkan keutamaan-keutamaan jiwa dan menyucikannya dari dosa-dosa dengan menginfakkan harta di jalan Allah dan menyucikannya dari sifat kikir, bakhil, dengki, dan lain-lain.
          </p>
          Zakat Menurut Syara’: adalah Memberikan (menyerahkan) sebagian harta tertentu untuk orang tertentu yang telah ditentukan syara’ dengan niat karena Allah</p>
      </div>
      <div id="infaq" class="mb-5">
        <h1 class="border-bottom text-center">Infaq</h1>
        <p class="">Infaq berasal dari kata Nafaqa , yang berarti telah lewat, berlalu, atau habis.

          <p class="text-end">قُلْ لَوْ أَنْتُمْ تَمْلِكُوْنَ خَزَائِنَ رَحْمَةِ رَبِّي إِذًا َلأَ مْسَكْتُمْ خَشْيَةَ اْلإِنْفَاقِ وَكَانَ اْلإِِنْسَانُ فَتُوْرًا
          </p>
            <p>“Katakanlah olehmu (Muhammad) : Kalaulah kamu menguasai perbendaharaan rahmat Tuhanku, niscaya kamu menahannya, karena takut membelanjakannya, dan keadaan manusia itu sangat kikir” (Q.S.Al-Isra, 17: 100)
          
          <p>Infaq adalah mengeluarkan harta tertentu untuk dipergunakan bagi suatu kepentingan yang diperintahkan oleh Allah swt. di luar zakat.</p>
      </div>
      <div id="shadaqah" class="mb-5">
        <h1 class="border-bottom text-center">Shadaqah</h1>
        <p class="text-sm-">
          Shadaqah berasal dari kata ash-shidqu, yang berarti orang yang banyak benarnya dalam perkataan, bahkan diungkapkan bagi orang yang sama sekali tidak pernah berdusta.
        </p>
          <p class="text-end">فَأَمَّا مَنْ أَعْطَى وَاتَّقَى وَصَدَّقَ بِالْحُسنَى فَسَنُيَسِّرُهُ لِلْيُسْرَى</p>
        <p>“Barangsiapa yang memberi dan bertaqwa dan membenarkan adanya pahala yang terbaik, maka akan kami mudahkan baginya jalan kemudahan”. (Q.S. Asy-Syams : 5-7)
        <p>
          Shadaqah adalah bukti bahwa seseorang memiliki kebenaran iman dan membenarkan adanya hari kiamat. Oleh karena itu, Rasulullah saw. bersabda:
         </p> 
         <p class="text-end">اَلصَّدَقَةُ بُرْهَانٌ</p>
         <p>          “Shodaqoh itu adalah bukti”. (H.R. Muslim)
         </p>
          Shadaqah menurut syara’: Melakukan suatu kebajikan sesuai dengan ajaran Alquran dan Assunnah baik yang bersifat materil maupun non-materil.
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
