<?php include 'header.php'; ?>
<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10">
      <div class="card shadow-lg">
        <div class="card-body p-3">
       <?php echo $tiltetag; ?>
       <hr style="border-top: 1px solid #000;">
       <form>
       	<div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">İsim Soyisim</label>
      <input type="text" name="NameSurname" class="form-control" placeholder="İsim Soyisim" required="">
    </div>
       	<div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">Mail Adresi</label>
      <input type="email" name="Mail" class="form-control" placeholder="Mail Adresi" required="">
    </div>
       	<div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">Konu</label>
      <input type="text" name="form_konu" placeholder="Konu Detayı" class="form-control" required="">
    </div>
       	   <div class="form-group">
      <label style="text-align:center;width: 100%;margin-bottom: 15px">Mesajınız</label>
      <textarea name="form_mesaj" placeholder="Mesajınız Girin" class="form-control" style="height: 15rem" required=""></textarea>
    </div>
    <div class="form-group">
     <button disabled type="submit" class="btn btn-primary" style="width: 100%">Gönder</button>
      </div>
        </form>
          <p class="text-warning" style="text-align:center;letter-spacing: 1px;">Bütün alanları eksiksiz doldurduğnuzdan emin olun.</p>
      	</div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>