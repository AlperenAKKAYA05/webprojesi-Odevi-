<?php include 'header.php'; ?>
<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg">
        <div class="card-body p-3" style="line-height: 1.2;">
       <?php echo $tiltetag; ?>
       <hr style="border-top: 1px solid #000;">

         <?php
         $usrmail = $user['mail'];

          $sorgu = "SELECT COUNT(*) AS toplam FROM notes WHERE `owner`='$usrmail'";
          $sonuc = $db->select($sorgu);
          $_SESSION["Toplam"] = array(
            "toplam" => $sonuc[0]["toplam"]
            );

          $toplam_icerik = $_SESSION["Toplam"]["toplam"];

         $sorgu = "SELECT * FROM `notes` WHERE `owner`='$usrmail'";
         $sonuc = $db->select($sorgu);

         $i = 0;
         $road = $_SERVER["SCRIPT_NAME"];
        $parcala_road = explode ("/",$road);

if($_GET['not'] and $_GET['id']){
$secilennot = $_GET['not'];
$idsi = $_GET['id'];
$silmesorgusu = "SELECT * FROM `notes` WHERE `additional`='$secilennot' and id='$idsi'";
$silmesorgusu = $db->query($silmesorgusu);

  echo "Not Silindi";
  echo "<hr>";
}


         echo "<table>";
         while ($i <= $toplam_icerik) {
          if($sonuc[$i]["id"]){
            if($sonuc[$i]['title']==""){
              $titlenote = $sonuc[$i]["additional"];
            }
            else {
              $titlenote = $sonuc[$i]["title"];
            }

             echo "
      <tr style='border-bottom:solid 2px grey;'>
         <td style='width: 80%;'>".$titlenote."</td>
         <td style='width: 50%;'><a href='./notes.php?not=".$sonuc[$i]['additional']."&id=".$sonuc[$i]['id']."' style='color:red'>Sil</a></td>
         <td style='width: 50%;'><a href='./note.php?not=".$sonuc[$i]['additional']."' style='color:green'>Paylaş</a></td>
      </tr>";
          }
          $i++;
         }
         echo "</table>";
         ?>

        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>