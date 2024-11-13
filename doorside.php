<?php
// Inkluderer settings/init.php for at initialisere systemet og eventuelle databaseforbindelser
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>ILVA</title>

    <!-- Metadata til søgemaskineoptimering og ophavsret -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <!-- Inkluderer links til CSS og JS -->
    <?php include 'settings/links.php'?>

    <!-- Tilpasning til responsiv visning på forskellige enheder -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<!-- Indsætter topbar/header fra en ekstern fil -->
<?php include 'settings/headertop.php';?>

<div class="container-fluid">
    <!-- Indsætter hovedheader og menu -->
    <?php include 'settings/header.php';
    include 'settings/menu.php'?>
</div>

<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary">

    <!-- Venstre kolonne med inputfelter til dørens dimensioner -->
    <div class="col-12 col-md-4 mt-5">
        <!-- Tilbage-knap, der navigerer brugeren til 'vindueside.php' -->
        <a href="vindueside.php" style="color: #000000"><i class="bi bi-arrow-left"></i>Tilbage</a>
        <h3 class="text-left mt-2">Dør</h3>
        <p>Her kan du skrive målene på din dør og<br> bevæge den der hen hvor din dør normalt er</p>

        <!-- Inputfelt til dørhøjde -->
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Højde</span>
            <input type="text" class="form-control" id="doorheight" placeholder="Centimeter" aria-label="height" aria-describedby="basic-addon1">
        </div>

        <!-- Inputfelt til dørbredde -->
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Bredde</span>
            <input type="text" class="form-control" id="doorwidth" placeholder="Centimeter" aria-label="width" aria-describedby="basic-addon1">
        </div>

        <!-- Knap, der opretter og navigerer til 'ditrum.php' -->
        <a href="ditrum.php">
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2" style="background-color: #009950 border: none;">Opret Dit Rum</button>
        </a>
    </div>

    <!-- Højre kolonne, der indeholder det visuelle repræsentationsområde -->
    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum">
            <!-- Plads til dør og vindue i rummet -->
            <div id="divvindue"></div>
            <div id="divdoor" style="cursor: grab;"></div>
        </div>
    </div>

    <!-- Script til at justere dørens højde og bredde baseret på brugerinput -->
    <script>
        const doorHeightInput = document.querySelector("#doorheight");
        const doorWidthInput = document.querySelector("#doorwidth");
        const divdoor = document.querySelector("#divdoor");

        // Fjerner gemte værdier fra sessionStorage
        sessionStorage.removeItem("doorHeight");
        sessionStorage.removeItem("doorWidth");
        sessionStorage.removeItem("divdoorX");
        sessionStorage.removeItem("divdoorY");

        // Lyttere til højdeinput
        doorHeightInput.addEventListener("input", () => {
            let doorHeightValue = doorHeightInput.value;
            if (doorHeightValue > 850) {
                doorHeightValue = doorHeightValue / 2;
            }
            divdoor.style.height = doorHeightValue + "px";
        });

        // Lyttere til breddeinput
        doorWidthInput.addEventListener("input", () => {
            let doorWidthValue = parseFloat(doorWidthInput.value);
            if (doorWidthValue > 850) {
                doorWidthValue = doorWidthValue / 2;
            }
            divdoor.style.width = doorWidthValue + "px";
        });

        // Gemmer dørens dimensioner i sessionStorage
        function saveDoorInputDataToStorage() {
            sessionStorage.setItem("doorHeight", doorHeightInput.value);
            sessionStorage.setItem("doorWidth", doorWidthInput.value);
        }

        doorHeightInput.addEventListener("input", saveDoorInputDataToStorage);
        doorWidthInput.addEventListener("input", saveDoorInputDataToStorage);
    </script>

    <!-- Script til at hente og bruge dimensioner for rummet fra sessionStorage -->
    <script>
        const savedHeight = sessionStorage.getItem("height");
        const savedWidth = sessionStorage.getItem("width");
        const divrum = document.getElementById("divrum");
        const savedHeightSpan = document.getElementById("savedHeight");
        const savedWidthSpan = document.getElementById("savedWidth");

        if (savedHeight && savedWidth) {
            divrum.style.height = savedHeight + "px";
            divrum.style.width = savedWidth + "px";
            savedHeightSpan.textContent = savedHeight || "Ikke sat";
            savedWidthSpan.textContent = savedWidth || "Ikke sat";
        } else {
            divrum.innerHTML = "<p style='color: red;'>Der er sket en fejl. Gå venligst tilbage til sidste side og prøv igen.</p>";
        }
    </script>

    <!-- Script til at hente vinduets dimensioner fra sessionStorage -->
    <script>
        const savedVindueHeight = sessionStorage.getItem("vindueHeight");
        const savedVindueWidth = sessionStorage.getItem("vindueWidth");
        const divvindue = document.getElementById("divvindue");
        const savedVindueHeightSpan = document.getElementById(savedVindueHeight);
        const savedVindueWidthSpan = document.getElementById(savedVindueWidth);

        if (savedVindueHeight && savedVindueWidth) {
            divvindue.style.height = savedVindueHeight + "px";
            divvindue.style.width = savedVindueWidth + "px";
            savedHeightSpan.textContent = savedVindueHeight || "Ikke sat";
            savedWidthSpan.textContent = savedVindueWidth || "Ikke sat";
        } else {
            divvindue.style.display = 'none';
        }

        const savedX = sessionStorage.getItem("divvindueX");
        const savedY = sessionStorage.getItem("divvindueY");
    </script>

    <!-- Script til at placere vindue på gemt X og Y position -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const divvindue = document.querySelector("#divvindue");
            const savedX = sessionStorage.getItem("divvindueX");
            const savedY = sessionStorage.getItem("divvindueY");

            if (savedX !== null && savedY !== null) {
                divvindue.style.left = savedX + "px";
                divvindue.style.top = savedY + "px";
            }
        });
    </script>

    <!-- Script til at aktivere træk og slip funktionalitet for døren -->
    <script>
        const divdoormove = document.querySelector("#divdoor");
        const divrummove = document.querySelector("#divrum");

        let isDragging = false;
        let offsetX, offsetY;

        // Begynd trækning af dør ved mousedown
        divdoormove.addEventListener("mousedown", (event) => {
            isDragging = true;
            offsetX = event.clientX - divdoormove.offsetLeft;
            offsetY = event.clientY - divdoormove.offsetTop;
            divdoormove.style.cursor = "grabbing";
        });

        // Flyt dørens position ved mousemove
        document.addEventListener("mousemove", (event) => {
            if (isDragging) {
                let x = event.clientX - offsetX;
                let y = event.clientY - offsetY;
                const divrumRect = divrummove.getBoundingClientRect();
                const divdoorRect = divdoormove.getBoundingClientRect();

                x = Math.max(0, Math.min(x, divrumRect.width - divdoorRect.width));
                y = Math.max(0, Math.min(y, divrumRect.height - divdoorRect.height));

                divdoormove.style.left = x + "px";
                divdoormove.style.top = y + "px";
            }
        });

        // Stop trækning og gem dørens position ved mouseup
        document.addEventListener("mouseup", () => {
            if (isDragging) {
                isDragging = false;
                divdoormove.style.cursor = "grab";
                sessionStorage.setItem("divdoorX", divdoormove.offsetLeft);
                sessionStorage.setItem("divdoorY", divdoormove.offsetTop);
            }
        });
    </script>
</div>

<!-- Dynamisk liste over produkter (skjult, men efterladt som kommentar for fremtidig reference) -->
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
                    echo $produkt->prodBeskrivelse;
					?>
				</div>
				<div class="card-footer text-muted">
					<?php
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

<!-- Inkluderer footerscripts og footer -->
<?php include 'settings/buttomscripts.php';
include 'settings/footer.php';?>
</body>
</html>
