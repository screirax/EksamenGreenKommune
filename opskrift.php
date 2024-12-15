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


    <div class="container mt-5">
        <div class="recipe-card">
            <!-- Back Button -->
            <div class="back-button">
                <a href="javascript:history.back()">←</a>
            </div>

            <!-- Billede -->
            <img src="pictures/spaghettimedrejer.png" alt="Spaghetti med tigerrejer" class="recipe-image">

            <!-- Titel -->
            <div class="recipe-title">Spaghetti med tigerrejer i cremet tomatflødesovs</div>

            <!-- Ingredienser -->
            <div class="ingredients">
                <h5>Ingredienser</h5>
                <ul>
                    <li>600 g tigerrejer, rå</li>
                    <li>25 g smør</li>
                    <li>200 g cherry tomater, halveret</li>
                    <li>1 løg, finthakket</li>
                    <li>4 fed hvidløg, revet eller presset</li>
                    <li>2 håndfuld frisk spinat</li>
                    <li>1 håndfuld frisk basilikum (5-6 stilke)</li>
                    <li>2 1/2 dl piskefløde</li>
                    <li>1 1/2 dl tør hvidvin</li>
                    <li>80 g parmesan, fintrevet</li>
                    <li>1 tsk mild chilipulver</li>
                    <li>1/2-1 tsk chiliflager</li>
                    <li>Salt og peber</li>
                    <li>Evt. en smule olie</li>
                    <li>500 g pasta</li>
                </ul>
            </div>

            <!-- Sådan gør du -->
            <div class="instructions">
                <h5>Sådan gør du</h5>
                <ol>
                    <li>Rens tigerrejerne for urenheder, tarm og skaller. Skyl dem og tør dem med køkkenrulle.</li>
                    <li>Smelt smørret i en dyb pande og steg tigerrejerne i 1 minut på hver side. Tag dem af panden.</li>
                    <li>På samme pande steges løgene af til de er klare, – tilsæt evt. en smule olie hvis der er behov for det.</li>
                    <li>Tilsæt tomater og hvidløg og steg med i 5 minutter ved middel varme, – det er vigtigt hvidløgene ikke brænder på.</li>
                    <li>Hæld hvidvinen over sammen med chilipulver/paprika, chiliflager og frisk basilikum og lad den koge ind i godt 5 min. ved middel varme.</li>
                    <li>Tilsæt fløden og kog videre i ca. 5 minutter, og vend derefter parmesanen i saucen. Smag til med salt og peber og evt. flere chiliflager.</li>
                    <li>Kog i mellemtiden pastaen som beskrevet på pakken.</li>
                    <li>Inden servering vendes spinaten i saucen, – den skal blot lige falde sammen.</li>
                    <li>Vend også rejerne i saucen så de får en smule varme.</li>
                    <li>Dræn pastaen for væde, gem evt. en smule til at justere konsistensen med.</li>
                    <li>Vend pastaen i saucen, juster evt. konsistensen med en smule pastavand hvis der er behov for det, og server straks med friskkværnet peber på toppen.</li>
                </ol>
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