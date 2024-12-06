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

    <style>
        .category-header {
            font-weight: bold;
            margin-top: 20px;
        }
        .item-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .item-icon {
            width: 40px;
            height: 40px;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .danger {
            background-color: #f8d7da;
        }
        .warning {
            background-color: #fff3cd;
        }
    </style>
</head>


<body>
<div class="container">
    <header class="my-4 text-center">
        <h1>Mad App</h1>
    </header>

    <!-- Søgefelt og Tilføj knap -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Søg..." aria-label="Søg">
        <button class="btn btn-primary">Tilføj</button>
    </div>

    <!-- Gæster -->
    <h5 class="category-header">Grøntsager</h5>
    <div class="item-card">
        <div>
            <img src="pictures/carrot.png" alt="Carrot" class="item-icon">
            Øko-Gulerødder
        </div>
        <span>Antal: 5</span>
        <button class="btn btn-edit">Rediger</button>
    </div>
    <div class="item-card">
        <div>
            <img src="pictures/Tomato.png" alt="Tomato" class="item-icon">
            Tomater
        </div>
        <span>Antal: 10</span>
        <button class="btn btn-edit">Rediger</button>
    </div>

    <!-- Kolde varer -->
    <h5 class="category-header">Kød</h5>
    <div class="item-card warning">
        <div>
            <img src="pictures/rejer.png" alt="Fish" class="item-icon">
            Rejer
        </div>
        <span>Antal: 5</span>
        <button class="btn btn-edit">Rediger</button>
    </div>
    <div class="item-card danger">
        <div>
            <img src="pictures/beef.png" alt="Beef" class="item-icon">
            Angus Steak
        </div>
        <span>Antal: 2</span>
        <button class="btn btn-edit">Rediger</button>
    </div>

    <!-- Navigation -->
    <nav class="navbar fixed-bottom navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between">
            <a href="#" class="nav-link">
                <i class="bi bi-book"></i> Opskrifter
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-box"></i> Fryser
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-person"></i> Profil
            </a>
        </div>
    </nav>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


<?php
// Inkluderer script-filer til bunden af HTML-dokumentet
include 'settings/buttomscripts.php';

?>

</body>
</html>
