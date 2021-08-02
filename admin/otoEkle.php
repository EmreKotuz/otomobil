<?php
include "menus.php";
$baglanti = new PDO("mysql:host=localhost;dbname=otomobil","root","emre");

if (isset($_POST['ekle']))
{
  if ($_POST['arackategori']=="") {
    echo "boşlukları doldurunuz";
  }else {
    $aKategori_ad = $_POST["arackategori"];
    $aracc_id = $_POST["arac"];
    $baglanti -> query("insert into aKategori(aKategori_ad,arac_id) values('$aKategori_ad','$aracc_id')");
  }

}


?>
<div class="container">
    <h1>Araç Seçiniz</h1>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <label>Kategori Seçiniz</label>
      <div class="">
          <select class="form-control col-md-2" name="arac" id="secim">
          <option selected value="">Araç Seçiniz</option>
          <option value="1">Binek</option>
          <option value="2">Ticari</option>
          <option value="3">SUV</option>
        </select>
    </div>

      <div class="form-group"><br>
          <label class="form-control col-sm-4">Kategori Yazınız</label>
          <input type="text" name="arackategori" class="form-control col-sm-4">
          <button type="submit" name="ekle" class="form-control bg-warning col-sm-2">Kaydet</button>

      </div>

    </form>
</div>
