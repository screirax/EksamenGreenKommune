<?php
// Inkluderer settings/init.php, som sandsynligvis indeholder databaseforbindelse og basisfunktioner
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>ILVA</title>

    <!-- Meta tags til SEO og copyright -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <!-- Inkluderer CSS- og JavaScript-links fra en separat fil -->
    <?php include 'settings/links.php'?>

    <!-- Indstilling for responsiv visning -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<!-- Inkluderer en øvre sektion, sandsynligvis en header -->
<?php include 'settings/headertop.php';?>

<div class="container-fluid">
    <!-- Inkluderer header og menu i en container -->
    <?php include 'settings/header.php';
    include 'settings/menu.php'?>
</div>

<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary">

    <div class="col-12 col-md-4 mt-5">
        <a href="rummaal.php" style="color: #0a58ca"><i class="bi bi-arrow-left"></i>Tilbage</a>
        <h3 class="text-left mt-2">Vindue</h3>
        <p>Her kan du skrive målene på dit vindue op og bevæge det med brug af mus hen hvor dit vindue normalt er</p>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Højde</span>
            <input type="text" class="form-control" id="vindueheight" placeholder="Centimeter" aria-label="height" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Bredde</span>
            <input type="text" class="form-control" id="vinduewidth" placeholder="Centimeter" aria-label="width" aria-describedby="basic-addon1">
        </div>
        <!-- Næste-knap der leder videre til en anden side -->
        <a href="doorside.php">
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2 " style="background-color: #009950 border: none;" >Næste</button>
        </a>
    </div>



    <!-- Højre kolonne: Visuel repræsentation af væg og vindue -->
    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum">
            <div id="divvindue" style="cursor: grab;"></div>
        </div>
    </div>

    <!-- Script til at justere vinduets størrelse baseret på input og session data -->
    <script>
        const vindueHeightInput = document.querySelector("#vindueheight");
        const vindueWidthInput = document.querySelector("#vinduewidth")
        const divvindue = document.querySelector("#divvindue");

        // Sletter tidligere gemte vinduesdimensioner fra sessionStorage
        sessionStorage.removeItem("vindueHeight");
        sessionStorage.removeItem("vindueWidth");
        sessionStorage.removeItem("divvindueX");
        sessionStorage.removeItem("divvindueY");

        // Lytter til ændringer i højdeinputfeltet
        vindueHeightInput.addEventListener("input", () => {
            let vindueHeightValue = vindueHeightInput.value;

            // Hvis højde > 850 cm, halveres værdien for at passe til skærmen
            if (vindueHeightValue > 850) {
                vindueHeightValue = vindueHeightValue / 2;
            }
            divvindue.style.height = vindueHeightValue + "px"; // Opdaterer vinduets højde
        });

        // Lytter til ændringer i breddeinputfeltet
        vindueWidthInput.addEventListener("input", () => {
            let vindueWidthValue = parseFloat(vindueWidthInput.value);

            // Hvis bredde > 850 cm, halveres værdien for at passe til skærmen
            if (vindueWidthValue > 850) {
                vindueWidthValue = vindueWidthValue / 2;
            }
            divvindue.style.width = vindueWidthValue + "px"; // Opdaterer vinduets bredde
        });

        // Funktion til at gemme højde og bredde i sessionStorage
        function saveVindueInputDataToStorage() {
            sessionStorage.setItem("vindueHeight", vindueHeightInput.value);
            sessionStorage.setItem("vindueWidth", vindueWidthInput.value);
        }

        // Gemmer data ved ændringer i inputfelterne
        vindueHeightInput.addEventListener("input", saveVindueInputDataToStorage);
        vindueWidthInput.addEventListener("input", saveVindueInputDataToStorage);
    </script>

    <!-- Script til at hente og bruge gemte dimensioner fra sessionStorage -->
    <script>
        const savedHeight = sessionStorage.getItem("height");
        const savedWidth = sessionStorage.getItem("width");

        const divrum = document.getElementById("divrum");
        const savedHeightSpan = document.getElementById("savedHeight");
        const savedWidthSpan = document.getElementById("savedWidth");

        // Hvis data er gemt, opdateres divrum og vises dimensioner
        if (savedHeight && savedWidth) {
            divrum.style.height = savedHeight + "px";
            divrum.style.width = savedWidth + "px";
            savedHeightSpan.textContent = savedHeight || "Ikke sat";
            savedWidthSpan.textContent = savedWidth || "Ikke sat";
        } else {
            // Fejlmeddelelse, hvis data mangler
            divrum.innerHTML = "<p style='color: red;'>Der er sket en fejl. Gå venligst tilbage til sidste side og prøv igen.</p>";
        }
    </script>

    <!-- Script til træk-og-slip-funktion for vinduesdiv'en -->
    <script>
        const divvinduemove = document.querySelector("#divvindue");
        const divrummove = document.querySelector("#divrum");

        let isDragging = false;
        let offsetX, offsetY;

        // Begynder trækbevægelsen ved mousedown
        divvinduemove.addEventListener("mousedown", (event) => {
            isDragging = true;
            offsetX = event.clientX - divvinduemove.offsetLeft;
            offsetY = event.clientY - divvinduemove.offsetTop;
            divvinduemove.style.cursor = "grabbing";
        });

        // Flytter elementet ved mousemove
        document.addEventListener("mousemove", (event) => {
            if (isDragging) {
                let x = event.clientX - offsetX;
                let y = event.clientY - offsetY;

                // Begrænser trækbevægelsen inden for divrum
                const divrumRect = divrummove.getBoundingClientRect();
                const divvindueRect = divvinduemove.getBoundingClientRect();

                x = Math.max(0, Math.min(x, divrumRect.width - divvindueRect.width));
                y = Math.max(0, Math.min(y, divrumRect.height - divvindueRect.height));

                divvinduemove.style.left = x + "px";
                divvinduemove.style.top = y + "px";
            }
        });

        // Stopper trækbevægelse ved mouseup og gemmer positionen i sessionStorage
        document.addEventListener("mouseup", () => {
            if (isDragging) {
                isDragging = false;
                divvinduemove.style.cursor = "grab";
                const currentX = divvinduemove.offsetLeft;
                const currentY = divvinduemove.offsetTop;
                sessionStorage.setItem("divvindueX", currentX);
                sessionStorage.setItem("divvindueY", currentY);
            }
        });
    </script>
</div>

<!-- Sektion til fremtidig brug: Udtaget kode til visning af produkter fra databasen -->
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
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($produkt->prodBillede)
                    ?>
                </div>

				<div class="card-body">
					<?php
					// Viser produktbeskrivelse
                    echo $produkt->prodBeskrivelse;
					?>
				</div>
				<div class="card-footer text-muted">
					<?php
					// Viser produktpris formateret
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
<!-- Inkluderer scripts og footer -->
<?php include 'settings/buttomscripts.php';
include 'settings/footer.php';?>
</body>
</html>
