<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"> </script>

      <style media="screen">
        a:hover{
          transition: 0.5s;
          border-bottom:solid 1px  black;
        }
      </style>

  </head>
  <body>
    <div class="navbar navbar-expand-lg bg-dark">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Binek Oto</a>
          <div class="dropdown-menu">
            <a href="binekOto.php" class="dropdown-item ">Binek Oto Ekle</a>
            <a href="binek_goster.php" class="dropdown-item">Binek Oto Göster</a>
            <a href="binek_sil.php" class="dropdown-item">Binek Oto Sil</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Ticari Oto</a>
          <div class="dropdown-menu">
            <a href="ticarioto.php" class="dropdown-item">Ticari Oto Ekle</a>
            <a href="ticariGoster.php" class="dropdown-item">Ticari Oto Göster</a>
            <a href="ticariSil.php" class="dropdown-item">Ticari Oto Sil</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">SUV Oto</a>
          <div class="dropdown-menu">
            <a href="suvoto.php" class="dropdown-item">SUV Oto Ekle</a>
            <a href="suvGoster.php" class="dropdown-item">SUV Oto Göster</a>
            <a href="suvSil.php" class="dropdown-item">SUV Oto Sil</a>
          </div>
        <li class="navbar-item">
          <a href="#" class="nav-link text-success">Ciro</a>
        </li>
        <li class="navbar-item">
          <a href="#" class="nav-link text-success">Stok</a>
        </li>
        <li class="navbar-item">
          <a href="otoEkle.php" class="nav-link text-success">Otomobil Ekle</a>
        </li>
        <li>
          <a class="nav-link text-danger" style="float:right;" href="index.php">Çıkış Yap</a>
        </li>
      </ul>
    </div>

  </body>
</html>
