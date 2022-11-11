<?php
require_once('k_functions.php');

$pdo = connectDB();
date_default_timezone_set('Asia/Tokyo');
// $time = intval(date('H'));
$time = new DateTime('now');
$time2 = $time->format("Y-m-d");
$koko = 0;
$ko = 0;
$k = 0;

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $sql = 'SELECT * FROM images WHERE watch = :time2 AND (food = "1" OR food = "2" OR food = "3")';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':time2', $time2, PDO::PARAM_STR);
    $stmt->execute();
    $images = $stmt->fetchAll();

    
} else {
    // 画像を保存
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];
        $food = "";
        $food = $_POST['food'];
        $watch = "";
        $watch = $_POST['watch'];

        //同じ値の写真が存在するかの確認
        $sql = 'SELECT * FROM images WHERE watch = :watch1 AND (food = :food1 )';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':food1', $food, PDO::PARAM_STR);
        $stmt->bindValue(':watch1', $watch, PDO::PARAM_STR);
        $stmt->execute();
        $images = $stmt->fetchAll();

        //写真がすでに入っている場合にはじく
        if($images == null){
          $sql = 'INSERT INTO images(image_name, image_type, image_content, image_size, food, watch, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, :food, :watch ,now())'; 
          $stmt = $pdo->prepare($sql);
          $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
          $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
          $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
          $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
          $stmt->bindValue(':food', $food, PDO::PARAM_STR);
          $stmt->bindValue(':watch', $watch, PDO::PARAM_STR);
          $stmt->execute();         
        }else {
          echo '画像がすでに入っています';
        }
    }
    header('Location: picture.php');
    exit();
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
      <h2>私たちは、健康を一番に才能のあるWebデザインのチームです。</h2>
      <a href="#about" class="btn-get-started scrollto">はじめよう！</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

      <!-- ======= Our Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="section-title">
            <h2>Our Portfolio</h2>
          </div>
  
          <div class="row">
            <div class="col-lg-12">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-card">Card</li>
                <li data-filter=".filter-web">Web</li>
              </ul>
            </div>
          </div>
  
          <div class="row portfolio-container">
          
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <!--<img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">-->
                <form  method="post" enctype="multipart/form-data">
                  <button id="hozon" type="submit" class="btn btn-primary">保存</button>
                  <input type="file" name="image" accept='image/*' onchange="previewImage(this);">
                  <input name="food" value="1" type="hidden" />
                  <input type="date" name="watch" min="2022-01-01">

                  

                  </form>
                  <p>
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
                          <?php $koko += 1?>
                    </li>
                    <?php endif; ?>
                  <?php endfor; ?>

                  <?php if($koko == 0) :?>
                    <img src="assets/img/portfolio/noPhoto.png" class="img-fluid" alt="">
                  <?php endif; ?>

                  <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="img-fluid" alt="" >
                  <!-- <canvas id="preview" style="max-width:300px;"></canvas> -->
                  </p>
                  <script>
                  function previewImage(obj)
                  {
                    var fileReader = new FileReader();
                    fileReader.onload = (function() {
                      document.getElementById('preview').src = fileReader.result;
                    });
                    fileReader.readAsDataURL(obj.files[0]);
                  }
                  </script>
                <div class="portfolio-info">
                  <h3><a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" >朝食</a></h3>
                  <div>
                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bi bi-plus"></i></a>
                    <a href="portfolio-details.html" title="Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <form  method="post" enctype="multipart/form-data">
                  <!-- 写真に与える情報を入力 -->
                  <button id="hozon" type="submit" class="btn btn-primary">保存</button>
                  <input type="file" name="image" accept='image/*' onchange="previewImage2(this);">
                  <input name="food" value="2" type="hidden" />
                  <input type="date" name="watch" min="2022-01-01">

                  </form>
                  <p>
                  <?php for($i = 0; $i < count($images); $i++): ?>
                    <?php if($images[$i]['food'] == "2") :?>
                      <li class="media mt-5">
                          <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                              <img src="k_image.php?id=<?= $images[$i]['id']; ?>" width="400" height="280" class="mr-3">
                          </a>
                          <div class="media-body">
                              <h5><?= $images[$i]['image_name']; ?> (<?= number_format($images[$i]['image_size']/1000, 2); ?> KB)</h5>
                              <a href="javascript:void(0);" onclick="var ok = confirm('削除しますか？'); if (ok) location.href='k_delete.php?id=<?= $images[$i]['id']; ?>'"><i class="far fa-trash-alt"></i> 削除</a>
                          </div>
                          <?php $ko += 1?>
                      </li>
                      <?php endif; ?>
                  <?php endfor; ?>

                  <?php if($ko == 0) :?>
                    <img src="assets/img/portfolio/noPhoto.png" class="img-fluid" alt="">
                  <?php endif; ?>

                  <img id="preview3" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="img-fluid" alt="" >
                  </p>
                  <script>
                  function previewImage2(obj)
                  {
                    var fileReader = new FileReader();
                    fileReader.onload = (function() {
                      document.getElementById('preview3').src = fileReader.result;
                    });
                    fileReader.readAsDataURL(obj.files[0]);
                  }
                  </script>
                <div class="portfolio-info">
                  <h3><a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2">昼食</a></h3>
                  <div>
                    <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                    <a href="portfolio-details.html" title="Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <!--<img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">-->
                <form  method="post" enctype="multipart/form-data">
                  <button id="hozon" type="submit" class="btn btn-primary">保存</button>
                  <input type="file" name="image" accept='image/*' onchange="previewImage3(this);">
                  <input name="food" value="3" type="hidden" />
                  <input type="date" name="watch" min="2022-01-01">
                  </form>
                  <p>
                  <?php for($i = 0; $i < count($images); $i++): ?>
                    <?php if($images[$i]['food'] == "3") :?>
                      <li class="media mt-5">
                          <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                              <img src="k_image.php?id=<?= $images[$i]['id']; ?>" width="400" height="280" class="mr-3">
                          </a>
                          <div class="media-body">
                              <h5><?= $images[$i]['image_name']; ?> (<?= number_format($images[$i]['image_size']/1000, 2); ?> KB)</h5>
                              <a href="javascript:void(0);" onclick="var ok = confirm('削除しますか？'); if (ok) location.href='k_delete.php?id=<?= $images[$i]['id']; ?>'"><i class="far fa-trash-alt"></i> 削除</a>
                          </div>
                          <?php $k += 1?>
                      </li>
                      <?php endif; ?>
                  <?php endfor; ?>

                  <?php if($k == 0) :?>
                    <img src="assets/img/portfolio/noPhoto.png" class="img-fluid" alt="">
                  <?php endif; ?>

                  <img id="preview6" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="img-fluid" alt="" >
                  </p>
                  <script>
                  function previewImage3(obj)
                  {
                    var fileReader = new FileReader();
                    fileReader.onload = (function() {
                      document.getElementById('preview6').src = fileReader.result;
                    });
                    fileReader.readAsDataURL(obj.files[0]);
                  }
                  </script>
                <div class="portfolio-info">
                  <h3><a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3">夜食</a></h3>
                  <div>
                    <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                    <a href="portfolio-details.html" title="Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Our Portfolio Section -->
    
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