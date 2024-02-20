<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../ressource/css/style.css" />
    <title>UNESCO - Contact</title>
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
          <input
            type="text"
            id="fname"
            name="firstname"
            placeholder="Votre prénom.."
          />

          <label for="lname">Adresse email</label>
          <input
            type="text"
            id="lname"
            name="lastname"
            placeholder="example@gmail.com"
          />

          <label for="country">Pays</label>
          <select id="country" name="country">
            <option value="suisse">Suisse</option>
            <option value="lichtenstein">Lichtenstein</option>
            <option value="albanie">Albanie</option>
            <option value="kosovo">Kosovo</option>
            <option value="algerie">Algérie</option>
            <option value="serbie">Serbie</option>
            <option value="france">France</option>
            <option value="italia">Italie</option>
          </select>

          <label for="sujet">Sujet</label>
          <textarea
            id="sujet"
            name="sujet"
            placeholder="Écrivez quelque chose.."
            style="height: 200px"
          ></textarea>

          <input type="submit" value="Soumettre" />
        </form>
      </div>
    </main>
  </body>
</html>
