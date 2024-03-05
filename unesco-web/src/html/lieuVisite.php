<!DOCTYPE html>
<html lang="fr">
<?php $lang="fr"?>

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
            <input type="text" id="mail" name="mail" placeholder="<?php
                 if ("$lang" == "fr") {
                     echo "Adresse-mail";
                 }
                 if ("$lang" == "en") {
                    echo "Mail address";
                 }
                ?>" />
            <input type="password" id="password" name="password" placeholder="<?php
                 if ("$lang" == "fr") {
                     echo "Mot de passe";
                 }
                 if ("$lang" == "en") {
                    echo "Password";
                 }
                ?>" />
            <input type="submit" name="submit" id="submit" value=">" />
        </form>
        <div class="liens">
            <ul>
                <li><a href="../../index.php" >
                 <?php
                 if ("$lang" == "fr") {
                     echo "CARTE DES PATRIMOINES";
                 }
                 if ("$lang" == "en") {
                    echo "HERITAGE MAP";
                 }
                ?>
             </a></li>
                <li><a id="active">
                <?php
                 if ("$lang" == "fr") {
                     echo "LIEUX DE L'UNESCO";
                 }
                 if ("$lang" == "en") {
                    echo "UNESCO PLACES";
                 }
                ?>
                </a></li>
                <li><a href="contact.php">
                <?php
                 if ("$lang" == "fr") {
                     echo "NOUS CONTACTER";
                 }
                 if ("$lang" == "en") {
                    echo "CONTACT US";
                 }
                ?></a></li>
            </ul>
        </div>
        <a href="../../index.php"><img id="logo" src="../../ressource/images/logoUNESCO.png" alt="" /></a>

    </nav>

    <!-- Contenu de tous les lieux disponibles -->
    <main>
        <h1>Bienvenue X - Voici vos lieux visités</h1>
        <div class="lieux">
        <input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Recherchez un lieu...">

<script>
function search_animal() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('lieu');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input) ) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="list-item";                 
        }
    }

}
</script>

            <?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=db_unesco;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM t_site_unesco, t_user, t_user_site WHERE fkUser = id_user AND fkSiteUnesco = id_site_unesco ORDER BY states_name");
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
                <h2 class="lieu-title"><?php echo $statesName; ?></h2>

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