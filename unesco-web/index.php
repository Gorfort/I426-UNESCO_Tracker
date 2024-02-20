<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="ressource/css/style.css" />
    <script src="https://cesium.com/downloads/cesiumjs/releases/1.91/Build/Cesium/Cesium.js"></script>
    <style>
      #cesiumContainer {
        height: 100vh;
        margin: 0;
        overflow: hidden;
      }
    </style>
    <title>UNESCO - Accueil</title>
  </head>
  <body>
    <nav>
      <form class="formulaire" method="get" action="./src/php/database.php">
        <input type="text" id="mail" name="mail" placeholder="Adresse-mail" />
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Mot de passe"
        />
        <input type="submit" name="submit" id="submit" value=">">
      </form>
      <div class="liens">
        <ul>
          <li><a href="" id="active">PATRIMOINE</a></li>
          <li><a href="src/html/lieuVisite.php">LIEUX VISITÉS</a></li>
          <li><a href="src/html/contact.php">NOUS CONTACTER</a></li>
        </ul>
      </div>
      <img id="logo" src="ressource/images/logoUNESCO.png" alt="" />
    </nav>

    <div id="cesiumContainer"></div>
    <p class="searchtext">Effectuez votre recherche !</p>
    <script>
      // Grant CesiumJS access to your ion assets
      Cesium.Ion.defaultAccessToken =
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI5OWI1YWQxMC0wMWNiLTQ5ZWUtOWFjMC0zN2I2ZGQyNGNkYTYiLCJpZCI6MTkyODU2LCJpYXQiOjE3MDY2MTYwMjR9.HiUeEcEKCKiGbh3ltdTA0c9hVS9dMuulLkCK78aB3YI";

      // Créer une instance de Cesium.Viewer sans géocodeur

      const viewer = new Cesium.Viewer("cesiumContainer", {
        animation: false,
        baseLayerPicker: false,
        fullscreenButton: false,
        homeButton: false,
        infoBox: false,
        sceneModePicker: false,
        selectionIndicator: false,
        timeline: false,
      });
    </script>
  </body>
</html>
