<?php
// Inkluderer initialiseringsfilen, som sandsynligvis indeholder databasen eller konfigurationsoplysninger.
// 'require' stopper scriptet, hvis filen mangler, da den er vigtig.
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>FrigePal</title>

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
<div class="container">
    <header class="my-4 text-center">
        <h1>FridgePal</h1>
    </header>

    <!-- Søgefelt og Tilføj knap -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Søg..." aria-label="Søg">
        <button class="btn btn-primary">Tilføj</button>
    </div>

    <!-- Icon Container -->
    <div class="icon-container">
        <img src="pictures/rejer.png">
    </div>
    

    <!-- Input Fields -->
    <div class="input-fields">
        <input type="text" class="form-control mb-3" placeholder="Rejer" aria-label="Navn">
        <input type="text" class="form-control mb-3" placeholder="3" aria-label="Antal">
        <select class="form-select mb-3" aria-label="Vælg køleskab">
            <option selected>Køleskab</option>
            <option value="1">Fryser</option>
            <option value="2">Køleskab</option>
            <option value="3">Pantry</option>
        </select>
    </div>

    <!-- Tilføj Knap -->
    <div class="d-flex justify-content-center">
    <button class="btn add-button me-1" style="background-color:#F32D2E ">Slet</button>
        <a href="index.php"> <button class="btn add-button">Tilføj</button></a>
    </div>
</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


<?php
// Inkluderer script-filer til bunden af HTML-dokumentet
include 'settings/buttomscripts.php';

?>

</body>
</html>
