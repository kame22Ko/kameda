<?php
session_start ();
if(isset($_SESSION['name'])){
    // echo "ようこそ、".$_SESSION['name']."さん！";
  }else{
    header('refresh:0;login.html');
    exit;
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
          <li><a class="nav-link scrollto" href="logout.php">ログアウト</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End #header -->
  <main id="main">
    <form method="post" name="form" onsubmit="return validate()"><center>
      <h1 style="margin-top: 120px; margin-bottom: 10px;">お問い合わせ</h1>
      <table>
          <tr>
              <th class="hissu"><label>氏名</label></th>
              <td><input class="form-control" name="name1" type="text" value="" placeholder="氏名" required></td>
          </tr>
          <tr>
              <th class="ninni"><label>Mail</label></th>
              <td><input  class="form-control" name="EMail" type="text" value="" placeholder="メールアドレス" required></td>
          </tr>
          <tr>
              <th class="ninni"><label>年齢</label></th>
              <td><input class="form-control" name="age1" type="number" class="smallinput" value="" placeholder="年齢"  min='1' max='130' required></td>
          </tr>
          <tr>
              <th class="hissu"><label>内容</label></th>
              <td><textarea class="form-control" name="contents" value="" placeholder="内容" required></textarea></td>
          </tr>
      </table>
      <div class="buttonwrap">
          <button type="submit" name="button" formaction="indexs.php" class="btn btn-secondary"  style="width: 130px;">戻る</button>
          <button type="submit" name="button" formaction="form2_2.php" class="btn btn-danger"style="width: 130px;" >送信</button>
      </div>
    </center></form>
  </main>
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
