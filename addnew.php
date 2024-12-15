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
        .icon-container {
            background-color: #c6f6d5;
            border-radius: 15px;
            height: 120px;
            width: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            cursor: pointer;
        }
        .icon-container:hover {
            background-color: #a4e3b3;
        }
        .image-option {
            border: 2px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        .image-option:hover {
            border-color: #007bff;
        }
        .image-option.selected {
            border-color: #007bff;
            background-color: rgba(0, 123, 255, 0.1);
        }
        .selected-image {
            margin-top: 20px;
            text-align: center;
            display: none; /* Skjuler som standard */
        }
        .selected-image img {
            max-width: 100px;
            border-radius: 8px;
        }
        .add-button {
            margin-top: 20px;
            border-radius: 20px;
            font-size: 18px;
            padding: 10px 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
    </style>


</head>


<body>
<div class="container text-center">
    <!-- Søgefelt -->
    <div class="search-bar mt-1">
        <input type="text" class="form-control form-control-lg" placeholder="Søg..." aria-label="Søg">
    </div>

    <!-- Icon Container -->
    <div class="container text-center">
        <!-- Icon Container -->
        <!-- Icon Container -->
        <div class="icon-container" data-bs-toggle="modal" data-bs-target="#popupModal">
            <i class="bi bi-plus-lg fs-1"></i>
        </div>
        <div>Icon</div>

        <!-- Popup Modal -->
        <div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupModalLabel">Vælg en Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row text-center">
                            <!-- Billeder -->
                            <div class="col-4">
                                <img src="pictures/carrot.png" alt="Gulerødder" class="image-option" data-image="pictures/carrot.png">
                                <p>Gulerødder</p>
                            </div>
                            <div class="col-4">
                                <img src="pictures/rejer.png" alt="Rejer" class="image-option" data-image="pictures/rejer.png">
                                <p>Rejer</p>
                            </div>
                            <div class="col-4">
                                <img src="pictures/bønner.png" alt="Bønner" class="image-option" data-image="pictures/bønner.png" style="width: 100px; height: 100px;">
                                <p>Gulerødder</p>
                            </div>
                            <div class="col-4">
                                <img src="pictures/noodles.png" alt="Bønner" class="image-option" data-image="pictures/noodles.png" style="width: 100px; height: 100px;">
                                <p>Nudler</p>
                            </div>
                            <div class="col-4">
                                <img src="pictures/tuna.jpg" alt="Bønner" class="image-option" data-image="pictures/tune.png" style="width: 100px; height: 100px;">
                                <p>Tun</p>
                            </div>
                            <div class="col-4">
                                <img src="pictures/pepper.png" alt="Bønner" class="image-option" data-image="pictures/pepper.png" style="width: 100px; height: 100px;">
                                <p>Peberfrugt</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal" id="confirmSelection">Bekræft</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Fields -->
        <div class="input-fields">
            <input type="text" class="form-control mb-3" placeholder="Navn" aria-label="Navn">
            <input type="text" class="form-control mb-3" placeholder="Antal" aria-label="Antal">
            <select class="form-select mb-3" aria-label="Vælg køleskab">
                <option selected>Køleskab</option>
                <option value="1">Fryser</option>
                <option value="2">Køleskab</option>
                <option value="3">Pantry</option>
            </select>
        </div>

        <!-- Viser Valgt Billede -->
        <div class="selected-image" id="selectedImageContainer">
            <h5>Valgt Kategori:</h5>
            <img id="selectedImagePreview" src="" alt="">
            <p id="selectedImageText"></p>
        </div>

        <!-- Tilføj Knap -->
        <a href="index.php"> <button class="btn add-button">Tilføj</button></a>
    </div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


<?php
// Inkluderer script-filer til bunden af HTML-dokumentet
include 'settings/buttomscripts.php';

?>
    <script>
        document.querySelectorAll('.image-option').forEach((img) => {
            img.addEventListener('click', function () {
                // Fjern tidligere valg
                document.querySelectorAll('.image-option').forEach((el) => el.classList.remove('selected'));
                // Marker det valgte billede
                this.classList.add('selected');
            });
        });

        document.getElementById('confirmSelection').addEventListener('click', function () {
            const selectedImage = document.querySelector('.image-option.selected');
            const selectedImageContainer = document.getElementById('selectedImageContainer');
            if (selectedImage) {
                const imageSrc = selectedImage.getAttribute('data-image');
                const imageAlt = selectedImage.alt;

                // Opdater billedevisning
                document.getElementById('selectedImagePreview').src = imageSrc;
                document.getElementById('selectedImagePreview').alt = imageAlt;
                document.getElementById('selectedImageText').textContent = imageAlt;

                // Vis billedcontaineren
                selectedImageContainer.style.display = 'block';
            } else {
                // Skjul billedcontaineren, hvis intet er valgt
                selectedImageContainer.style.display = 'none';
            }
        });
    </script>
</body>
</html>
