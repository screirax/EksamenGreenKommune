<?php
// Inkluderer indstillinger og init-fil, sandsynligvis for databaseforbindelse og andre basale funktioner
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>ILVA</title>

    <!-- Meta tags for SEO og copyright -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <!-- Inkluderer links til CSS, JS osv. fra links.php -->
    <?php include 'settings/links.php'?>

    <!-- Responsiv viewport-indstilling -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<!-- Inkluderer topsektion, sandsynligvis en header -->
<?php include 'settings/headertop.php';?>

<div class="container-fluid">
    <!-- Inkluderer header og menu i containeren -->
    <?php include 'settings/header.php';
    include 'settings/menu.php'?>
</div>

<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary">
    <!-- Venstre kolonne med tekst og inputfelter til at angive dimensioner for et vindue -->
    <div class="col-12 col-md-4 mt-5">
        <a href="rummaal.php" style="color: #000000"><i class="bi bi-arrow-left"></i>Tilbage</a>
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
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2">Næste</button>
        </a>
    </div>

    <!-- Højre kolonne med div'er for at vise væg og vindue som en visuel repræsentation -->
    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum" style="border: 2px solid black; background-color: #F0E5DD; position: relative;">
            <div id="divvindue" style="border: 1px solid black; background-color: #6f42c1; position: absolute; width: 100px; height: 100px; cursor: grab;"></div>
            <p class="text-center mt-3">Din Væg</p>
        </div>
    </div>

    <!-- Script til at justere højden og bredden af vinduet baseret på brugerinput -->
    <!-- Det er også her vi fjerner vores sessionstorage fra tidligere omrettelser af vinduer-->
    <script>
        const vindueHeightInput = document.querySelector("#vindueheight");
        const vindueWidthInput = document.querySelector("#vinduewidth")
        const divvindue = document.querySelector("#divvindue");

        // Fjerner specifikke værdier fra sessionStorage
        sessionStorage.removeItem("vindueHeight");
        sessionStorage.removeItem("vindueWidth");
        sessionStorage.removeItem("divvindueX");
        sessionStorage.removeItem("divvindueY");

        // Eventlistener til højdeinputfeltet
        vindueHeightInput.addEventListener("input", () => {
            let vindueHeightValue = vindueHeightInput.value;

            // Hvis højde > 850 cm, skaleres værdien ned til det halve
            if (vindueHeightValue > 850) {
                vindueHeightValue = vindueHeightValue / 2;
            }
            divvindue.style.height = vindueHeightValue + "px"; // Opdaterer vinduets højde i DOM
        });

        // Eventlistener til breddeinputfeltet
        vindueWidthInput.addEventListener("input", () => {
            let vindueWidthValue = parseFloat(vindueWidthInput.value);

            // Hvis bredde > 850 cm, skaleres værdien ned til det halve
            if (vindueWidthValue > 850) {
                vindueWidthValue = vindueWidthValue / 2;
            }
            divvindue.style.width = vindueWidthValue + "px"; // Opdaterer vinduets bredde i DOM
        });

        // Funktion til at gemme inputdata for højde og bredde i sessionStorage
        function saveVindueInputDataToStorage() {
            sessionStorage.setItem("vindueHeight", vindueHeightInput.value);
            sessionStorage.setItem("vindueWidth", vindueWidthInput.value);
        }

        // Gemmer data hver gang brugeren ændrer værdierne
        vindueHeightInput.addEventListener("input", saveVindueInputDataToStorage);
        vindueWidthInput.addEventListener("input", saveVindueInputDataToStorage);
    </script>

    <!-- Script til at hente og bruge gemte data fra sessionStorage -->
    <script>
        const savedHeight = sessionStorage.getItem("height");
        const savedWidth = sessionStorage.getItem("width");

        const divrum = document.getElementById("divrum");
        const savedHeightSpan = document.getElementById("savedHeight");
        const savedWidthSpan = document.getElementById("savedWidth");

        // Hvis gemte data findes, opdateres divrum's dimensioner og span-elementerne
        if (savedHeight && savedWidth) {
            divrum.style.height = savedHeight + "px";
            divrum.style.width = savedWidth + "px";
            savedHeightSpan.textContent = savedHeight || "Ikke sat";
            savedWidthSpan.textContent = savedWidth || "Ikke sat";
        } else {
            // Fejlmeddelelse, hvis data ikke er tilgængelige
            divrum.innerHTML = "<p style='color: red;'>Der er sket en fejl. Gå venligst tilbage til sidste side og prøv igen.</p>";
        }
    </script>

    <!-- Script til at muliggøre træk-og-slip af vinduesdiv'en -->
    <script>
        const divvinduemove = document.querySelector("#divvindue");
        const divrummove = document.querySelector("#divrum");

        let isDragging = false;
        let offsetX, offsetY;

        // Starter trækbevægelse ved mousedown
        divvinduemove.addEventListener("mousedown", (event) => {
            isDragging = true;
            offsetX = event.clientX - divvinduemove.offsetLeft;
            offsetY = event.clientY - divvinduemove.offsetTop;
            divvinduemove.style.cursor = "grabbing";
        });

        // Flytter element ved mousemove
        document.addEventListener("mousemove", (event) => {
            if (isDragging) {
                let x = event.clientX - offsetX;
                let y = event.clientY - offsetY;

                // Begrænser bevægelsen inden for grænserne af divrum
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

<!-- Sektion der er udkommenteret, sandsynligvis for at hente og vise produkter fra databasen -->
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
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($produkt->prodBillede
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
<!--Inkludere buttomscripts og footer-->
<?php include 'settings/buttomscripts.php';
include 'settings/footer.php';?>
</body>
</html>
