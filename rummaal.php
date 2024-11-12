<?php
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sigende titel</title>

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
    ?>
</div>
<?php include 'settings/menu.php';?>
<!--
<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary">

    <div class="col-12 col-md-6 mt-5">
        <h2 class="text-left">Vælg en væg og skriv dine mål</h2>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle mt-4 p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Vælg Væg
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Nord Væg</a></li>
                <li><a class="dropdown-item" href="#">Syd Væg</a></li>
                <li><a class="dropdown-item" href="#">Øst Væg</a></li>
                <li><a class="dropdown-item" href="#">Vest Væg</a></li>
            </ul>
        </div>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Højde</span>
            <input type="text" class="form-control" id="test" placeholder="Centimeter" aria-label="height" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Bredde</span>
            <input type="text" class="form-control" placeholder="Centimeter" aria-label="width" aria-describedby="basic-addon1">
        </div>
    </div>

    <div class="mt-5 col-12 col-md-6">
        <div id="divtest"
                style="height: 100px;
	            width: 100px;
	            border: 2px solid black;">
                Div Test
        </div>
    </div>

</div>


<script>

    const inputField = document.querySelector("#test");

    // Add an event listener for the 'input' event
    inputField.addEventListener("input", () => {
        // Log the value to the console whenever it changes
        console.log(inputField.value);
    });

    const divtest = document.querySelector("test");
    divtest.style.width = inputField;



</script>
-->

<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary">
    <div class="col-12 col-md-4 mt-5">
        <h2 class="text-left">Vælg en væg,<Br> skriv dine mål</h2>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle mt-4 p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Vælg Væg
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Nord Væg</a></li>
                <li><a class="dropdown-item" href="#">Syd Væg</a></li>
                <li><a class="dropdown-item" href="#">Øst Væg</a></li>
                <li><a class="dropdown-item" href="#">Vest Væg</a></li>
            </ul>
        </div>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Højde</span>
            <input type="text" class="form-control" id="height" placeholder="Centimeter" aria-label="height" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Bredde</span>
            <input type="text" class="form-control" id="width" placeholder="Centimeter" aria-label="width" aria-describedby="basic-addon1">
        </div>
        <a href="vindueside.php">
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2 mb-3 ">Næste</button>
        </a>
    </div>

    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divtest" style="height: 100px; width: 100px; border: 2px solid black; background-color: #F0E5DD">
            <p class="text-center mt-3">Din Væg</p>
        </div>
    </div>
</div>

<script>
    // Select the input field and div element
    const heightInput = document.querySelector("#height");
    const widthInput = document.querySelector("#width")
    const divtest = document.querySelector("#divtest");


    // Add an event listener for the 'input' event on the input field
    heightInput.addEventListener("input", () => {
        // Get the value from the input field
        let heightValue = heightInput.value;

        if (heightValue > 850) {
            heightValue = heightValue / 2;
        }

        // Log the value to the console
        console.log(heightValue);

        // Update the width of divtest based on the input value
        divtest.style.height = heightValue + "px";
    });

    // Event listener for width input
    widthInput.addEventListener("input", () => {
        let widthValue = parseFloat(widthInput.value); // Parse to a number

        // Check if widthValue is greater than 850
        if (widthValue > 850) {
            widthValue = widthValue / 2; // Halve the value if over 850
        }
        // Begræns til maksimalt 90% af skærmens bredde (eksempelværdi)
        const maxWidth = window.innerWidth * 0.9;
        if (widthValue > maxWidth) {
            widthValue = maxWidth;
        }
        // Update the width of divtest based on the adjusted input value
        divtest.style.width = widthValue + "px";
    });

    function saveInputDataToStorage() {
        sessionStorage.setItem("height", heightInput.value);
        sessionStorage.setItem("width", widthInput.value);

    }

    heightInput.addEventListener("input", saveInputDataToStorage);
    widthInput.addEventListener("input", saveInputDataToStorage);


</script>



</body>
<?php include 'settings/buttomscripts.php';
include 'settings/footer.php';?>
</html>