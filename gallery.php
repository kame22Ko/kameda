<?php
require_once('k_functions.php');

$pdo = connectDB();
date_default_timezone_set('Asia/Tokyo');
// $time = intval(date('H'));
$time = new DateTime('now');
// $time = $_POST['watch'];
$time2 = $time->format("Y-m-d");
$hiduke = 0;


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //初めにログインしたら今日の写真を表示する
    $sql = 'SELECT * FROM images WHERE watch = :time2 AND (food = "1" OR food = "2" OR food = "3")';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':time2', $time2, PDO::PARAM_STR);
    $stmt->execute();
    $images = $stmt->fetchAll();

    
} else {
    $bbb = $_POST['bbb'];
    $sql = 'SELECT * FROM images WHERE watch = :bbb AND (food = "1" OR food = "2" OR food = "3")';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':bbb', $bbb, PDO::PARAM_STR);
    $stmt->execute();
    $images = $stmt->fetchAll();
    //日付をがpostされたらその日の画像の取得
    // header('Location: gallery.php');
    // exit();
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
          <li><a class="nav-link scrollto active" href="index.html">ホーム画面</a></li>
          <!--<li><a class="nav-link scrollto" href="#about">紹介</a></li>
          <li><a class="nav-link scrollto" href="#services">サービス</a></li>-->
          <li><a href="picture.html">写真アップロード</a></li>
          <li><a href="calendar.html">カレンダー管理</a></li>
          <li><a class="nav-link scrollto" href="form.html">お問い合わせ</a></li>
          <li><a href="login.html">ログイン</a></li>
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
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-4 col-md-6">
            <div class="member">
              <!-- <img src="$image" alt=""> -->
              <?php for($i = 0; $i < count($images); $i++): ?>
                    <!-- 写真全部を取得 -->
                    <?php if($images[$i]['food'] == "1") :?>
                      <!-- $imagesに今日の日付＆foodが１，２，３の写真のデータが配列に入っている -->
                      <!-- 今日の日付の写真がある場合に表示 -->
                      <li class="media mt-5">
                          <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                              <img src="k_image.php?id=<?= $images[$i]['id']; ?>" width="400" height="280" class="mr-3">
                          </a>
                          <div class="media-body">
                              <h5><?= $images[$i]['image_name']; ?> (<?= number_format($images[$i]['image_size']/1000, 2); ?> KB)</h5>
                              <a href="javascript:void(0);" onclick="var ok = confirm('削除しますか？'); if (ok) location.href='k_delete.php?id=<?= $images[$i]['id']; ?>'"><i class="far fa-trash-alt"></i> 削除</a>
                          </div>
                          <img src="assets/img/portfolio/noPhoto.png" class="img-fluid" alt="">
                    </li>
                    <?php endif; ?>
                  <?php endfor; ?>
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <form  method="post" enctype="multipart/form-data">
                <button type="submit" class="btn btn-primary">決定</button>
                <input type="date" name="bbb" min="2022-01-01">
              </form>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <img src="assets/img/team/team-2.jpg" alt="">
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <p>
                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" alt="">
              <h4>William Anderson</h4>
              <span>CTO</span>
              <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
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