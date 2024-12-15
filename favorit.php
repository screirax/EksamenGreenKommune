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
    <h5 class="category-header">Opskrifter</h5>
    <div class="container">
        <!-- Toggle buttons -->

        <div class="toggle-buttons">
            <a href="opskrifter.php"> <button class="btn btn-outline-primary " style="border-radius: 50px 0px 00px 50px">Opskrifter</button></a>

            <a href="favorit.php"> <button class="btn btn-outline-primary active" style="border-radius: 00px 50px 50px 00px">Favoritter</button></a>
        </div>
    </div>

    <div class="container mt-5">

        <div class="custom-card mt-1">
            <div class="favorite-star not-favorite"  style="color: #F32D2E">
                ★
            </div>

            <!-- Billede -->
            <img src="pictures/chiliconcarne.png" alt="Chili-con Carne">

            <!-- Tekstindhold -->
            <div class="custom-card-content">
                <h5 class="mb-0">Chili-con Carne med Ris</h5>
            </div>

            <!-- Knap -->
            <div class="custom-card-button">
                <a href="opskrift.php"> <button class="btn btn-primary">Se</button></a>
            </div>
        </div>
        <div class="custom-card mt-1">
            <div class="favorite-star not-favorite" style="color: #F32D2E">
                ★
            </div>
            <!-- Billede -->
            <img src="pictures/spaghettimedrejer.png" alt="Spaghetti med rejer">

            <!-- Tekstindhold -->
            <div class="custom-card-content">
                <h5 class="mb-0">Spaghetti med Rejer </h5>
            </div>

            <!-- Knap -->
            <div class="custom-card-button">
                <a href="opskrift.php"> <button class="btn btn-primary">Se</button></a>
            </div>
        </div>

    </div>


    <!-- Footer menu -->
    <footer class="footer-menu">
        <div class="container d-flex justify-content-around">
            <a href="opskrifter.php" class="nav-link active">
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
<script>
    // Find stjernen
    document.querySelectorAll('.favorite-star').forEach(star => {
        star.addEventListener('click', function () {
            // Toggle "not-favorite"-klassen
            this.classList.toggle('not-favorite');

            // Tilføj en kort "klik"-animation
            this.classList.add('clicked');
            setTimeout(() => this.classList.remove('clicked'), 200);

            // Log status (valgfrit)
            if (this.classList.contains('not-favorite')) {
                console.log('Fjernet fra favoritter');
            } else {
                console.log('Tilføjet til favoritter');
            }
        });
    });
</script>
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