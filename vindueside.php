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
        <a href="rummaal.php" style="color: #000000"><i class="bi bi-arrow-left"></i>Tilbage</a>
        <h3 class="text-left mt-2">Vindue</h3>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Højde</span>
            <input type="text" class="form-control" id="vindueheight" placeholder="Centimeter" aria-label="height" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Bredde</span>
            <input type="text" class="form-control" id="vinduewidth" placeholder="Centimeter" aria-label="width" aria-describedby="basic-addon1">
        </div>
        <a href="rummaal.php">
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2">Næste</button>
        </a>
    </div>
<!--
    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum" style="border: 2px solid black; background-color: #F0E5DD">
            <p class="text-center mt-3">Din Væg</p>

            <h2>Gemte mål</h2>
            <p>Højde: <span id="savedHeight"></span> cm</p>
            <p>Bredde: <span id="savedWidth"></span> cm</p>

        </div>
    </div>



    <script>

        const savedHeight = sessionStorage.getItem("height");
        const savedWidth = sessionStorage.getItem("width");


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

        else
        {
            divrum.innerHTML = "<p style='color: red;'>Der er sket en fejl. Gå venligst tilbage til sidste side og prøv igen.</p>";
        }
    </script>
-->
    <!--<div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum" style="border: 2px solid black; background-color: #F0E5DD">
            <div class="" id="divvindue" style="border: 1px solid black; background-color: #6f42c1"></div>
            <p class="text-center mt-3">Din Væg</p>
        </div>
    </div>-->
    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum" style="border: 2px solid black; background-color: #F0E5DD; position: relative;">
            <div id="divvindue" style="border: 1px solid black; background-color: #6f42c1; position: absolute; width: 100px; height: 100px; cursor: grab;"></div>
            <p class="text-center mt-3">Din Væg</p>
        </div>
    </div>



    <script>
        // Select the input field and div element
        const vindueHeightInput = document.querySelector("#vindueheight");
        const vindueWidthInput = document.querySelector("#vinduewidth")
        const divvindue = document.querySelector("#divvindue");


        // Add an event listener for the 'input' event on the input field
        vindueHeightInput.addEventListener("input", () => {
            // Get the value from the input field
            let vindueHeightValue = vindueHeightInput.value;

            if (vindueHeightValue > 850) {
                vindueHeightValue = vindueHeightValue / 2;
            }

            // Log the value to the console
            console.log(vindueHeightValue);

            // Update the width of divtest based on the input value
            divvindue.style.height = vindueHeightValue + "px";
        });

        // Event listener for width input
        vindueWidthInput.addEventListener("input", () => {
            let vindueWidthValue = parseFloat(vindueWidthInput.value); // Parse to a number

            // Check if widthValue is greater than 850
            if (vindueWidthValue > 850) {
                vindueWidthValue = vindueWidthValue / 2; // Halve the value if over 850
            }

            // Update the width of divtest based on the adjusted input value
            divvindue.style.width = vindueWidthValue + "px";
        });

        function saveVindueInputDataToStorage() {
            sessionStorage.setItem("vindueHeight", vindueHeightInput.value);
            sessionStorage.setItem("vindueWidth", vindueWidthInput.value);

        }

        vindueHeightInput.addEventListener("input", saveVindueInputDataToStorage);
        vindueWidthInput.addEventListener("input", saveVindueInputDataToStorage);


    </script>

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

    <script>
        const divvinduemove = document.querySelector("#divvindue");
        const divrummove = document.querySelector("#divrum");

        let isDragging = false;
        let offsetX, offsetY;

        // Start dragging on mousedown
        divvinduemove.addEventListener("mousedown", (event) => {
            isDragging = true;
            offsetX = event.clientX - divvinduemove.offsetLeft;
            offsetY = event.clientY - divvinduemove.offsetTop;
            divvinduemove.style.cursor = "grabbing";
        });

        // Move element on mousemove
        document.addEventListener("mousemove", (event) => {
            if (isDragging) {
                let x = event.clientX - offsetX;
                let y = event.clientY - offsetY;

                // Constrain movement within divrum boundaries
                const divrumRect = divrummove.getBoundingClientRect();
                const divvindueRect = divvinduemove.getBoundingClientRect();

                x = Math.max(0, Math.min(x, divrumRect.width - divvindueRect.width));
                y = Math.max(0, Math.min(y, divrumRect.height - divvindueRect.height));

                divvinduemove.style.left = x + "px";
                divvinduemove.style.top = y + "px";
            }
        });

        // Stop dragging on mouseup
        document.addEventListener("mouseup", () => {
            isDragging = false;
            divvinduemove.style.cursor = "grab";
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
