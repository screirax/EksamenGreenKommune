<?php
require "settings/init.php";
session_start(); // Start sessionen for at gemme data
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>ILVA</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <?php include 'settings/links.php'?>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php include 'settings/headertop.php';?>

<div class="container-fluid">
    <?php include 'settings/header.php';
    ?>
</div>
<?php include 'settings/menu.php';?>
<script>

    const sofaLink = document.getElementById("sofaklik");
    const sofaBillede = document.getElementById("sofaBillede");

    // Sæt farve eller billedskifte variabler
    let nyBilledUrl = "pictures/sofaerred.png"; // Indsæt her stien til det nye billede

    // Skift billedets src-attribut til den nye URL
    sofaBillede.src = nyBilledUrl;


</script>
<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary gap-3">




    <div class="row mt-2">
	<?php
	$produkter = $db->sql("SELECT * FROM produkter");
	foreach($produkter as $produkt) {
		?>
		<div class="col-12 col-md-6">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card-body">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($produkt->prodBillede); ?>" alt="Produkt billede" style="width: 200px; height: 200px;">

                        <?php
					//echo $produkt->prodNavn;
					?>

				</div>
                <div class="card-body mb-3">
                    <h5 class="card-title"><?php echo $produkt ->prodNavn; ?></h5>
                    <?php
                    //echo '<img src="data:image/jpeg;base64,' . base64_encode($produkt->prodBillede) . '" alt="Produkt billede" style="max-width:100%; height: auto;">';
                    ?>
                    <p class="card-text"><?php echo $produkt ->prodBeskrivelse; ?> </p>
                    <p class="card-text"><?php echo $produkt ->prodPris ?></p>
                    <a href="ditrum.php?prodId=<?php echo $produkt->prodId; ?>">
                        <button type="button" class="btn btn-primary" style="background-color: #009950; border: none;" >Tilføj</button>
                    </a>
                </div>
<!--
				<div class="card-body">
					<?php
					// Indsæt andet felt fra database
                    //echo $produkt->prodBeskrivelse;
					?>
				</div>
				<div class="card-footer text-muted">
					<?php
					// Indsæt andet felt fra database
                    //echo number_format($produkt->prodPris, 2, ',', '.'). " DKK";
					?>
				</div>
-->
			</div>
		</div>
        </div>
		<?php
	}
	?>



<?php include 'settings/buttomscripts.php';
include 'settings/footer.php';?></div>
</body>
</html>
