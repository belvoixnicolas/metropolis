<?php
  $dbh = new PDO('mysql:host=localhost;dbname=metropolis', 'root', '');
  foreach($dbh->query('SELECT * from film') as $row) {
?>

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
      <link rel="stylesheet" type="text/css" href="css/liste.css" />
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
        <a href="film.php?film=<?php echo $row['titre'];?>" style="background-image: url(img/affiche/defau.jpg);">
          <h2 class="titre"><?php echo $row['titre']; ?></h2>
          <p class="genre">Genre</p>
          <p class="descript"><?php echo $row['description']; ?></p>
        </a>
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
    <?php } ?>
    </body>
  </html>
