<?php
$baglanti = new PDO("mysql:host=localhost;dbname=otomobil","root","emre");
include("siteMenus.php");

session_start();

$a_id = $_GET['a_id']; $stok =0;

$stok =0;
$arac_marka;
$arac_id;
$arac_resim;
$satış_fiyatı;

$komut = $baglanti->prepare("select aracbiriki.16_id,markasi,resim from aracbiriki,1200mresim where aracbiriki.16_id = 1200mresim.16_id and aracbiriki.kategori_id = 2 and aracbiriki.16_id ='$a_id'");
$komut->execute();

if($sonuc=$komut->fetch(PDO::FETCH_BOTH))
{
	$arac_id = $sonuc['0'];
	$arac_marka = $sonuc['1'];
	$arac_resim = $sonuc['2'];
}

if(isset($_POST['yildız']))
{
if(isset($_SESSION['yildız']))
{
	$arabaa_id = array_column($_SESSION['yildız'],"arac_id");
	if(!in_array($a_id,$arabaa_id))
	{
		$sayı = count($_SESSION['yildız']);
		$sayı = $sayı + 1;

		$yildızDizisi = array(
			"arac_id" => $a_id,
			"arac_marka" => $arac_marka,
			"arac_resim" => $arac_resim
		);

		$_SESSION['yildız'][$sayı]=$yildızDizisi;
	}
	else
	{
		echo '<script>alert("Ürününüz yıldız bölümüne eklenmiştir")</script>';
	}
}
else
{
	$yildızDizisi = array(
		"arac_id" => $a_id,
		"arac_marka" => $arac_marka,
		"arac_resim" => $arac_resim
	);
	$_SESSION['yildiz'][0] = $yildızDizisi;
}
}
?>

<html>
<script>
	$(window).on("load", onPageLoad);

function onPageLoad() {

	initListeners();
	restoreSavedValues();
}

function initListeners() {

	$("button").on("click", function() {

		var value = $("#araca").val();
		localStorage.setItem("sec", value);
	});
}

function restoreSavedValues() {

	if(localStorage.getItem('sec')){
        $('#araca').val(localStorage.getItem('sec'));
    }
}

</script>

<script>

	$(window).on("load",Baslangic);


	function Baslangic(){
		Acilis();
		Kapanis();
	}

	function Acilis(){
		$("button").on("click",function(){
			sessionStorage.setItem("gecici",$("#araca").val());
		})
	}

	function Kapanis(){
		if(sessionStorage.getItem("geciciDeger"))
		{
			$("#secim").val(sessionStorage.getItem("geciciDeger"));
		}
		sessionStorage.removeItem("geciciDeger");
	}
</script>

<body>

<div class = "parent-container">
	<div class = "row">
		<div class = "col-sm-9">
			<div class ="container">
				<form action="" method="POST" enctype = "multipart/form-data">
					<div class = "row">
						<?php
							$komut = $baglanti->prepare("select adi,satis_fiyati,resim from aracbiriki,a1600mresim where aracbiriki.16_id = a1600mresim.16_id and aracbiriki.akategori_id = 9 and aracbiriki.16_id ='$a_id'");
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
									<img src = "<?php echo $sonuc['resim'] ?>" class = "card-img-top"/>
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
		</div>
		<div class = "col-sm-3">
			<div class="container ">
				<form action = "" method = "POST" enctype = "multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
						<label>Arac</label>
							<div class = "form-group">
								<select class = "form-control" name = "araba" id="araca">
					<?php
							$komut = $baglanti->prepare("select adi,markasi,modeli,rengi from aracbiriki where 16_id = '$a_id'");
							$komut->execute();
							while($sonuc=$komut->fetch(PDO::FETCH_BOTH))
							{?>
						<option value = "<?php echo $sonuc['0']?>"><?php echo $sonuc['0']?></option>

						<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<label> Model Seçiniz</label>
		<div class ="row" >

				<button type = "submit" name ="44" class ="btn  bg-info form-control col-sm-2 ml-1">2010</button>
				<button type = "submit" name ="46" class ="btn bg-info form-control col-sm-2">2011</button>
				<button type = "submit" name ="48" class ="btn bg-info form-control col-sm-2">2012</button>
				<button type = "submit" name ="50" class ="btn bg-info form-control col-sm-2">2013</button>
				<button type = "submit" name ="52" class ="btn bg-info form-control col-sm-2">2014</button>
				<button type = "submit" name ="54" class ="btn bg-info form-control col-sm-2">2015</button>
				<button type = "submit" name ="56" class ="btn bg-info form-control col-sm-2">2016</button>
				<button type = "submit" name ="46" class ="btn bg-info form-control col-sm-2">2017</button>
				<button type = "submit" name ="48" class ="btn bg-info form-control col-sm-2">2018</button>
				<button type = "submit" name ="50" class ="btn bg-info form-control col-sm-2">2019</button>
				<button type = "submit" name ="52" class ="btn bg-info form-control col-sm-2">2020</button>
				<button type = "submit" name ="54" class ="btn bg-info form-control col-sm-2 ml-1">2021</button>
			</div>
	</form>
	<div class ="row">
		<div class="col-sm-6">

		<?php
		for($i=44;$i<=56;$i=$i+2)
		{
			if(isset($_POST[$i]))
			{
				if($_POST['araba'] =="binek")
				{
					$komut=$baglanti->prepare("select aracs from aracbiriki,araca where aracbiriki.16_id = araca.16_id and aracbiriki.16_id ='$id_degeri' and arac_a ='$i' and arac_cins = 'binek'");
					$komut->execute();

					if($sonuc = $komut->fetch(PDO::FETCH_BOTH))
						$stok = $sonuc['0'];
				}
				else if($_POST['araba'] =="ticari")
				{
					$komut=$baglanti->prepare("select aracs from aracbiriki,araca where aracbiriki.16_id = araca.16_id and aracbiriki.16_id ='$id_degeri' and arac_a ='$i' and arac_cins = 'ticari'");
										$komut->execute();

					if($sonuc = $komut->fetch(PDO::FETCH_BOTH))
						$stok = $sonuc['0'];
				}
				else if($_POST['araba'] =="suv")
				{
					$komut=$baglanti->prepare("select aracs from aracbiriki,araca where aracbiriki.16_id = araca.16_id and aracbiriki.16_id ='$id_degeri' and arac_a ='$i' and arac_cins = 'suv'");
										$komut->execute();

					if($sonuc = $komut->fetch(PDO::FETCH_BOTH))
						$stok = $sonuc['0'];
				}
		}
		?>
			Stok Sayısı: <?php echo $stok?>
		</div>
	</div>
	<br/>
	<div class ="row">
		<div class="col-sm-12">
			<button type = "submit" name ="yildız" class ="btn bg-success col-sm-6 p-2">Aracı Yıldızla</button>
		</div>
	</div>
</div>
</div>
</div>
</div>






</body>

</html>
