<!DOCTYPE html>
<html lang="fr">

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
            <input type="text" id="mail" name="mail" placeholder="Adresse-mail" />
            <input type="password" id="password" name="password" placeholder="Mot de passe" />
            <input type="submit" name="submit" id="submit" value=">" />
        </form>
        <div class="liens">
            <ul>
                <li><a href="../../index.php">PATRIMOINE</a></li>
                <li><a href="lieuVisite.php">LIEUX VISITÉS</a></li>
                <li><a id="active" href="">NOUS CONTACTER</a></li>
            </ul>
        </div>
        <img id="logo" src="../../ressource/images/logoUNESCO.png" alt="" />
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