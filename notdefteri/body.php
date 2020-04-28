<?php
function linkuret() {
  //$karakterler = "1234567890abcdefghijuvwxyzklmnopqrst0987654321";//%46
  $karakterler = "12345678910ABCDEFGHIJUVWXYZKLMNOPQRSTabcdefghijuvwxyzklmnopqrst";
  for($i=0;$i<5;$i++)                   
  {
    $link .= $karakterler{rand() % 63};  
  }
  return $link;      
}


if ($_POST) {
  if (!$_POST['note']) {
    $error = true;
    $errors[] = 'Not Yazı Boş.';
    echo "<p>Not/Yazı Kısmı Boş Bırakılamaz</p>";
  }
  if (!$_POST['password']==$_POST['password2']) {
    $error = true;
    $errors[] = 'Farklı Şifre.';
    echo "<p>Şifreler Uyuşmuyor.</p>";
  }
  if (!$error) {
$link = linkuret();

$query= "SELECT * FROM `notes` Where additional='$link'";
$result = $db->select($query);

  if(count($result)==1){
  $reset = 0;  
  }

while (count($result) >= 1) {
  if($reset == 0) {
  $link = linkuret();
  $query= "SELECT * FROM `notes` Where additional='$link'";
  $result = $db->select($query);
    if(count($result) >= 1){
      $reset = 1;
    }
  }
  else {
  break;    
     }
}
  }
     if(!$user) {
      $owner = "Anonim-".$link;
     }
     else {
      $owner = $user['mail'];
     }

  $not = $_POST['note'];
  $pass = md5($_POST['password']);
  if($pass == "d41d8cd98f00b204e9800998ecf8427e") {
    $pass = null;
  }
  $title = $_POST['title'];
  $limit = $_POST['limit'];

  $query_note= "INSERT INTO `notes` VALUES ('','$link','$pass','$not','$title',0,1,'$limit',now(),'$owner')";
   $db->query($query_note);

   $durum=1;
}
if ($durum==1) {

 $yonlendir = 'http://'.Konum()."/note.php?addid=".$link;

    ?>
    <meta http-equiv="Refresh" content="0; URL=<?php echo $yonlendir ?>">
    <?php
}
?>

<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10">
      <div class="card shadow-lg">
        <form action="index.php" method="POST" accept-charset="utf-8">
          <div class="card-body p-3">

             <?php echo $tiltetag; ?>
       <hr style="border-top: 1px solid #000;">
            <textarea required="" name="note" class="form-control" style="height: 20rem"></textarea>
          </div>
          <div class="card-footer text-center">

            <button class="btn btn-danger" type="button" data-toggle="collapse" data-target=".secenekler" data-target="#secenekler">Seçenekler</button>
            <button type="submit" class="btn btn-primary" name="notekleme">Paylaş</button>

            <div class="collapse secenekler" id="secenekler">

              <div class="form-row" style="margin-top: 20px;">
                <div class="col-md-6 form-group">
                  <label>Not Başlığı</label>
                  <input type="text" name="title" placeholder="Not Başlığı" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                  <label>Gösterme Sınırı</label>
                  <input type="number" name="limit" placeholder="Gösterme Sınırı" class="form-control">
                </div>
              </div>
              <div style="margin-top:25px;margin-bottom: 35px;">
                Pasif
                <hr>
              </div>
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <label>Not Şifresi</label>
                  <input type="password" name="password" placeholder="Not Şifresi" class="form-control not-sifresi" disabled>
                </div>
                <div class="col-md-6 form-group">
                  <label>Şifre'yi Doğrula</label>
                  <input type="password" name="password2" placeholder="Şifre'yi Doğrula" class="form-control not-sifresi-tekrar" disabled>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="container mt-4">
  <div class="row d-flex justify-content-center">


    <?php
    $query = "SELECT COUNT(id) AS toplam FROM `notes`";
  $query = $db->select($query);
    ?>
    <div class="col-md-3">
      <div class="card text-center shadow-lg">
        <div class="card-body">
          <h6 class="font-weight-bold">Toplam Not</h6>
          <span><?php echo $query[0]['toplam']; ?></span>
        </div>
      </div>
    </div>



    <?php 
    $query = "SELECT SUM(`read_count`) AS topokuma FROM `notes`";
  $query = $db->select($query);
    ?>
    <div class="col-md-3">
      <div class="card text-center shadow-lg">
        <div class="card-body">
          <h6 class="font-weight-bold">Toplam Okuma</h6>
          <span><?php echo $query[0]['topokuma']; ?></span>
        </div>
      </div>
    </div>


    <?php
    $query = "SELECT COUNT(id) AS topkullanicilar FROM `users`";
  $query = $db->select($query);
    ?>
    <div class="col-md-3">
      <div class="card text-center shadow-lg">
        <div class="card-body">
          <h6 class="font-weight-bold">Toplam Üye</h6>
          <span><?php echo $query[0]['topkullanicilar']; ?></span>
        </div>
      </div>
    </div>


  </div>
</div>