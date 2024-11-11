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
        <a href="vindueside.php" style="color: #000000"><i class="bi bi-arrow-left"></i>Tilbage</a>
        <h3 class="text-left mt-2">Dør</h3>
        <p>Her kan du skrive målene på din dør og<br> bevæge den der hen hvor din dør normalt er</p>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Højde</span>
            <input type="text" class="form-control" id="doorheight" placeholder="Centimeter" aria-label="height" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Bredde</span>
            <input type="text" class="form-control" id="doorwidth" placeholder="Centimeter" aria-label="width" aria-describedby="basic-addon1">
        </div>
        <a href="ditrum.php">
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2">Opret Dit Rum</button>
        </a>
    </div>

    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum" style="border: 2px solid black; background-color: #F0E5DD; position: relative;">
            <div id="divvindue" style="border: 1px solid black; background-color: #6f42c1; position: absolute; width: 100px; height: 100px;"></div>
            <div id="divdoor" style="border: 1px solid black; background-color: #0f5132; position: absolute; width: 100px; height: 100px; cursor: grab;"></div>
            <p class="text-center mt-3">Din Væg</p>
        </div>
    </div>


    <!--Sætter højde og bredde på vores dør-->
    <script>
        // Select the input field and div element
        const doorHeightInput = document.querySelector("#doorheight");
        const doorWidthInput = document.querySelector("#doorwidth")
        const divdoor = document.querySelector("#divdoor");


        // Add an event listener for the 'input' event on the input field
        doorHeightInput.addEventListener("input", () => {
            // Get the value from the input field
            let doorHeightValue = doorHeightInput.value;

            if (doorHeightValue > 850) {
                doorHeightValue = doorHeightValue / 2;
            }

            // Log the value to the console
            console.log(doorHeightValue);

            // Update the width of divtest based on the input value
            divdoor.style.height = doorHeightValue + "px";
        });

        // Event listener for width input
        doorWidthInput.addEventListener("input", () => {
            let doorWidthValue = parseFloat(doorWidthInput.value); // Parse to a number

            // Check if widthValue is greater than 850
            if (doorWidthValue > 850) {
                doorWidthValue = doorWidthValue / 2; // Halve the value if over 850
            }

            // Update the width of divtest based on the adjusted input value
            divdoor.style.width = doorWidthValue + "px";
        });

        function saveDoorInputDataToStorage() {
            sessionStorage.setItem("doorHeight", doorHeightInput.value);
            sessionStorage.setItem("doorWidth", doorWidthInput.value);

        }

        doorHeightInput.addEventListener("input", saveDoorInputDataToStorage);
        doorWidthInput.addEventListener("input", saveDoorInputDataToStorage);


    </script>
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
            divrum.innerHTML = "<p style='color: red;'>Der er sket en fejl. Gå venligst tilbage til sidste side og prøv igen.</p>";
        }

        const savedX = sessionStorage.getItem("divvindueX");
        const savedY = sessionStorage.getItem("divvindueY");



    </script>
    <!--Henter data til placering af divvindue x og y-->
    <script>
        // Hent gemte positioner for divvindue
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
    <!--Bevæger dær og sætter x og y på den-->
    <script>
        const divdoormove = document.querySelector("#divdoor");
        const divrummove = document.querySelector("#divrum");

        let isDragging = false;
        let offsetX, offsetY;


        // Start dragging on mousedown
        divdoormove.addEventListener("mousedown", (event) => {
            isDragging = true;
            offsetX = event.clientX - divdoormove.offsetLeft;
            offsetY = event.clientY - divdoormove.offsetTop;
            divdoormove.style.cursor = "grabbing";
        });

        // Move element on mousemove
        document.addEventListener("mousemove", (event) => {
            if (isDragging) {
                let x = event.clientX - offsetX;
                let y = event.clientY - offsetY;

                // Constrain movement within divrum boundaries
                const divrumRect = divrummove.getBoundingClientRect();
                const divdoorRect = divdoormove.getBoundingClientRect();

                x = Math.max(0, Math.min(x, divrumRect.width - divdoorRect.width));
                y = Math.max(0, Math.min(y, divrumRect.height - divdoorRect.height));

                divdoormove.style.left = x + "px";
                divdoormove.style.top = y + "px";
            }
        });

        // Stop dragging on mouseup
        document.addEventListener("mouseup", () => {
            if (isDragging) {
                isDragging = false;
                divdoormove.style.cursor = "grab";

                // Gem nuværende position i sessionStorage
                const currentX = divdoormove.offsetLeft;
                const currentY = divdoormove.offsetTop;
                sessionStorage.setItem("divdoorX", currentX);
                sessionStorage.setItem("divdoorY", currentY);
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
