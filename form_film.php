<?php
  include 'php/connexion_dbh.php';
  include 'php/function.php';

  function FunctionName($fichier)  {
    foreach ($fichier as $row) {
      if ($row['error'] > 0) {
         echo "Erreur lors du transfert";
      }else {
        $extensions = array('jpg' , 'jpeg' , 'gif');
        $extansions_fichier = strtolower(substr(strrchr($row['name'] , '.') , 1));

        if ( in_array($extansions_fichier,$extensions) ) {
          $nom = "img/affiche/test.{$extansions_fichier}";
          $resultat = move_uploaded_file($row['tmp_name'],$nom);
          if ($resultat) {
            echo "Transfert réussi";
          }else {
            echo 'Transfert échouer';
          }
        }else {
          echo'movaise extansions';
        }
      }
    }
  }

  if (isset($_POST['titre']) || isset($_POST['description']) || isset($_FILES['affiche']) || isset($_FILES['background']) || isset($_FILES['video']) || isset($_POST['anner']) || isset($_POST['nom_acteur']) || isset($_POST['prenom_acteur']) || isset($_POST['nom_realisateur']) || isset($_POST['prenom_realisateur'])) {
    //$fichier = array($_FILES['affiche'] , $_FILES['background']);
    //FunctionName($fichier);

    $vue = 0;
    foreach ($dbh->query('SELECT titre FROM film') as $row) {
      if ($_POST['titre'] == $row[0]) {
        $titre_vue++;
      }
    }

    if ($vue == 0) {
      $req_film = $dbh->prepare('INSERT INTO film(titre,vue,description,affiche,video,ID_date,background) VALUES(:titre,0,:descript,:affiche,:video,:date,:background)');
      $req_date = $dbh->prepare('INSERT INTO date(ID,annee) VALUES(:annee,:annee)');
      $req_acteur = $dbh->prepare('INSERT INTO acteur(nom,prenom) VALUES(:nom,:prenom)');
      $req_appartenir = $dbh->prepare('INSERT INTO appartenir(ID,ID_genre) VALUES(:idfilm,:idgenre)');
      $req_fait = $dbh->prepare('INSERT INTO fait(ID,ID_realisateur) VALUES(:idfilm,:idrea)');
      $req_genre = $dbh->prepare('INSERT INTO genre(genre) VALUES(:genre)');
      $req_joue = $dbh->prepare('INSERT INTO joue(ID,ID_Acteur) VALUES(:idfilm,:idacteur)');
      $req_realisateur = $dbh->prepare('INSERT INTO realisateur(nom,prenom) VALUES(:nom,:prenom)');


    }else {
      $erreur = '<p>Le film existe déja dans la base de donnes</p>';
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
        <input type="text" name="titre" placeholder="Titre du film" >
        <textarea name="description" rows="8" cols="80" placeholder="description" ></textarea>
        <input type="file" name="affiche" placeholder="Affiche" >
        <input type="file" name="background" placeholder="Background" >
        <input type="file" name="video" placeholder="Video" >
        <input type="number" name="anner" placeholder="Année">
        <input type="text" name="nom_acteur" placeholder="Nom acteur" >
        <input type="text" name="prenom_acteur" placeholder="Prénom acteur" >
        <input type="text" name="nom_realisateur" placeholder="Nom réalisateur" >
        <input type="text" name="prenom_realisateur" placeholder="Prénom réalisateur" >
        <input type="submit" value="envoyer">
      </form>
    </body>
  </html>
