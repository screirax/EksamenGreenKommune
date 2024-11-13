<?php
// Inkluderer initialiseringsfilen, som sandsynligvis indeholder databasen eller konfigurationsoplysninger.
// 'require' stopper scriptet, hvis filen mangler, da den er vigtig.
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>ILVA</title>

    <!-- SEO- og meta-tags -->
    <meta name="robots" content="All"> <!-- Angiver, at alle søgemaskiner kan indeksere siden -->
    <meta name="author" content="Udgiver"> <!-- Forfatter til hjemmesiden -->
    <meta name="copyright" content="Information om copyright"> <!-- Copyright-info om siden -->

    <!-- Inkluderer eksterne links som CSS og JS fra links.php -->
    <?php include 'settings/links.php'?>

    <!-- Linker til hjemmesidens hoved-CSS-fil -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!-- Gør siden responsiv og tilpasset forskellige skærmstørrelser -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php
// Inkluderer 'headertop.php', som sandsynligvis indeholder en topbar eller header-informationer
include 'settings/headertop.php';
?>

<div class="container-fluid">
    <?php
    // Inkluderer 'header.php', som sandsynligvis indeholder hovednavigationen eller logo-sektionen
    include 'settings/header.php';
    ?>
</div>

<?php
// Inkluderer 'menu.php', der sandsynligvis indeholder navigation eller menupunkter
include 'settings/menu.php';
?>

<!-- Hovedsektion af siden: en container med indhold og layout -->
<div class="container col-12 col-md-12 d-flex flex-column flex-md-row justify-content-between mt-1 bg-body-tertiary gap-3">

    <!-- Sektion med billede -->
    <div class="mt-5 col-12 col-md-6 ">
        <!-- Viser et billede, som skaleres responsivt -->
        <img class="img-fluid" src="pictures/aabning-nr40.webp" alt="Beskrivelse af billede">
    </div>

    <!-- Sektion med tekstindhold -->
    <div class="col-12 col-md-6 mt-5">
        <h1 class="text-left">Prøv vores nye program til at oprette dit nye rum.</h1>
        <p class="text-left mt-1">
            <!-- Eksempeltekst, der beskriver fordelene ved et produkt eller en tjeneste -->
            Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder.
            Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.
            I en kant af landet går der blandt om, at de vil sætte den over forbehold for tiden. Vi flotter med et hold, der vil rundt og se sig om i byen.
            Det gør heller ikke mere. Men hvor vi nu overbringer denne størrelse til det den handler om, så kan der fortælles op til 3 gange. Hvis det er træet til dit bord der får dig op, er det snarere varmen over de andre.
        </p>
        <!-- Knap, der linker til en anden side for at oprette et nyt rum -->
        <a href="rummaal.php">
            <button type="button" class="btn btn-primary btn-lg ps-4 pe-4 pt-2 pb-2" style="background-color: #009950; border: none;">
                Opret Rum
            </button>
        </a>
    </div>
</div>

<?php
// Inkluderer script- og footer-filer til bunden af HTML-dokumentet
include 'settings/buttomscripts.php';
include 'settings/footer.php';
?>

</body>
</html>
