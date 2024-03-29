<!DOCTYPE html>
<html lang="fr">
<?php $lang="fr"?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="ressource/css/style.css" />
    <script src="https://cesium.com/downloads/cesiumjs/releases/1.91/Build/Cesium/Cesium.js"></script>
    <title>UNESCO - Accueil</title>
</head>


<body>
    <!-- Barre de navigation -->
    <nav>

        <!-- Formulaire de connexion -->
        <form class="formulaire" method="get" action="src/php/database.php">
            <!-- Adresse email -->
            <input type="text" id="mail" name="mail" placeholder="<?php if ("$lang" == "fr") { echo "Adresse-mail"; } if ("$lang" == "en") { echo "Mail address"; }?>" />

            <!-- Mot de passe -->
            <input type="password" id="password" name="password" placeholder="<?php if ("$lang" == "fr") { echo "Mot de passe"; } if ("$lang" == "en") { echo "Password"; }?>" />

            <!-- Redirection sur le fichier database.php -->
            <input type="submit" name="submit" id="submit" value=">" />
        </form>

        <!-- Liens dans la barre de navigation -->
        <div class="liens">
            <ul>

                <!-- Version française/anglaise -->
                <li><a  id="active">
                 <?php if ("$lang" == "fr") { echo "CARTE DES PATRIMOINES"; } if ("$lang" == "en") { echo "HERITAGE MAP"; } ?>
                </a></li>

                <!-- Version française/anglaise -->
                <li><a href="src/html/lieuVisite.php">
                <?php if ("$lang" == "fr") { echo "LIEUX DE L'UNESCO"; } if ("$lang" == "en") { echo "UNESCO PLACES"; } ?>
                </a></li>

                <!-- Version française/anglaise -->
                <li><a href="src/html/contact.php">
                <?php if ("$lang" == "fr") { echo "NOUS CONTACTER"; } if ("$lang" == "en") { echo "CONTACT US"; } ?></a></li>
            
            </ul>
        </div>

        <a href=""><img id="logo" src="ressource/images/logo_V5.png" alt="" /></a>
    </nav>

    <!-- Barre de recherche de lieux -->
    <p class="searchtext"><?php if ("$lang" == "fr") { echo "Effectuez votre recherche :"; } if ("$lang" == "en") { echo "Do your search :"; } ?></p>

    <div id="cesiumContainer"></div>

    <!-- Informations affichées lors du click sur un poimt -->
    <div class="placeInformations">
        <img id="placeImage" src="" alt="Image du lieu sélectionné">
        <p class="placeCountry"></p>
        <p class="placeDescription"></p>
    </div>

    <!-- Légende pour les couleurs des points -->
    <div class="colors">
        <p><?php if ("$lang" == "fr") { echo "Lieu naturel 🟢"; } if ("$lang" == "en") { echo "Natural place 🟢"; } ?></p>
        <p><?php if ("$lang" == "fr") { echo "Lieu culturel 🟡"; } if ("$lang" == "en") { echo "Cultural place 🟡"; } ?></p>
        <p><?php if ("$lang" == "fr") { echo "Mixte des deux 🟠"; } if ("$lang" == "en") { echo "Mixed of both 🟠"; } ?></p>
    </div>

    <!-- Token d'accès -->
    <script>
    Cesium.Ion.defaultAccessToken =
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI5OWI1YWQxMC0wMWNiLTQ5ZWUtOWFjMC0zN2I2ZGQyNGNkYTYiLCJpZCI6MTkyODU2LCJpYXQiOjE3MDY2MTYwMjR9.HiUeEcEKCKiGbh3ltdTA0c9hVS9dMuulLkCK78aB3YI";

    // Affichage de la carte  
    var viewer = new Cesium.Viewer("cesiumContainer", {
        animation: false,
        baseLayerPicker: false,
        fullscreenButton: false,
        homeButton: false,
        infoBox: false,
        sceneModePicker: false,
        selectionIndicator: false,
        timeline: false,
    });

    // Connexion à la base de données et récupération de la table t_site_unesco
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=db_unesco;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $t_site_unesco = $pdo->query("SELECT * FROM t_site_unesco");
    $result = $t_site_unesco->fetchAll(PDO::FETCH_ASSOC);

    ?>

    // Tableau de points
    var entities = [];

    // Boucle foreach qui affichera tous les points avec leurs informations
    <?php
    foreach ($result as $position) {
    ?>

    // Affichage des informations du lieu cliqué
    var entity = viewer.entities.add({
        position: Cesium.Cartesian3.fromDegrees(
            <?php echo $position['longitutude'] ?>,
            <?php echo $position['latitude'] ?>
        ),
        customData: {
            country: "<?php echo $position['states_name'] ?>",
            placename: "<?php echo $position['name'] ?>",
            description: "<?php echo $position['short_description'] ?>",
            image: "<?php echo $position['image'] ?>",
        },
        point: {
            pixelSize: 10,
            color: <?php
        if ($position['category'] == "Cultural") {
            echo "Cesium.Color.YELLOW";
        } elseif($position['category'] == "Natural") {
            echo "Cesium.Color.LAWNGREEN ";}
            else {
                echo "Cesium.Color.DARKORANGE";
            }
    ?>,
        },
    });

    entities.push(entity); // Ajouter l'entité à la liste
    <?php
    }
    ?>

    // Éléments HTML pour afficher les informations sur le lieu
    var placeInformations = document.querySelector(".placeInformations");
    var placeCountry = document.querySelector(".placeCountry");
    var placeDescription = document.querySelector(".placeDescription");
    var imageElement = document.getElementById('placeImage');

    // Gérer l'événement click pour afficher les données personnalisées
    viewer.screenSpaceEventHandler.setInputAction(function onClick(movement) {
        var pickedObject = viewer.scene.pick(movement.position);

        if (Cesium.defined(pickedObject) && entities.includes(pickedObject.id)) {
            // Récupérer les données personnalisées de l'entité
            var customData = pickedObject.id.customData;

            // Mettre à jour le texte des éléments HTML avec les données personnalisées
            placeCountry.textContent = customData.country + " - " + customData.placename;
            placeDescription.textContent = customData.description;
            imageElement.src = "asd";
            imageElement.src = customData.image;

            // Afficher l'élément HTML
            placeInformations.style.display = "block";

        } else {
            // Aucun objet sélectionné, masquer l'élément HTML
            placeInformations.style.display = "none";
        }
    }, Cesium.ScreenSpaceEventType.LEFT_CLICK);
    </script>

</body>

</html>