<?php
require "settings/init.php";
session_start();

if (isset($_GET['prodId'])) {
    $prodId = $_GET['prodId'];

    // Tilføj produktet til kurven (sessionen)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $prodId;
}

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


    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php include 'settings/headertop.php';?>

<div class="container-fluid">
    <?php include 'settings/header.php';
    include 'settings/menu.php'?>
</div>
<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary">


    <div class="col-12 col-md-4 mt-5">
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
                        <button type="button" class="btn btn-primary btn-lg">Tilføj</button>
                    </a>
                </div>
            </div>
        </div>

        <h3 class="text-left mt-2">Dit Rum</h3>
        <p>Du er nu i stand til at klikke på på fra vores kataloger og sætte ind på din væg</p>

    </div>

    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum" style="border: 2px solid black; background-color: #F0E5DD; position: relative;">
            <div id="divvindue" style="border: 1px solid black; background-color: #6f42c1; position: absolute; width: 100px; height: 100px;"></div>
            <div id="divdoor" style="border: 1px solid black; background-color: #0f5132; position: absolute; width: 100px; height: 100px;"></div>
            <p class="text-center mt-3">Din Væg</p>
        </div>
    </div>



    <!--Henter data fra sessionstorage til at øndre hight og width til vores divrum-->
    <script>
        const savedHeight = sessionStorage.getItem("height");
        const savedWidth = sessionStorage.getItem("width");

        // Find div'en og span-elementerne, som skal opdateres
        const divrum = document.getElementById("divrum");
        const savedHeightSpan = document.getElementById("savedHeight");
        const savedWidthSpan = document.getElementById("savedWidth");


        // Check om der er gemte værdier i sessionStorage
        if (savedHeight && savedWidth) {
            // Opdater div-størrelsen
            divrum.style.height = savedHeight + "px";
            divrum.style.width = savedWidth + "px";

            // Opdater tekstindholdet i span-elementerne
            savedHeightSpan.textContent = savedHeight || "Ikke sat";
            savedWidthSpan.textContent = savedWidth || "Ikke sat";
        } else {
            // Hvis ingen data er gemt, vis en fejlmeddelelse på siden
            divrum.innerHTML = "<p style='color: red;'>Der er sket en fejl. Gå venligst tilbage til sidste side og prøv igen.</p>";
        }
    </script>
    <!--Henter data fra sessionstorage til at ændre hight og width til vores divvindue-->
    <script>
        const savedVindueHeight = sessionStorage.getItem("vindueHeight");
        const savedVindueWidth = sessionStorage.getItem("vindueWidth");

        const divvindue = document.getElementById("divvindue");
        const savedVindueHeightSpan = document.getElementById(savedVindueHeight);
        const savedVindueWidthSpan = document.getElementById(savedVindueWidth);

        if (savedVindueHeight && savedVindueWidth) {
            // Opdater div-størrelsen
            divvindue.style.height = savedVindueHeight + "px";
            divvindue.style.width = savedVindueWidth + "px";

            // Opdater tekstindholdet i span-elementerne
            savedHeightSpan.textContent = savedVindueHeight || "Ikke sat";
            savedWidthSpan.textContent = savedVindueWidth || "Ikke sat";
        }
        else {
            // Hvis ingen data er gemt, vis en fejlmeddelelse på siden
            divvindue.style.display = 'none';

        }

        const savedX = sessionStorage.getItem("divvindueX");
        const savedY = sessionStorage.getItem("divvindueY");



    </script>
    <!--Henter data fra sessionstorage til at ændre hight og width til vores dovdoor-->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const savedDoorHeight = sessionStorage.getItem("doorHeight");
            const savedDoorWidth = sessionStorage.getItem("doorWidth");

            const divdoor = document.getElementById("divdoor");
            const savedDoorHeightSpan = document.getElementById("savedDoorHeightSpan"); // Sørg for at dette ID findes i HTML
            const savedDoorWidthSpan = document.getElementById("savedDoorWidthSpan");   // Sørg for at dette ID findes i HTML

            if (savedDoorHeight && savedDoorWidth) {
                // Opdater div-størrelsen
                divdoor.style.height = savedDoorHeight + "px";
                divdoor.style.width = savedDoorWidth + "px";

                // Opdater tekstindholdet i span-elementerne
                savedDoorHeightSpan.textContent = savedDoorHeight || "Ikke sat";
                savedDoorWidthSpan.textContent = savedDoorWidth || "Ikke sat";
            } else {
                // Hvis ingen data er gemt, vis en fejlmeddelelse på divdoor
                divdoor.style.display = 'none';
            }

            const savedX = sessionStorage.getItem("divDoorX");
            const savedY = sessionStorage.getItem("divDoorY");

            // Sæt position hvis værdierne eksisterer
            if (savedX !== null && savedY !== null) {
                divdoor.style.left = savedX + "px";
                divdoor.style.top = savedY + "px";
            }
        });
    </script>
    <!--Henter data til placering af divvindue x og y-->
    <script>
        // Hent gemte positioner for divvindue
        document.addEventListener("DOMContentLoaded", () => {
            const divvindue = document.querySelector("#divvindue");

            const savedvindueX = sessionStorage.getItem("divvindueX");
            const savedvindueY = sessionStorage.getItem("divvindueY");

            if (savedvindueX !== null && savedvindueY !== null) {
                divvindue.style.left = savedvindueX + "px";
                divvindue.style.top = savedvindueY + "px";
            }
        });
    </script>
    <!--Henter data til placering af divvindue x og y-->
    <script>
        // Hent gemte positioner for divvindue
        document.addEventListener("DOMContentLoaded", () => {
            const divdoor = document.querySelector("#divdoor");

            const savedoorX = sessionStorage.getItem("divdoorX");
            const savedoorY = sessionStorage.getItem("divdoorY");

            if (savedoorX !== null && savedoorY !== null) {
                divdoor.style.left = savedoorX + "px";
                divdoor.style.top = savedoorY + "px";
            }
        });
    </script>



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
