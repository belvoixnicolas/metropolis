<!DOCTYPE HTML>
  <html lang="fr">
    <head>
      <title>Metropolis</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="ISO-8859-1" />
      <meta name="theme-color" content="black">
      <link rel="icon" type="image/x-icon" href="favicon.ico">
      <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="resource/img/favicon.ico" /><![endif]-->
      <link rel="stylesheet" type="text/css" href="css/reset.css" />
      <link rel="stylesheet" type="text/css" href="css/film.css" />
      <link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
      <form class="filtres" action="#" method="get">
        <fieldset class="champrecherche">
          <input type="search" name="recherch" placeholder="Recherche">
        </fieldset>

        <fieldset class="filtre">
          <select class="genre" name="genre">
            <option value="none">Genre</option>
          </select>

          <select class="date" name="date">
            <option value="none">Date</option>
          </select>

          <select class="realisateur" name="realisateur">
            <option value="none">Réalisateur</option>
          </select>

          <select class="acteur" name="acteur">
            <option value="none">Acteur</option>
          </select>
        </fieldset>
      </form>

      <main>
        <video poster="posterimage.jpg" controls preload="auto">
          <source src="video/film.mp4" type="video/mp4" />
        </video>

        <div class="info">
          <h1 class="titre">Titre</h1>
          <p class="genre">Genre</p>
          <button type="button" name="favorie"><img src="img/icon/favorie.png" alt="Bouton favorie" /></button>
          <p class="vue">0</p>
        </div>

        <section>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          <div class="realisateur">
            <h2>Réalisateur :</h2>
            <ul>
              <li>Réalisateur</li>
            </ul>
          </div>

          <div class="acteur">
            <h2>Acteur :</h2>

            <ul>
              <li>Acteur</li>
            </ul>
          </div>
        </section>
      </main>

      <footer>
        <p>&copy; Metropolis | <a href="legal">Mentions légals</a> | Belvoix Nicolas</p>
        <ul>
          <li><a href="http://www.facebook.com/pages/Cin%C3%A9ma-Metropolis-Officiel/149078338485021" target="_blank"><img src="img/facebook.png" alt="Facebook" /></a></li>
          <li><a href="http://www.cinemet.fr/rss/" target="_blank"><img src="img/rss.png" alt="RSS" /></a></li>
        </ul>
      </footer>
      <nav>
        <h2>Menu</h2>
        <ul>
          <li><a href="profil.php">Mon profil</a></li>
          <li><a href="profil.php#favorie">Favorie</a></li>
          <li><a href="Contact.php">Nous contacter</a></li>
          <li><a href="index.php">Déconnexion</a></li>
        </ul>
      </nav>
    </body>
  </html>
