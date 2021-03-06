<?php
  include 'php/connexion_dbh.php';
  include 'php/function.php';

  if (isset($_POST['titre']) && isset($_POST['description']) && isset($_FILES['affiche']) && isset($_FILES['background']) && isset($_POST['video']) && isset($_POST['anner']) && isset($_POST['nom_acteur_0']) && isset($_POST['prenom_acteur_0']) && isset($_POST['nom_realisateur_0']) && isset($_POST['prenom_realisateur_0']) && isset($_POST['genre_0'])) {

    $vue = 0;
    foreach ($dbh->query('SELECT titre FROM film') as $row) {
      if ($_POST['titre'] == $row[0]) {
        $vue++;
      }
    }

    if ($vue == 0) {
      $req_film = $dbh->prepare('INSERT INTO film(titre,vue,description,affiche,video,ID_date,background) VALUES(:titre,0,:descript,:affiche,:video,:date,:background)');
      $req_appartenir = $dbh->prepare('INSERT INTO appartenir(ID,ID_genre) VALUES(:idfilm,:idgenre)');
      $req_fait = $dbh->prepare('INSERT INTO fait(ID,ID_realisateur) VALUES(:idfilm,:idrea)');
      $req_joue = $dbh->prepare('INSERT INTO joue(ID,ID_Acteur) VALUES(:idfilm,:idacteur)');

      ajout_date($_POST['anner'], $dbh);
      //// AJOUT ACTEUR ////
      $i = 0;
      $name = 'nom_acteur_' . $i;
      $nom_acteur = array();
      $prenom_acteur = array();

      while (isset($_POST[$name])) {
        $nom_acteur[] = $_POST[$name];
        $name = 'prenom_acteur_' . $i;
        $prenom_acteur[] = $_POST[$name];
        $i++;
        $name = 'nom_acteur_' . $i;
      }

      $i = 0;
      foreach ($nom_acteur as $nom) {
        ajout_acteur($nom, $prenom_acteur[$i], $dbh);
        $i++;
      }
      //// AJOUT ACTEUR ////

      ////AJOUT GENRE ////
      $i = 0;
      $name = 'genre_' . $i;
      $genre = array();

      while (isset($_POST[$name])) {
        $genre[] = $_POST[$name];
        $i++;
        $name = 'genre_' . $i;
      }

      foreach ($genre as $row) {
        ajout_genre($row, $dbh);

      }
      ////AJOUT GENRE ////

      //// AJOUT REALISATEUR ////
      $i = 0;
      $name = 'nom_realisateur_' . $i;
      $nom_realisateur = array();
      $prenom_realisateur = array();

      while (isset($_POST[$name])) {
        $nom_realisateur[] = $_POST[$name];
        $name = 'prenom_realisateur_' . $i;
        $prenom_realisateur[] = $_POST[$name];
        $i++;
        $name = 'nom_realisateur_' . $i;
      }

      $i = 0;
      foreach ($nom_realisateur as $nom) {
        ajout_realisateur($nom, $prenom_realisateur[$i], $dbh);
        $i++;
      }
      //// AJOUT REALISATEUR ////

      $titre = strtolower($_POST['titre']);
      $description = $_POST['description'];
      $extansions_fichier = strtolower(substr(strrchr($_FILES['affiche']['name'] , '.') , 1));
      $affiche = str_replace(' ','',$titre) . '.' . $extansions_fichier;
      $video = $_POST['video'];
      $extansions_fichier = strtolower(substr(strrchr($_FILES['background']['name'] , '.') , 1));
      $background = 'back_' . str_replace(' ','',$titre) . '.' . $extansions_fichier;
      $date = $_POST['anner'];

      $req_film->execute(array('titre' => $titre, 'descript' => $description, 'affiche' => $affiche, 'video' => $video, 'date' => $date, 'background' => $background ));

      $idfilm = '';
      foreach ($dbh->query('SELECT ID , titre FROM film') as $row) {
        if ($row[1] == $titre) {
          $idfilm = $row[0];
        }
      }

      if ($idfilm != '') {
        ///// APPARTENIR //////
        foreach ($genre as $row) {
          $sql = 'SELECT ID FROM genre WHERE genre = \'' . $row . '\'';
          foreach ($dbh->query($sql) as $row) {
            $idgenre = $row[0];
          }

          $req_appartenir->execute(array('idfilm' => $idfilm, 'idgenre' => $idgenre));
        }
        ///// APPARTENIR //////

        ///// FAIT //////
        $i = 0;
        foreach ($nom_realisateur as $nom) {
          $sql = 'SELECT ID FROM realisateur WHERE nom = \'' . $nom . '\' AND prenom = \'' . $prenom_realisateur[$i] . '\'';
          foreach ($dbh->query($sql) as $row) {
            $idrea = $row[0];
          }

          $req_fait->execute(array('idfilm' => $idfilm, 'idrea' => $idrea));
          $i++;
        }
        ///// FAIT //////

        ///// JOUE /////
        $i = 0;
        foreach ($nom_acteur as $nom) {
          $sql = 'SELECT ID FROM acteur WHERE nom = \'' . $nom . '\' AND prenom = \'' . $prenom_acteur[$i] . '\'';
          foreach ($dbh->query($sql) as $row) {
            $idacteur = $row[0];
          }

          $req_joue->execute(array('idfilm' => $idfilm, 'idacteur' => $idacteur));
          $i++;
        }
        ///// JOUE /////

        ajout_affiche($idfilm, $_FILES['affiche'], $dbh);
        ajout_background($idfilm, $_FILES['background'], $dbh);
      }
    }else {
      echo '<p>Le film existe déja dans la base de donnes</p>';
    }
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
      <link rel="stylesheet" type="text/css" href="css/form_film.css" />
      <link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="titre" placeholder="Titre du film" required>
        <input type="number" name="anner" placeholder="Année" required>

        <fieldset class="acteur">
          <p>
            <input type="text" name="nom_acteur_0" placeholder="Nom acteur" required>
            <input type="text" name="prenom_acteur_0" placeholder="Prénom acteur" required>
          </p>
          <p id="plusacteur">
          </p>
          <p>
            <button type="button" name="acteurplus" onclick="ajoutActeur();">+</button>
            <button type="button" name="acteurmoin" onclick="suprActeur();">-</button>
          </p>
        </fieldset>

        <fieldset class='realisateur'>
          <p>
            <input type="text" name="nom_realisateur_0" placeholder="Nom réalisateur" required>
            <input type="text" name="prenom_realisateur_0" placeholder="Prénom réalisateur" required>
          </p>
          <p id="plusrea">
          </p>
          <p>
            <button type="button" name="reaplus" onclick="ajoutRea();">+</button>
            <button type="button" name="reamoin" onclick="suprRea();">-</button>
          </p>
        </fieldset>

        <fieldset class="genre">
          <p>
            <input type="text" name="genre_0" placeholder="Genre" required>
          </p>
          <p id="plusgenr">
          </p>
          <p>
            <button type="button" name="genrplus" onclick="ajoutGenr();">+</button>
            <button type="button" name="genrmoin" onclick="suprGenr();">-</button>
          </p>
        </fieldset>

        <textarea name="description" rows="8" cols="80" placeholder="description" required></textarea>
        <label class="affiche"><span>Affiche : </span><input type="file" name="affiche" placeholder="Affiche" required></label>
        <label class="background"><span>Background : </span><input type="file" name="background" placeholder="Background" required></label>
        <label class="video"><span>ID youtube : </span><input type="text" name="video" required></label>

        <input type="submit" value="envoyer">
      </form>

      <script type="text/javascript">
        var iActeur = 0;
        var iRea = 0;
        var iGenre = 0;

        function ajoutActeur() {
          iActeur++;
          var acteur = '<p id="acteur' + iActeur + '"><input type="text" name="nom_acteur_' + iActeur + '" placeholder="Nom acteur" required><input type="text" name="prenom_acteur_' + iActeur + '" placeholder="Prénom acteur" required></p>';
          document.querySelector('#plusacteur').innerHTML += acteur;
        }

        function suprActeur() {
          var balise = 'acteur' + iActeur;
          var sup = document.getElementById(balise);
          var element = document.getElementById('plusacteur');
          element.removeChild(sup);
          iActeur--;
        }

        function ajoutRea() {
          iRea++;
          var rea = '<p id="rea' + iRea + '"><input type="text" name="nom_realisateur_' + iRea + '" placeholder="Nom réalisateur" required><input type="text" name="prenom_realisateur_' + iRea + '" placeholder="Prénom réalisateur" required></p>';
          document.querySelector('#plusrea').innerHTML += rea;
        }

        function suprRea() {
          var balise = 'rea' + iRea;
          var sup = document.getElementById(balise);
          var element = document.getElementById('plusrea');
          element.removeChild(sup);
          iRea--;
        }

        function ajoutGenr() {
          iGenre++;
          var genre = '<p id="genr' + iGenre + '"><input type="text" name="genre_' + iGenre + '" placeholder="Genre" required></p>';
          document.querySelector('#plusgenr').innerHTML += genre;
        }

        function suprGenr() {
          var balise = 'genr' + iGenre;
          var sup = document.getElementById(balise);
          var element = document.getElementById('plusgenr');
          element.removeChild(sup);
          iGenre--;
        }
      </script>
    </body>
  </html>
