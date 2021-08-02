
<?php include "menus.php";
$baglanti = new PDO("mysql:host=localhost;dbname=otomobil","root","emre");

if (isset($_POST['BirIkiSil'])) {
  $arac_id = $_POST['BirIkiSil'];
  $baglanti->query("delete from aracBirIki where 12_id = '$arac_id'");
  $baglanti->query("delete from a1200mResim where 12_id = '$arac_id'");
}
if (isset($_POST['BirAltiSil'])) {
  $arac_idd = $_POST['BirAltiSil'];
  $baglanti->query("delete from aracBirAlti where 16_id = '$arac_idd'");
  $baglanti->query("delete from a1600mResim where 16_id = '$arac_idd'");
}
if (isset($_POST['ikiBin'])) {
  $arac_iddd = $_POST['ikiBin'];
  $baglanti->query("delete from aracIkiBin where 20_id = '$arac_iddd'");
  $baglanti->query("delete from a2000mResim where 20_id = '$arac_iddd'");
}?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Binek Oto Sil</title>
  </head>
  <body>
    <script>

    $(function(){
      $("#12").hide();
      $("#13").hide();
      $("#14").hide();

      $("#secim").change(function(){
        $("#12").hide();
        $("#13").hide();
        $("#14").hide();

        $("#"+$(this).val()).show();
      });
    });

    </script>
    <div class="container">
        <h1 style="margin-top:4%;">Binek Araçları Göster</h1>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="">
              <select class="form-control col-md-2" name="arac" id="secim">
              <option selected value="">Kategori Seçiniz</option>
              <?php
              $komut=$baglanti->prepare("select * from aKategori where arac_id = 2");
              $komut->execute();
              while ($sonuc=$komut->fetch(PDO::FETCH_ASSOC))
              {
               ?>
               <option value="<?php echo  $sonuc['aKategori_id']?>"><?php echo $sonuc['aKategori_ad']?></option>
            <?php } ?>
            </select>
        </div><br>


        <div class="container" id="12">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table">
                  <thead>
                    <tr>
                    <th>Adı</th>
                    <th>Markası</th>
                    <th>Modeli</th>
                    <th>Rengi</th>
                    <th>Alış Fiyatı</th>
                    <th>Satış Fiyatı</th>
                    <th>Resim</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php
                    $komut=$baglanti->prepare("select aracIkiBir.12_id,adi,markasi,modeli,rengi,alis_fiyati,satis_fiyati,resim from aracBirIki,a1200mResim where aracBirIki.12_id = a1200mResim.12_id group by markasi");
                     $komut->execute();
                    while ($sonuc=$komut->fetch(PDO::FETCH_BOTH))
                    {
                     ?>
                     <tr>

                     <td><?php echo  $sonuc['adi']?></td>
                     <td><?php echo  $sonuc['markasi']?></td>
                     <td><?php echo  $sonuc['modeli']?></td>
                     <td><?php echo  $sonuc['rengi']?></td>
                     <td><?php echo  $sonuc['alis_fiyati']?></td>
                     <td><?php echo  $sonuc['satis_fiyati']?></td>
                     <td> <img src="<?php echo  $sonuc['resim']?>" width="80px" height="100px"/> </td>
                     <td> <button type="submit" value="<?php echo  $sonuc['0']?>"name="BirIkiSil" class = "bg-dark text-light">Sil</button> </td>
                     </tr>
                  <?php } ?>
                  </tbody>
                </table>
            </form>
        </div>

            <div class="container" id="13">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Adı</th>
                          <th>Markası</th>
                          <th>Modeli</th>
                          <th>Rengi</th>
                          <th>Alış Fiyatı</th>
                          <th>Satış Fiyatı</th>
                          <th>Resim</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php
                        $komut=$baglanti->prepare("select aracBirAlti.16_id,adi,markasi,modeli,rengi,alis_fiyati,satis_fiyati,resim from aracBirAlti,a1600mResim where aracBirAlti.16_id = a1600mResim.16_id group by markasi");
                        $komut->execute();
                        while ($sonuc=$komut->fetch(PDO::FETCH_BOTH))
                        {
                         ?>
                        <tr>

                          <td><?php echo  $sonuc['adi']?></td>
                          <td><?php echo  $sonuc['markasi']?></td>
                          <td><?php echo  $sonuc['modeli']?></td>
                          <td><?php echo  $sonuc['rengi']?></td>
                          <td><?php echo  $sonuc['alis_fiyati']?></td>
                          <td><?php echo  $sonuc['satis_fiyati']?></td>
                          <td> <img src="<?php echo  $sonuc['resim']?>" width="80px" height="100px"/> </td>
                          <td> <button type="submit" value="<?php echo  $sonuc['0']?>"name="BirAltiSil" class = "bg-dark text-light">Sil</button> </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                </form>
            </div>



                        <div class="container" id="14">
                            <form action="" method="post" enctype="multipart/form-data">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Adı</th>
                                      <th>Markası</th>
                                      <th>Modeli</th>
                                      <th>Rengi</th>
                                      <th>Alış Fiyatı</th>
                                      <th>Satış Fiyatı</th>
                                      <th>Resim</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                    <?php
                                    $komut=$baglanti->prepare("select aracIkiBin.20_id, a20_ad,a20_markasi,a20_modeli,a20_rengi,alis_fiyati,satis_fiyati,resim from aracIkiBin,a2000mResim where aracIkiBin.20_id = a2000mResim.20_id");
                                    $komut->execute();
                                    while ($sonuc=$komut->fetch(PDO::FETCH_BOTH))
                                    {
                                     ?>
                                     <tr>
                                       <td><?php echo  $sonuc['a20_ad']?></td>
                                       <td><?php echo  $sonuc['a20_markasi']?></td>
                                       <td><?php echo  $sonuc['a20_modeli']?></td>
                                       <td><?php echo  $sonuc['a20_rengi']?></td>
                                       <td><?php echo  $sonuc['alis_fiyati']?></td>
                                       <td><?php echo  $sonuc['satis_fiyati']?></td>
                                       <td> <img src="<?php echo  $sonuc['resim']?>" width="80px" height="100px"/> </td>
                                       <td> <button type="submit" value="<?php echo  $sonuc['0']?>"name="ikiBin" class = "bg-dark text-light">Sil</button> </td>
                                     </tr>

                                  <?php } ?>
                                  </tbody>
                                </table>
                            </form>
                        </div>
  </body>
</html>
