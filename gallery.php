<?php
session_start ();
if(isset($_SESSION['name'])){
    // echo "ようこそ、".$_SESSION['name']."さん！";
  }else{
    header('refresh:0;http://localhost/kame/login.html');
    exit;
}
?>
<?php
require_once('k_functions.php');
$pdo = connectDB();
date_default_timezone_set('Asia/Tokyo');
// $time = intval(date('H'));
$time = new DateTime('now');
// $time = $_POST['watch'];
$time2 = $time->format("Y-m-d");
$h = 0;
$h1 = 0;
$h2 = 0;

session_start ();
$aaa = $_POST['aaa'];
$bbb = $_POST['bbb'];
$aaa1 = new DateTime($aaa);
$bbb1 = new DateTime($bbb);
$aaa2 = $aaa1->format("Y-m-d");
$bbb2 = $bbb1->format("Y-m-d");


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    //初めにログインしたら今日の写真を表示する
    $id1 = $_SESSION['id'];  
    $sql = 'SELECT * FROM images WHERE watch = :time2 AND (food = "1" OR food = "2" OR food = "3") AND use_id = :id1';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':time2', $time, PDO::PARAM_STR);
    $stmt->bindValue(':id1', $id1, PDO::PARAM_INT);
    $stmt->execute();
    $images = $stmt->fetchAll();

    
} else {
    // $sql = 'SELECT * FROM images WHERE watch = :bbb AND (food = "1" OR food = "2" OR food = "3")';
    $id1 = $_SESSION['id'];  
    $sql = 'SELECT * FROM images WHERE watch BETWEEN :aaa AND :bbb AND (food = "1" OR food = "2" OR food = "3") AND use_id = :id1 ORDER BY watch ASC, food ASC;';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':bbb', $bbb2, PDO::PARAM_STR);
    $stmt->bindValue(':aaa', $aaa2, PDO::PARAM_STR);
    $stmt->bindValue(':id1', $id1, PDO::PARAM_INT);
    $stmt->execute();
    $images = $stmt->fetchAll();
}
// header('Location:picture.html');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>health first</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/Picstyle.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Amoeba - v4.8.0
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.html">Health First</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="indexs.php">ホーム画面</a></li>
          <li><a href="picture.php">写真アップロード</a></li>
          <li><a class="nav-link scrollto" href="form2.php">お問い合わせ</a></li>
          <li><a href="logout.html">ログアウト</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>Welcome to Health First</h1>
      <h2>ここでは、あなたの健康を振り返ることができます。さあ恐れずに自分と向き合うのです。</h2>
      <a href="#about" class="btn-get-started scrollto">はじめよう！</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>
            <?php 
              echo $aaa;
              echo '<br>';
              echo $bbb;
            ?>
          </p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-4 col-md-6">
            <div class="member">
              <!-- <img src="$image" alt=""> -->
              <?php for($i = 0; $i < count($images); $i++): ?>
                    <!-- 写真全部を取得 -->
                    <!-- 一回だけ回して写真を表示できるようにする！ -->
                    <!-- 写真を全部回して３で割ることでその余りを使って朝、昼、夜に分けて -->
                    <!--  -->
                    <?php if($images[$i]['food'] == "1") :?> 
                      <!-- $imagesに今日の日付＆foodが１，２，３の写真のデータが配列に入っている -->
                      <!-- 今日の日付の写真がある場合に表示 -->
                      <li class="media mt-5">
                          <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                              <img src="k_image.php?id=<?= $images[$i]['id']; ?>" width="400" height="280" class="mr-3">
                          </a>
                          <div class="media-body">
                            <h5><?= $images[$i]['watch']; ?> </h5>
                            <h5><?= $images[$i]['food_time']; ?> </h5>
                            <h5>朝食</h5>                            
                          </div>
                          <?php $h += 1 ?>
                          この食事の評価は
                            <?= $images[$i]['evaluation']; ?>
                            <br>
                            ・メモ
                            <br>
                            <?= $images[$i]['memo']; ?>
                    </li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($h == 0) :?>
                    <img src="assets/img/portfolio/noPhoto.png" class="img-fluid" alt="">
                  <?php endif; ?>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
            <?php for($i = 0; $i < count($images); $i++): ?>
                    <!-- 写真全部を取得 -->
                    <?php if($images[$i]['food'] == "2") :?>
                      <!-- $imagesに今日の日付＆foodが１，２，３の写真のデータが配列に入っている -->
                      <!-- 今日の日付の写真がある場合に表示 -->
                      <li class="media mt-5">
                          <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                              <img src="k_image.php?id=<?= $images[$i]['id']; ?>" width="400" height="280" class="mr-3">
                          </a>
                          <div class="media-body">
                            <h5><?= $images[$i]['watch']; ?> </h5>
                            <h5><?= $images[$i]['food_time']; ?> </h5>
                            <h5>昼食</h5>
                          </div>
                          <?php $h1 += 1 ?>
                          この食事の評価は
                            <?= $images[$i]['evaluation']; ?>
                            <br>
                            ・メモ
                            <br>
                            <?= $images[$i]['memo']; ?>
                    </li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($h1 == 0) :?>
                    <img src="assets/img/portfolio/noPhoto.png" class="img-fluid" alt="">
                  <?php endif; ?>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <?php for($i = 0; $i < count($images); $i++): ?>
                <!-- 写真全部を取得 -->
                <?php if($images[$i]['food'] == "3") :?>
                  <!-- $imagesに今日の日付＆foodが１，２，３の写真のデータが配列に入っている -->
                  <!-- 今日の日付の写真がある場合に表示 -->
                  <li class="media mt-5">
                      <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                          <img src="k_image.php?id=<?= $images[$i]['id']; ?>" width="400" height="280" class="mr-3">
                      </a>
                      <div class="media-body">
                        <h5><?= $images[$i]['watch']; ?> </h5>
                        <h5><?= $images[$i]['food_time']; ?> </h5>
                        <h5>夜食</h5>
                      </div>
                      <?php $h2 += 1 ?>
                      この食事の評価は
                            <?= $images[$i]['evaluation']; ?>
                            <br>
                            ・メモ
                            <br>
                            <?= $images[$i]['memo']; ?>
                    </li>
                <?php endif; ?>
              <?php endfor; ?>

              <?php if($h2 == 0) :?>
                <img src="assets/img/portfolio/noPhoto.png" class="img-fluid" alt="">
              <?php endif; ?>
            </div>
          </div>
          <div>
            <form  method="post" enctype="multipart/form-data" action="gallery.php">
            <button type="submit" class="btn btn-primary">決定</button>
            <input type="date" name="aaa" min="2022-01-01">
                
            <input type="date" name="bbb" min="2022-01-01">
            </form>
          </div>

            </div>
      </div>
    </section><!-- End Our Team Section -->
    
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
      <!-- ======= Call To Action Section ======= -->
      <section class="call-to-action">
        <div class="container">
  
          <div class="text-center">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a class="cta-btn" href="#">Call To Action</a>
          </div>
  
        </div>
      </section><!-- End Call To Action Section -->