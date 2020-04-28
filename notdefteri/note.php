<?php
include 'header.php';
?>
<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg">
        <div class="card-body p-3" style="line-height: 1.2;">
        <span id="title">Title</span>
       <div id="Not-ID" style="float: right;">Not-ID</div>
       <hr style="border-top: 1px solid #000;">
<?php
if($_GET['not']) {
  $dortyuzdort = 0;
/***********************************************************/
$notlink = $_GET['not'];
if ($notlink) {
  $query_note = "UPDATE `notes` SET `read_count`=read_count + 1 WHERE `additional`='$notlink'";
  $query_note = $db->query($query_note);
  }


  $query_notes = "SELECT * FROM `notes` where `additional`= '$notlink' and `status`='1'";
    $query_notes = $db->select($query_notes);

    $_SESSION["notes"] = array(
        "additional" => $query_notes[0]["additional"],
        "detail" => $query_notes[0]["detail"],
        "title" => $query_notes[0]["title"],
        "read_count" => $query_notes[0]["read_count"],
        "status" => $query_notes[0]["status"],
        "limit" => $query_notes[0]["limit"],
        "owner" => $query_notes[0]["owner"],
        "upload_date" => $query_notes[0]["upload_date"]
    );
    $note = $_SESSION["notes"];

$additional = $note['additional'];
$detail = $note['detail'];
$title = $note['title'];
$read_count = $note['read_count'];
$status = $note['status'];
$limit = $note['limit'];
$owner = $note['owner'];
$upload_date = $note['upload_date'];

if(!$title) {
  $title = $owner;
  if (strstr($title, "@")) {
    $title = "Anonim-".$additional;
  }
}

echo $detail;
/***********************************************************/
?>
<hr>
<?php
echo "<center><p id='copyUrl'>".Konum()."/note.php?not=".$additional."</p></center>";
?>
<button onClick="CopyTagText('copyUrl')" class="btn btn-success btn-user btn-block">Linki Kopyala</button>
<script>
function CopyTagText(id) {  
  var from = document.getElementById(id);
  var range = document.createRange();
  window.getSelection().removeAllRanges();
  range.selectNode(from);
  window.getSelection().addRange(range);
  document.execCommand('copy');
  window.getSelection().removeAllRanges();
  alert("Koyalandı");
}
document.getElementById("title").innerHTML = "<?php echo $title;?>";
document.getElementById("Not-ID").innerHTML = "<?php echo $additional; ?>";
</script>
<?php 
}

if ($_GET['addid']) { 
  $dortyuzdort = 0;
/***********************************************************/
         echo "<center><p id='copyUrl'>".Konum()."/note.php?not=".$_GET['addid']."</p></center>";
         ?>
<button onClick="CopyTagText('copyUrl')" class="btn btn-success btn-user btn-block">Linki Kopyala</button>

<script>
function CopyTagText(id) {  
        var from = document.getElementById(id);
        var range = document.createRange();
        window.getSelection().removeAllRanges();
        range.selectNode(from);
        window.getSelection().addRange(range);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
        alert("Koyalandı");
}
document.getElementById("title").innerHTML = "Not Link Paylaşımı";
document.getElementById("Not-ID").innerHTML = null;
</script>

<?php
/***********************************************************/
}
if($dortyuzdort == 1) {
/***********************************************************/
echo "<center>404 Not Bulunamadı.</center>";
          ?>
<script>
document.getElementById("title").innerHTML = "<center>404</center>";
document.getElementById("Not-ID").innerHTML = null;
</script>
<?php 
/***********************************************************/
}
?>