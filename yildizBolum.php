<?php

include("siteMenus.php");
session_start();
?>

<div class="container">
	<div>
		<center>
			<h1>
				Yıldızlı Araclarınız
			</h1>

		</center>

		<?php

			foreach($_SESSION['yildiz'] as $keys)
			{
			?>
				<div>
					<span style="font-weight: bold; font-size: 16px;">
						Marka:
					</span>
					<?php echo "".$keys['arac_marka'].""; ?>
				</div>
				<div>
					<span style="font-weight: bold; font-size: 16px;">
						id:
					</span>
					<?php
						echo "".$keys['arac_id']."";

					?>
				</div>
				<div>
					<img src = <?php echo "".$keys['arac_resim'].""; ?> style ="height:100px"/>
				</div>
				<div>
					<a href = "yildizBolum.php?action=sil&id=<?php echo "".$keys['arac_id']."" ?>">Sil</a>
				</div>
				<br>

		<?php } ?>
	</div>
	<div>
		<form action = ""  method = "POST" enctype = "multipart/form-data">
			<button type = "submit" name = "satınAl" class = "btn bg-success">Satın Al</button>
		</form>
	</div>
</div>

<?php

	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="sil")
		{
			foreach($_SESSION["yildiz"] as $keys => $values)
			{
				if($values["arac_id"]==$_GET["id"])
					unset($_SESSION["yildiz"][$keys]);
					echo '<script>window.location="yildizBolum.php"</script>';
			}
		}
	}



?>
