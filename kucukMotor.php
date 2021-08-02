<?php
include("siteMenus.php");
$baglanti = new PDO("mysql:host=localhost;dbname=otomobil","root","emre");
?>

<html>
<body>
<div class = "container">
	<form action="" method="POST" enctype = "multipart/form-data">
		<div class = "row">
			<?php

				$komut = $baglanti->prepare("select adi,markasi,modeli,rengi,satis_fiyati,resim from aracbiriki,a1200mresim where aracbiriki.12_id = a1200mresim.12_id and aracbiriki.akategori_id = 9 group by aracbiriki.12_id");
				$komut->execute();
				while($sonuc=$komut->fetch(PDO::FETCH_BOTH))
				{
			?>
			<div class = "col col-sm-4 d-flex mt-5">
				<div class = "card">
					<div class = "card-header">
						Satış Fiyatı: <?php echo $sonuc['satis_fiyati'];?>
					</div>
					<div class = "card-body">
						<a class ="" href ="hafifAyrinti.php?a_id=<?php echo $sonuc['0'] ?>">
						<img src = "<?php echo $sonuc['resim'] ?>" class = "card-img-top"/>
					</a>
					</div>
					<div class = "card-footer bg-primary">
						<?php echo $sonuc['adi'];?>
					</div>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</form>
</div>
</body>

</html>
