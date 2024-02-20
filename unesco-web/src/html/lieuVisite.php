<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../ressource/css/style.css" />
    <title>UNESCO - Lieux visités</title>
  </head>
  <body>
    <nav>
      <div class="formulaire">
        <input type="text" id="name" name="name" placeholder="Adresse-mail" />
        <input type="text" id="name" name="name" placeholder="Mot de passe" />
        <a href="#">></a>
      </div>
      <div class="liens">
        <ul>
          <li><a href="../../index.php">PATRIMOINE</a></li>
          <li><a id="active" href="lieuVisite.php">LIEUX VISITÉS</a></li>
          <li><a href="contact.php">NOUS CONTACTER</a></li>
        </ul>
      </div>
      <img id="logo" src="../../ressource/images/logoUNESCO.png" alt="" />
    </nav>

    <main>
      <h1>Bienvenue X - Voici vos lieux visités</h1>
      <div class="lieux">
        <div class="lieux-box">
          <h2>Albanie</h2>
          <ul>
            <li id="culturel">
              Centres historiques de Berat et de Gjirokastra
            </li>
            <li id="naturel">
              Forêts primaires et anciennes de hêtres des Carpates et d’autres
              régions d’Europe *
            </li>
          </ul>
        </div>
        <div class="lieux-box">
          <h2>Bulgarie</h2>
          <ul>
            <li id="culturel">Monastère de Rila</li>
            <li id="naturel">Réserve naturelle de Srébarna</li>
          </ul>
        </div>
        <div class="lieux-box">
          <h2>Serbie</h2>
          <ul>
            <li id="culturel">Monastère de Studenica</li>
            <li id="culturel">Gamzigrad-Romuliana, palais de Galère</li>
          </ul>
        </div>
      </div>
    </main>
  </body>
</html>