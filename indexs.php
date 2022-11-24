<?php
session_start ();
if(isset($_SESSION['name'])){
    echo "ようこそ、".$_SESSION['name']."さん！";
  }else{
    header('refresh:0;login.html');
    exit;
}
?>
<?php
require_once('k_functions.php');

$pdo = connectDB();
date_default_timezone_set('Asia/Tokyo');
// $time = intval(date('H'));
$time = new DateTime('now');
$time2 = $time->format("Y-m-d");
$bat1 = 0;
$bat2 = 0;
$bat3 = 0;
$bat4 = 0;
$bat5 = 0;

if  ( $_SERVER['REQUEST_METHOD'] !='POST'){
    // session_start ();
    $id1 = $_SESSION['id'];        
    $sql = 'SELECT * FROM images WHERE watch <= :time2 AND use_id = :id1';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':time2', $time2, PDO::PARAM_STR);
    $stmt->bindValue(':id1', $id1, PDO::PARAM_INT);
    $stmt->execute();
    $images = $stmt->fetchAll();

     for($i = 0; $i < count($images); $i++){
        if($images[$i]['evaluation'] == "最悪"){
            $bat1 += 1 ;
        }elseif($images[$i]['evaluation'] == "良くない"){
            $bat2 += 1 ;
        }elseif($images[$i]['evaluation'] == "普通"){
            $bat3 += 1 ;
        }elseif($images[$i]['evaluation'] == "良い"){
            $bat4 += 1 ;
        }elseif($images[$i]['evaluation'] == "最高"){
            $bat5 += 1 ;
        }    
}
}
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
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="calen_link/calendar.css">
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
          <li><a class="nav-link scrollto active" href="#hero">ホーム画面</a></li>
          <li><a href="form2.php">お問い合わせ</a></li>
          <li><a href="picture.php">写真アップロード</a></li>
          <li><a href="logout.php">ログアウト</a></li>
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
      <a href="login.html" class="btn-get-started scrollto">はじめよう！</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>私たちの紹介</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
        <div id="calendar"></div>
			  <!--<script src="calendar.js"></script>-->
        <span id="calenArea"></span>
        <script type="text/javascript" src="calen_link/calendar.js"></script>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1">
              <h3>私たちのチームは、あたかも身体の快楽が想定されているかのように、最も価値のある快楽を提供します。</h3>
              <p class="fst-italic">
                私たちは健康を一番に活動しています。
              </p>
              <ul>
                <h3><?php print "最低の評価をした回数は" . $bat1 ."です。" ?><br></h3>
                <h3><?php print "良くないの評価をした回数は" . $bat2 ."です。"?><br></h3>
                <h3><?php print "普通の評価をした回数は" . $bat3 ."です。"?><br></h3>
                <h3><?php print "良いの評価をした回数は" . $bat4 ."です。"?><br></h3>
                <h3><?php print "最高の評価をした回数は" . $bat5 ."です。"?><br></h3>
 

                <li><i class="bi bi-check2-circle"></i>私達はそれから何らかの利益を得ることを除いて、まったく働きません</li>
                <li><i class="bi bi-check2-circle"></i> 疑念や苛立ちを育み、喜びの叱責の痛みを持って髪の毛になりたい。</li>
                <li><i class="bi bi-check2-circle"></i> 欲望に目がくらんでいない限り、彼らは中にいる義務を放棄した者の罪悪感の魂。</li>
                <li><i class="bi bi-check2-circle"></i><a href="https://www.topgate.co.jp/google-calendar-how-to-use">わからない際はこちら</a></li>
              </ul>
            </div>
          </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>サービス</h2>
          <p>利益を得るには多大な労力が必要です。貴方のニーズは、実際に貴方の憤怒と欲望の中から生じます。貴方が理想を望むものにしましょう。そして、他人はそれを受け入れません。</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-cpu"></i></div>
            <h4 class="title"><a href="">食事写真アップロード機能</a></h4>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-clipboard-data"></i></div>
            <h4 class="title"><a href="">カレンダーで全てを管理</a></h4>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-globe"></i></div>
            <h4 class="title"><a href="chatbot.html">専門スタッフのアフタフォロー</a></h4>
          </div>
      </div>
    </section><!-- End Services Section -->

    
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