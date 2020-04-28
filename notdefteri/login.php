<?php
include_once ("inc/config.php");
 
$db = new Db();

if (!$db->connect()) {
    die("Hata: Veritabanına bağlanırken bir hata oluştu." . $db->error());
}

if ($user) {
    header("location: index.php");
    exit;
}
 
 
$email = $_POST["mail"];
$password = $_POST["sifre"];

$email = trim($email);
$password = trim($password);

$email = $db->quote($email);
$password = md5($password);


$query_conf= "SELECT * FROM users WHERE mail = $email and password = '$password'";
$result_conf = $db->select($query_conf);

if ($result_conf && count($result_conf) == 1) {
   $_SESSION["login_user"] = array(
        "id" => $result_conf[0]["id"],
        "ad" => $result_conf[0]["name"],
        "soyad" => $result_conf[0]["surname"],
        "mail" => $result_conf[0]["mail"],
        "telefon" => $result_conf[0]["telephone"],
        "yetki" => $result_conf[0]["authority"]
    );
/*
    header("location: ./index.php");
    exit;*/
}

if($_GET['mailkay']){
  $regmail = $_GET['mailkay'];
}

$user = $_SESSION["login_user"];

if ($user){
    header("location: index.php");
    exit;
}

?>
<?php include 'header.php'; ?>
<body style="background-color: #7f79de;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-6">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 15px;">
          <div class="card-body p-0 card">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center card-body p-3" style="line-height: 1.2; font-size: 55px; margin-top: -40px;">
                    <?php echo $tiltetag; ?>
                  </div>
                  <form action="login.php" method="POST">
                    <div class="form-group">
                      <input type="email" name="mail" class="form-control form-control-user"  placeholder="E-Mail Adresiniz" value="<?php echo $regmail ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" name="sifre" class="form-control form-control-user" placeholder="Şifreniz">
                    </div>
                    <button type="submit" name="oturumacma" class="btn btn-primary btn-user btn-block">Giriş Yap</button>
                  </form>
                  <div class="mb-3">
                      <span class="text-primary"><a href="register.php">Hayla üye değilmisin?</a></span>
                    </div>
                  <!--<div class="text-center mt-3">
                    <button class="btn btn-outline-primary btn-user btn-block" onclick="window.location.href='./register.php'">Üye Ol</button>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
<?php include 'footer.php'; ?>
</body>
</html>