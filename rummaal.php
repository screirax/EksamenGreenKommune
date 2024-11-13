<?php
// Inkluderer initialiseringsfilen 'init.php', der sandsynligvis sætter op basale indstillinger eller databaseforbindelse.
// 'require' bruges her for at sikre, at scriptet stopper, hvis filen mangler, da den er kritisk.
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <!-- Titel på siden -->
    <title>Sigende titel</title>

    <!-- Meta tags for SEO og information om sidens ophavsmand -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <!-- Inkluderer CSS- og JS-links fra en ekstern fil -->
    <?php include 'settings/links.php'?>

    <!-- Gør siden responsiv og tilpasset forskellige skærmstørrelser -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php
// Inkluderer en øverste header-sektion (fx topbar eller kontaktinformation) fra 'headertop.php'
include 'settings/headertop.php';
?>

<div class="container-fluid">
    <?php
    // Inkluderer hovedheaderen, som muligvis indeholder logo og navigation
    include 'settings/header.php';
    ?>
</div>

<?php
// Inkluderer en menu eller yderligere navigationsindstillinger fra 'menu.php'
include 'settings/menu.php';
?>

<!--
Herunder er en kommenteret HTML-blok, som muligvis er midlertidigt skjult.
Denne sektion indeholder en dropdown-menu og inputfelter til højde og bredde, samt et test-div med styling.
-->
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
    // Test JavaScript: Logger værdier fra inputfelt til konsollen ved hver ændring
    const inputField = document.querySelector("#test");

    // Event listener for input events
    inputField.addEventListener("input", () => {
        console.log(inputField.value); // Logger inputværdi til konsollen
    });

    // Prøver at ændre 'divtest's bredde baseret på inputfeltets værdi (dog med fejl, da 'test' ikke eksisterer)
    const divtest = document.querySelector("test");
    divtest.style.width = inputField;
</script>
-->

<!-- Indholdet til at angive højde og bredde på en væg -->
<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary">
    <div class="col-12 col-md-4 mt-5">
        <h2 class="text-left">Væg</h2>
        <p>Her under skriver du dine mål højde og bredde<br> for den væg du gerne vil skrive op</p>

        <!-- Inputfelt til højde med et label -->
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Højde</span>
            <input type="text" class="form-control" id="height" placeholder="Centimeter" aria-label="height" aria-describedby="basic-addon1">
        </div>

        <!-- Inputfelt til bredde med et label -->
        <div class="input-group mb-3 w-50 mt-4">
            <span class="input-group-text" id="basic-addon1">Bredde</span>
            <input type="text" class="form-control" id="width" placeholder="Centimeter" aria-label="width" aria-describedby="basic-addon1">
        </div>

        <!-- Knap til at gå til næste side -->
        <a href="vindueside.php">
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2 mb-3" style="background-color: #009950; border: none;">
                Næste
            </button>
        </a>
    </div>

    <!-- Sektion, hvor div'en bliver dynamisk opdateret baseret på højde og bredde input -->
    <div class="mt-5 col-12 col-md-8">
        <div class="mb-3" id="divrum"></div>
    </div>
</div>

<!-- JavaScript til at håndtere session storage og opdatering af div-størrelsen baseret på input -->
<script>
    // Vælger inputfelter og 'divrum' element
    const heightInput = document.querySelector("#height");
    const widthInput = document.querySelector("#width");
    const divtest = document.querySelector("#divrum");

    // Fjerner tidligere lagrede værdier fra sessionStorage
    sessionStorage.removeItem("height");
    sessionStorage.removeItem("width");

    // Event listener til 'heightInput' for at ændre div'ens højde dynamisk
    heightInput.addEventListener("input", () => {
        let heightValue = heightInput.value;

        // Skalerer højde, hvis den er større end 850
        if (heightValue > 850) {
            heightValue = heightValue / 2;
        }

        console.log(heightValue); // Logger den aktuelle højdeværdi
        divtest.style.height = heightValue + "px"; // Ændrer div'ens højde
    });

    // Event listener til 'widthInput' for at ændre div'ens bredde dynamisk
    widthInput.addEventListener("input", () => {
        let widthValue = parseFloat(widthInput.value);

        // Skalerer bredde, hvis den er større end 850
        if (widthValue > 850) {
            widthValue = widthValue / 2;
        }

        divtest.style.width = widthValue + "px"; // Ændrer div'ens bredde
    });

    // Funktion til at gemme inputværdier i sessionStorage
    function saveInputDataToStorage() {
        sessionStorage.setItem("height", heightInput.value);
        sessionStorage.setItem("width", widthInput.value);
    }

    // Lytter på inputændringer og gemmer data til sessionStorage
    heightInput.addEventListener("input", saveInputDataToStorage);
    widthInput.addEventListener("input", saveInputDataToStorage);
</script>

</body>

<?php
// Inkluderer scripts og footer til sidens bundindhold
include 'settings/buttomscripts.php';
include 'settings/footer.php';
?>

</html>
