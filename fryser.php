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
    <div class="input-group mb-3 d-flex justify-content-between align-items-center">
        <!-- Søgefelt -->
        <div class="col-8">
            <input type="text" class="form-control" placeholder="Søg..." aria-label="Søg">
        </div>

        <!-- Tilføj knap -->
        <div class="col-auto">
            <a href="addnew.php"> <button class="btn btn-custom">Tilføj</button> </a>
        </div>
    </div>

    <!-- Gæster -->
    <h5 class="category-header">Grøntsager</h5>

    <div class="item-card" id="box">
        <div class="col ms-2 mt-1">
            <img src="pictures/celeri.png" alt="Celeri" class="item-icon">
        </div>
        <div class="col-6">
            <p>Celeri</p>
            <p class="mb-2">Antal: 3</p>

        </div>
        <div class="col">
            <a href="rediger.php"> <button class="btn btn-custom mt-1">Rediger</button></a>
        </div>
    </div>

    <div class="item-card warning" id="box">
        <div class="col ms-2 mt-1">
            <img src="pictures/carrot.png" alt="Carrot" class="item-icon">
        </div>
        <div class="col-6">
            <p>Gulerødder</p>
            <p class="mb-2">Antal: 7</p>

        </div>
        <a href="rediger.php"><div class="col">
                <button class="btn btn-custom mt-1">Rediger</button>
            </div></a>
    </div>

    <div class="item-card" id="box">
        <div class="col ms-2 mt-1">
            <img src="pictures/pepper.png" alt="Carrot" class="item-icon">
        </div>
        <div class="col-6">
            <p>Peberfrugt</p>
            <p class="mb-2">Antal: 3</p>

        </div>
        <div class="col">
            <a href="rediger.php"> <button class="btn btn-custom mt-1">Rediger</button></a>
        </div>
    </div>



    <!-- Kolde varer -->
    <h5 class="category-header">Kød</h5>
    <div class="item-card" id="box">
        <div class="col ms-2 mt-1">
            <img src="pictures/sasauge.png" alt="Pølser" class="item-icon">
        </div>
        <div class="col-6">
            <p>Pølser</p>
            <p class="mb-2">Antal: 5</p>

        </div>
        <div class="col">
            <a href="rediger.php"> <button class="btn btn-custom mt-1">Rediger</button></a>
        </div>
    </div>
    <div class="item-card" id="box">
        <div class="col ms-2 mt-1">
            <img src="pictures/beef.png" alt="Steak" class="item-icon">
        </div>
        <div class="col-6">
            <p>Bøffer</p>
            <p class="mb-2">Antal: 4</p>

        </div>
        <div class="col">
            <a href="rediger.php"> <button class="btn btn-custom mt-1">Rediger</button></a>
        </div>
    </div>

    <!-- Navigation -->
    <div class="container">
        <!-- Toggle buttons -->

        <div class="toggle-buttons">
            <a href="fryser.php"> <button class="btn btn-outline-primary active" style="border-radius: 50px 0px 00px 50px">Fryser</button></a>
            <a href="index.php"> <button class="btn btn-outline-primary " style="border-radius: 00px 0px 00px 00px">Køleskab</button></a>
            <a href="pantry.php"> <button class="btn btn-outline-primary" style="border-radius: 00px 50px 50px 00px">Pantry</button></a>
        </div>
    </div>

    <!-- Footer menu -->
    <footer class="footer-menu">
        <div class="container d-flex justify-content-around">
            <a href="opskrifter.php" class="nav-link">
                <i class="bi bi-book"></i>
                Opsrifter
            </a>
            <a href="index.php" class="nav-link active">
                <i class="bi bi-box"></i>
                Køleskab
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-person"></i>
                Profil
            </a>
        </div>
    </footer>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


<?php
// Inkluderer script-filer til bunden af HTML-dokumentet
include 'settings/buttomscripts.php';

?>

</body>
</html>
<!--
?php
$items = [
    'Grøntsager' => [
        ['name' => 'Øko-Gulerødder', 'count' => 5, 'icon' => 'carrot-icon.png'],
        ['name' => 'Tomater', 'count' => 10, 'icon' => 'tomato-icon.png'],
    ],
    'Kød' => [
        ['name' => 'Rejer', 'count' => 5, 'icon' => 'fish-icon.png', 'class' => 'warning'],
        ['name' => 'Angus Steak', 'count' => 2, 'icon' => 'beef-icon.png', 'class' => 'danger'],
    ],
];
?>

 Indhold
<div class="container">
    ?php foreach ($items as $category => $products): ?>
        <h5 class="category-header">?= $category ?></h5>
        ?php foreach ($products as $product): ?>
            <div class="item-card ?= $product['class'] ?? '' ?>">
                <div>
                    <img src="?= $product['icon'] ?>" alt="?= $product['name'] ?>" class="item-icon">
                    ?= $product['name'] ?>
                </div>
                <span>Antal: ?= $product['count'] ?></span>
                <button class="btn btn-edit">Rediger</button>
            </div>
        ?php endforeach; ?>
    ?php endforeach; ?>
</div>-->