<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../ressource/css/style.css" />
    <title>UNESCO - Lieux visités</title>
</head>

<body>
    <!-- Barre de navigation -->
    <nav>
        <form class="formulaire" method="get" action="src/php/database.php">
            <input type="text" id="mail" name="mail" placeholder="Adresse-mail" />
            <input type="password" id="password" name="password" placeholder="Mot de passe" />
            <input type="submit" name="submit" id="submit" value=">" />
        </form>
        <div class="liens">
            <ul>
                <li><a href="../../index.php">PATRIMOINE</a></li>
                <li><a id="active" href="src/html/lieuVisite.php">LIEUX VISITÉS</a></li>
                <li><a href="contact.php">NOUS CONTACTER</a></li>
            </ul>
        </div>
        <img id="logo" src="../../ressource/images/logoUNESCO.png" alt="" />
    </nav>

    <!-- Contenu de tous les lieux disponibles -->
    <main>
        <h1>Bienvenue X - Voici vos lieux visités</h1>
        <div class="lieux">

            <?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=db_unesco;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM t_site_unesco ORDER BY states_name");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $groupedCountries = [];

    foreach ($result as $country) {
        $statesName = $country['states_name'];

        // Créer un tableau pour chaque pays s'il n'existe pas encore
        if (!isset($groupedCountries[$statesName])) {
            $groupedCountries[$statesName] = [];
        }

        // Ajouter le lieu actuel au tableau du pays
        $groupedCountries[$statesName][] = $country;
    }

    foreach ($groupedCountries as $statesName => $countryPlaces) {
        ?>
            <div class="lieux-box">
                <h2><?php echo $statesName; ?></h2>

                <?php foreach ($countryPlaces as $countryPlace) { ?>
                <div class="lieu">
                    <p><?php echo $countryPlace['name']; ?></p>
                    <!-- Ajoutez d'autres informations que vous souhaitez afficher -->
                </div>
                <?php } ?>
            </div>
            <?php
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>


    </main>
</body>

</html>