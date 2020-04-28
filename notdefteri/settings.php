<?php include 'header.php';
if (!$user['yetki']==1){
  ?><meta http-equiv="Refresh" content="0; URL=<?php echo 'http://'.Konum().'/index.php'; ?>"><?php
}
 $query_settingss = "SELECT * FROM `settings`";
    $query_settingss = $db->select($query_settingss);
    $_SESSION["settingss"] = array(
        "id" => $query_settingss[0]["id"],
        "logo" => $query_settingss[0]["logo"],
        "baslik" => $query_settingss[0]["title"],
        "hakkımızda" => $query_settingss[0]["explanation"],
        "sitelink" => $query_settingss[0]["url"],
        "reklamsag" => $query_settingss[0]["ads_right"],
        "reklamsol" => $query_settingss[0]["ads_left"],
        "adminmail" => $query_settingss[0]["admin_mail"],
        "mailhost" => $query_settingss[0]["mail_host"],
        "mialmail" => $query_settingss[0]["mail_mail"],
        "mailport" => $query_settingss[0]["mail_port"],
        "footer" => $query_settingss[0]["footer"]
    );
    $settingss = $_SESSION["settingss"];

if($_POST){
    $site_baslik = $_POST['site_baslik'];
    $site_aciklama = $_POST['site_aciklama'];
    $site_link = $_POST['site_link'];
    $site_sahip_mail = $_POST['site_sahip_mail'];
    $site_mail_host = $_POST['site_mail_host'];
    $site_mail_mail = $_POST['site_mail_mail'];
    $site_mail_port = $_POST['site_mail_port'];
    $site_mail_sifre = $_POST['site_mail_sifre'];
    $site_reklam_sag = $_POST['site_reklam_sag'];
    $site_reklam_sol = $_POST['site_reklam_sol'];
    $sayfa_hakkimizda = $_POST['sayfa_hakkimizda'];
    $footer = $_POST['footer'];
    $site_hakkimizda = $_POST['site_hakkımızda'];

    $query_setings = "UPDATE `settings` SET `title`='$site_baslik',`explanation`='$sayfa_hakkimizda',`url`='$site_link',`ads_right`='$site_reklam_sag',`ads_left`='$site_reklam_sol',`admin_mail`='$site_sahip_mail',`mail_host`='$site_mail_host',`mail_mail`='$site_sahip_mail',`mail_port`='$site_mail_port',`about`='$site_hakkimizda' WHERE 1";
    $db->query($query_setings);


    $yonlendir = 'http://'.Konum()."/logout.php";
    ?>
    <meta http-equiv="Refresh" content="0; URL=<?php echo $yonlendir ?>">
    <?php
}


?>
<div class="container-fluid my-5" style="padding-bottom: -15px;">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h5 class="font-weight-bold text-primary"><?php echo $tiltetag; ?></h5>
        </div>
        <div class="card-body">
          <form action="settings.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Site Logo</label>
                <input type="file" class="form-control" name="site_logo">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Site Başlık</label>
                <input type="text" class="form-control" name="site_baslik" value="<?php echo $settingss['baslik'] ?>">
              </div>
            </div>


            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Site Açıklama</label>
                <input type="text" class="form-control" name="site_hakkımızda" value="<?php echo $settingss['aciklama'] ?>">
              </div>
            </div>


            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Site Link</label>
                <input type="text" class="form-control" name="site_link" value="<?php echo $settingss['sitelink'] ?>">
              </div>
            </div>


            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Site Sahibinin Mail Adresi</label>
                <input type="text" class="form-control" name="site_sahip_mail" value="<?php echo $settingss['site_sahip_mail'] ?>">
              </div>
            </div>


            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Mail Host Adresi</label>
                <input type="text" class="form-control" name="site_mail_host" value="<?php echo $settingss['site_mail_host'] ?>">
              </div>
              <div class="col-md-6 form-group">
                <label>Mail Adresi</label>
                <input type="text" class="form-control" name="site_mail_mail" value="<?php echo $settingss['site_mail_mail'] ?>">
              </div>
            </div>


            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Mail Post Numarası</label>
                <input type="text" class="form-control" name="site_mail_port" value="<?php echo $settingss['site_mail_port'] ?>">
              </div>
              <div class="col-md-6 form-group">
                <label>Mail Şifresi</label>
                <input type="text" class="form-control" name="site_mail_sifre" value="" disabled>
              </div>
            </div>
            
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Reklam Sağ</label>
                <input type="text" class="form-control" name="site_reklam_sag" value="<?php echo $settingss['reklamsag'] ?>">
              </div>
              <div class="col-md-6 form-group">
                <label>Reklam Sol</label>
                <input type="text" class="form-control" name="site_reklam_sol" value="<?php echo $settingss['reklamsol'] ?>">
              </div>
            </div>

            <div class="form-row">
              <div style="margin-bottom: 15px; width: 100%">
                <label>Footer</label>
                <input type="text" class="form-control" name="footer" value="<?php echo $settingss['footer'] ?>">
              </div>

              <div class="col-md-12 form-group">
                <label>Hakkımızda Sayfası</label>
                <textarea name="sayfa_hakkimizda" class="form-control" id="editor" style="height: 151px;width: 100%;"><?php echo $settingss['hakkımızda'] ?></textarea>
              </div>
            </div>

            <div class="form-row">
              <button type="submit" class="btn btn-primary" name="ayarkaydet">Kaydet</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>