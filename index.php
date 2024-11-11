<?php
require "settings/init.php";
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

<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary">

    <div class="mt-5 col-12 col-md-6">
        <img class="img-fluid" src="pictures/aabning-nr40.webp">
    </div>


    <div class="col-12 col-md-6 mt-5">
        <h1 class="text-left">Prøv vores nye program til at oprette dit nye rum.</h1>
        <p class="text-left mt-1">
            Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder. Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse. I en kant af landet går der blandt om, at de vil sætte den over forbehold for tiden. Vi flotter med et hold, der vil rundt og se sig om i byen. Det gør heller ikke mere. Men hvor vi nu overbringer denne størrelse til det den handler om, så kan der fortælles op til 3 gange. Hvis det er træet til dit bord der får dig op, er det snarere varmen over de andre.
        </p>
        <a href="rummaal.php">
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2">Opret Rum</button>
        </a>
    </div>
</div>



<?php /*
<div class="row g-2">
	<?php
	$produkter = $db->sql("SELECT * FROM produkter");
	foreach($produkter as $produkt) {
		?>
		<div class="col-12 col-md-6">
			<div class="card w-100">
				<div class="card-header">
					<?php
					echo $produkt->prodNavn;
					?>
				</div>
                <div class="card-body">
                    <?php
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($produkt->prodBillede) . '" alt="Produkt billede" style="max-width:100%; height: auto;">';
                    ?>
                </div>

				<div class="card-body">
					<?php
					// Indsæt andet felt fra database
                    echo $produkt->prodBeskrivelse;
					?>
				</div>
				<div class="card-footer text-muted">
					<?php
					// Indsæt andet felt fra database
                    echo number_format($produkt->prodPris, 2, ',', '.'). " DKK";
					?>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
*/?>

<?php include 'settings/buttomscripts.php';
include 'settings/footer.php';?>
</body>
</html>
