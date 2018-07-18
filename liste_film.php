<?php
  function genre($film) {
    $dbh = new PDO('mysql:host=localhost;dbname=metropolis', 'root', '');
    $dbh->exec("SET CHARACTER SET utf8");
    $genres = '';

    foreach($dbh->query('SELECT * from appartenir') as $liste) {
      if ($liste[0] == $film) {
        $idgenre = $liste[1];
        foreach($dbh->query('SELECT * from genre') as $genre) {
          if ($genre[0] == $idgenre) {
          $genres = $genre[1] . '<br/>' . $genres;
          }
        }
      }
    }
    return $genres;

    $dbh = NULL;
  }

  $dbh = new PDO('mysql:host=localhost;dbname=metropolis', 'root', '');
  $dbh->exec("SET CHARACTER SET utf8");
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
      <!-- FILTRE -->
      <?php include 'include/filtre.php'; ?>
      <!-- FILTRE -->

      <main>
        <div>
          <?php foreach($dbh->query('SELECT * from film') as $row) { ?>
            <a href="film.php?film=<?php echo $row['titre'];?>" style="background-image: url(img/affiche/<?php echo $row['affiche']; ?>);">
              <p class="genre"><?php echo genre($row['ID']); ?></p>
              <p class="descript"><?php echo $row['description']; ?></p>
            </a>
          <?php } ?>
      </div>
      </main>
      <!-- FOOTER -->
      <?php include 'include/footer.php' ?>
      <!-- FOOTER -->

      <!-- NAV -->
      <?php include 'include/nav.php' ?>
      <!-- NAV -->
    </body>
  </html>
