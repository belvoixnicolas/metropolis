<?php
  include 'php/donnerfilm.php';

  $dbh = new PDO('mysql:host=localhost;dbname=metropolis', 'root', '');
  $dbh->exec("SET CHARACTER SET utf8");

  if (isset($_GET['film'])) {
    $film = $_GET['film'];

    $titre = titre($film, $dbh);
    $genre = genre($film, $dbh);
    $vue = vue($film, $dbh);
    $video = video($film, $dbh);
    $description = description($film, $dbh);
    $realisateur = realisateur($film, $dbh);
    $acteur = acteur($film, $dbh);
  }else {
    $titre = 'Titre';
    $genre = 'Erreur';
    $vue = 'Erreur';
    $description = 'Erreur';
    $realisateur = 'Erreur';
    $acteur = 'Erreur';
    $video = '';
    $image = 'defau.jpg';
  }
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
      <link rel="stylesheet" type="text/css" href="css/film.css" />
      <link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
      <!-- FILTRE -->
      <?php include 'include/filtre.php'; ?>
      <!-- FILTRE -->

      <main>
        <div class="video">
          <video id="film" controls preload="auto">
            <source src="video/<?php echo $video; ?>" type="video/mp4" />
          </video>

          <div class="info">
            <h1 class="titre"><?php echo $titre; ?></h1>
            <ul class="genre"><?php echo $genre; ?></ul>
            <a id="play" href="#">play</a>
            <button type="button" name="favorie"><img src="img/icon/favorie.png" alt="Bouton favorie" /></button>
            <p class="vue"><?php echo $vue; ?> vues</p>
          </div>
        </div>

        <section>
          <p class="description"><?php echo $description; ?></p>

          <div class="realisateur">
            <h2>Réalisateur :</h2>
            <ul>
              <?php echo $realisateur; ?>
            </ul>
          </div>

          <div class="acteur">
            <h2>Acteur :</h2>

            <ul>
              <?php echo $acteur; ?>
            </ul>
          </div>
        </section>
      </main>

      <!-- FOOTER -->
      <?php include 'include/footer.php'; ?>
      <!-- FOOTER -->

      <!-- NAV -->
      <?php include 'include/nav.php'; ?>
      <!-- NAV -->

      <script type="text/javascript">
        $('#play').click(function (){
          $('.info').animate({opacity: '0'}, 'slow', function() {$('.info').hide(); $('#film')[0].play();});
        });
      </script>
    </body>
  </html>
