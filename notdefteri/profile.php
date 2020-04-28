<?php include 'header.php'; ?>
<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg">
        <div class="card-body p-3" style="line-height: 1.2;">
       <?php echo $tiltetag;

  if(!$_POST){
   $error = true;
    $errors[] = '*Dikkat: Şifrenizi hatalı girer iseniz şifreyi hatalı olarak değiştirisiniz.';
    $errors[] = '*Bilgiler Güncellendikten sonra otomatik çıkış yapılacaktır.';
  }

  echo $_POST['id'];
  if (!$error) {
  $id = $_POST['id'];
  $ad = $_POST['ad'];
  $soyad = $_POST['soyad'];
  $tel = $_POST['tel'];
  $mail = $_POST['mail'];
  $pass = md5($_POST['pass']);

  $query_userupdate = "UPDATE `users` SET `name`='$ad',`surname`='$soyad',`mail`='$mail',`password`='$pass',`telephone`='$tel' WHERE `id`=$id";
  $db->query($query_userupdate);

if ($_POST) {
    ?>
    <meta http-equiv="Refresh" content="0; URL=<?php echo 'http://'.Konum().'/logout.php'; ?>">
    <?php
}
  if($_POST){
   $error = true;
    $errors[] = '*Başarılı';
  }
  }

       ?>
       <hr>
          <form action="profile.php" method="POST">
             <div class="form-row">
              <div style="width: 100%;">
                <label>Ad:</label>
                <input type="text" class="form-control" name="ad" value="<?php echo $user['ad']; ?>" required="">
                <br>
                <label>Soyad:</label>
                <input type="text" class="form-control" name="soyad" value="<?php echo $user['soyad']; ?>" required="">
                <br>
                <label>Telefon: </label>
                <input type="text" class="form-control" name="tel" value="<?php echo $user['telefon']; ?>">
                <br>
                <label>Mail: </label>
                <input type="text" class="form-control" name="mail" value="<?php echo $user['mail']; ?>" required="">
                <br>
                <label>Şifre</label>
                <input type="text" class="form-control" name="pass" required="ss">
                <br>
                <center>
                <button type="submit" class="btn btn-primary" name="ayarkaydet" style="width: 80%;">Güncelle</button></center>
                <br>
                <?php
if ($error) {
  foreach ($errors as $err) {
    echo '<div>' . $err . '</div>';
    }
}
?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>