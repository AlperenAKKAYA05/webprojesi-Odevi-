<?php include 'header.php'; 


      $konak  = $_SERVER['HTTP_HOST'];
      $yol   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $ek = 'index.php';
if ($user) {
   ?>
      <meta http-equiv="Refresh" content="0; URL=<?php echo "http://$konak$yol/$ek"; ?>">
      <?php
}

function email_check($email) {
  $sart = array('gmail.com','hotmail.com','yandex.com');
    if ( filter_var($email, FILTER_VALIDATE_EMAIL) ){
      $parcala = explode("@",$email);
      $son = end($parcala);
    if(in_array($son,$sart)) return TRUE;
     else return FALSE;
    }
    else {
      return FALSE;
    }
}


if ($_POST) {


  $mail = $_POST['Mail'];
  $name = $_POST['Name'];
  $surname = $_POST['Surname'];
  $pohne = $_POST['Pohne'];
  $pass = $_POST['Password'];
  $password = md5($_POST['Password']);
  $query_adduser= "SELECT * FROM users WHERE mail = '$mail'";
  $query_adduser = $db->select($query_adduser);

  if(!email_check("$mail")){
   $error = true;
    $errors[] = 'Hatalı Mail Sistemi.';
  }
  
  if ($query_adduser && count($query_adduser) == 1) {
   $error = true;
    $errors[] = 'Zaten Kayıtlısınız.';
  }

  if (!$error) {
  $query_adduser= "INSERT INTO `users`(`id`, `name`, `surname`, `mail`, `password`, `telephone`, `authority`) VALUES ('', '$name' , '$surname' , '$mail' , '$password' , '$pohne' ,0)";
  $db->query($query_adduser);
  }
}

//echo $_SERVER['REMOTE_ADDR'];
?>
<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10">
      <div class="card shadow-lg">
        <div class="card-body p-3">
       <?php echo $tiltetag; ?>
       <hr style="border-top: 1px solid #000;">
       <form action="register.php" method="POST">
        <div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">İsim*</label>
      <input type="text" name="Name" class="form-control" placeholder="İsim" required="">
    </div>
        <div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">Soyisim*</label>
      <input type="text" name="Surname" class="form-control" placeholder="Soyisim" required="">
    </div>
       	<div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">Mail*</label>
      <input type="email" name="Mail" class="form-control" placeholder="Mail Adresi" required="">
    </div>
        <div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">Telefon</label>
      <input type="text" name="Pohne" class="form-control" placeholder="Telefon">
    </div>
        <div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">Şifre*</label>
      <input type="password" name="Password" class="form-control" placeholder="Şifre" required="">
    </div>
    <div class="form-group">
     <button type="submit" class="btn btn-primary" style="width: 100%">Kayıt Ol</button>
      </div>
        </form>
          <p class="text-warning" style="text-align:center;letter-spacing: 1px;line-height: 1.2;">* (Zorunlu Alan)</p>
<p class="text-warning" style="text-align:center;letter-spacing: 1px;line-height: 1.2;">
<?php
if ($error) {
  foreach ($errors as $err) {
    echo '<div>' . $err . '</div>';
    }
}
?>
</p>
      	</div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>