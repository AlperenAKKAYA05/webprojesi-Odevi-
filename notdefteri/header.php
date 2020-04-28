<?php 
include_once 'inc/config.php';

$db = new Db();
if (!$db->connect()) {
    die("Hata: Veritabanına bağlanırken bir hata oluştu." . $db->error());
}

$url = $_SERVER['SCRIPT_NAME'];
$parcala = explode ("/",$url);

$sayfano = (count($parcala))-1;
$sayfa = explode (".",$parcala[$sayfano]);

if($sayfa[0]=="index"){
  $tiltetag = "Not Ekle";
}
if($sayfa[0]=="contact"){
  $tiltetag = "İletişim";
}
if($sayfa[0]=="about"){
  $tiltetag = "Hakkımızda";
}
if($sayfa[0]=="notes"){
  $tiltetag = "Notlar";
}
if($sayfa[0]=="profile"){
  $tiltetag = "Profil";
}
if($sayfa[0]=="settings"){
  $tiltetag = "Ayarlar";
}
if($sayfa[0]=="register"){
  $tiltetag = "Kayıt Ol";
}
if($sayfa[0]=="login"){
  $tiltetag = "Giriş";
}


$user = $_SESSION["login_user"];

    $query_settings = "SELECT * FROM `settings`";
    $query_settings = $db->select($query_settings);
    $_SESSION["settings"] = array(
        "logo" => $query_settings[0]["logo"],
        "baslik" => $query_settings[0]["title"],
        "explanation" => $query_settings[0]["explanation"],
        "sitelink" => $query_settings[0]["url"],
        "reklamsag" => $query_settings[0]["ads_right"],
        "reklamsol" => $query_settings[0]["ads_left"],
        "footer" => $query_settings[0]["footer"],
        "hakkımızda" => $query_settings[0]["about"]
    );
    $settings = $_SESSION["settings"];
    $logo = "data:image/png;base64,".base64_encode($settings['logo']);
    ?>
<!DOCTYPE html>
<html>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $settings['baslik']." | ".$tiltetag; ?></title>

    <link rel="shortcut icon" href="<?php echo $logo; ?>">
    <link rel="apple-touch-icon" href="<?php echo $logo; ?>">
    <!--<link rel="image_src" href="<?php echo $logo; ?>">-->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <!-- https://bootswatch.com/sketchy/ -->
    <!-- Boot Swatch -->
    <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">

    <script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- End bootswatch -->



    <!-- Google ADS -->
    <script data-ad-client="ca-pub-2696967719177865" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Google ADS Old -->
    <script data-ad-client="ca-pub-4184759350451184" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <style type="text/css" media="screen">
      body {
        background: linear-gradient(45deg, #3bade3 0%, #576fe6 25%, #9844b7 51%, #ff357f 100%)no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        line-height: 0;
      }

      a {
        text-decoration: none;
      }

      a:hover {
        text-decoration: none;
      }

      footer {
        margin-top: 35px;
        color: #000;
        text-align: center;
      }
      .btn{
        margin-top: 15px;
      }
      .card-footer:last-child{
        border-radius: 0 0 0 0;
        background-color: #F7F7F7;
        margin-bottom: -16px;
        padding-bottom: 25px;
        border-radius: 5px 0 5px 5px/0 25px 25px 5px;
      }
      /*body {
        line-height: 1.2;
      }*/
    </style>
  </head>

  <body>

    <body>
      <div id="Solda Kayan Reklam" style="position: fixed; left: 0px; top: 0px; z-index: 0; color:white;margin-top: 10px;"><?php echo $settings['reklamsol']; ?></div>
      <div id="Sağda Kayan Reklam" style="position: fixed; right: 0px; top: 0px; z-index: 0; color:white;margin-top: 10px;"><?php echo $settings['reklamsag']; ?></div>

      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-md-12 text-center">
            <a href="index.php">
              <button type="button" class="btn btn-success">Not Ekle</button>
            </a>
            <a href="contact.php">
              <button type="button" class="btn btn-light">İletişim</button>
            </a>
            <a href="about.php">
              <button type="button" class="btn btn-light">Hakkımızda</button>
            </a>
            <?php if (!$user) { ?>
            <a href="register.php">
              <button type="button" class="btn btn-outline-warning">Kayıt Ol</button>
            </a>
            <a href="login.php">
              <button type="button" class="btn btn-outline-primary">Giriş Yap</button>
            </a>
            <?php } 

if ($user) { ?>
            <a href="notes.php">
              <button type="button" class="btn btn-primary">Notlarım</button>
            </a>
            <a href="profile.php">
              <button type="button" class="btn btn-primary">Profil</button>
            </a>
            <?php
}

if ($user['yetki']==1) { ?>
            <a href="settings.php">
              <button type="button" class="btn btn-primary">Ayarlar</button>
            </a>
            <?php }

if ($user) { ?>
            <a href="logout.php">
              <button type="button" class="btn btn-danger">Çıkış</button>
            </a>
            <?php }?>



            <!-- Yakında
<span class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dil Seç
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="index.php?dil=tr">Türkçe</a>
        <a class="dropdown-item" href="index.php?dil=en">English</a>
        <a class="dropdown-item" href="index.php?dil=fr">French</a>
        <a class="dropdown-item" href="index.php?dil=es">Spanish</a>
      </div>
    </span>
-->
          </div>
        </div>
      </div>
      <br>
