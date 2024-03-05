<!DOCTYPE html>
<html lang="fr">
<?php $lang="fr"?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../ressource/css/style.css" />
    <title>UNESCO - Contact</title>
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
                <li><a  href="../../index.php">
                 <?php
                 if ("$lang" == "fr") {
                     echo "CARTE DES PATRIMOINES";
                 }
                 if ("$lang" == "en") {
                    echo "HERITAGE MAP";
                 }
                ?>
             </a></li>
                <li><a href="lieuVisite.php">
                <?php
                 if ("$lang" == "fr") {
                     echo "LIEUX DE L'UNESCO";
                 }
                 if ("$lang" == "en") {
                    echo "UNESCO PLACES";
                 }
                ?>
                </a></li>
                <li><a id="active">
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


    <main>
        <h1>Page de contact - Service informatique</h1>

        <div class="container">
            <form action="/action_page.php">
                <label for="fname">Prénom</label>
                <input type="text" id="fname" name="firstname" placeholder="Votre prénom.." />

                <label for="lname">Adresse email</label>
                <input type="text" id="lname" name="lastname" placeholder="example@gmail.com" />

                <label for="country">Pays</label>
                <select id="country" name="country">

                    <?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=db_unesco;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM t_pays");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $country) {
      ?>
                    <option value="<?php echo $country['name'] ?>">
                        <?php echo $country['name'] ?>
                    </option>
                    <?php
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>



                </select>

                <label for="sujet">Sujet</label>
                <textarea id="sujet" name="sujet" placeholder="Écrivez quelque chose.."
                    style="height: 200px"></textarea>

                <input type="submit" value="Soumettre" />
            </form>
        </div>
    </main>
</body>

</html>