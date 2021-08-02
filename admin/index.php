
<?php
  $baglanti = new PDO("mysql:host=localhost;dbname=otomobil","root","emre");

  if (isset($_POST['kaydet']))
  {
    //veritabanını çalıştırmak
      $komut = $baglanti -> prepare("select * from login");
      $komut -> execute();

    //k_ad texti alıp değişkene aktarılıyor
    $kullanıcıAd = $_POST['k_ad'];
    $sifre = $_POST['sifre'];
      while ($sonuc = $komut -> fetch(PDO::FETCH_ASSOC))
      {
          if ($sonuc['k_ad']==$kullanıcıAd && $sonuc['sifre']==$sifre)
          {
            header("Location:adminAnaSayfa.php");
          }else {
            echo "kullanıcı adı ve şifresi yanlış";
          }
      }
  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"> </script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap');
</style>
  </head>
  <body>

      <div style="margin-top:6%;">
        <p style="font-family: 'Berkshire Swash', cursive; font-size:40px; margin-left:6%;color:#922B21;">Merhaba, Hoş Geldin</p>
        <hr style="width:300px;margin-left:8%;">
        <form action="" method="post" enctype="multipart/form-data">
            <div style="margin-top:8%; float:left; margin-left:6%; margin-top:10%;" class="form-group">
              <label>Kullanıcı Adı: </label>
              <input type="text" class="form-control" style="width:450px" name="k_ad" placeholder="Örn: EmreKtz">
                <div class="form-group">
                  <label>Şifre: </label>
                  <input type="password" class="form-control" style="width:300px" name="sifre" placeholder="******">
                </div>

              <button class="btn btn-danger" style="width:120px;" type="submit" name="kaydet">Giriş Yap
          </div>
          <img style="float:right; margin-right:6%; margin-top:2%;" src="img/dunya.png" alt="">

        </form>

      </div>

  </body>
</html>
