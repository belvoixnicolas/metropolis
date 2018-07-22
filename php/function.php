<?php
  function titre($id_film, $dbh)  {
    $sql = 'SELECT titre FROM film WHERE ID = ' .$id_film;
    $titre = '';
    foreach ($dbh->query($sql) as $row) {
        $titre = $row[0];
    }
    if ($titre == '') {
      $titre = 'titre';
    }

    return $titre;
  }

  function genre($id_film, $dbh) {
    $genre = '';
    $sql = 'SELECT * FROM appartenir WHERE ID = ' . $id_film;
    foreach ($dbh->query($sql) as $row) {
      $sql = 'SELECT genre FROM genre WHERE ID =' . $row[1];

      foreach ($dbh->query($sql) as $row) {
        $genre = $genre . '<li>' . $row[0] . '</li>';
      }
    }
    if ($genre == '') {
      $genre = 'Erreur';
    }

    return $genre;
  }

  function vue($id_film, $dbh) {
    $vue = '';
    $sql = 'SELECT vue FROM film WHERE ID = ' . $id_film;
    foreach ($dbh->query($sql) as $row) {
      $vue = $row[0];
    }
    if ($vue == '') {
      $vue = 'Erreur';
    }

    return $vue;
  }

  function video($id_film, $dbh) {
    $video = '';
    $sql = 'SELECT video FROM film WHERE ID = ' . $id_film;
    foreach ($dbh->query($sql) as $row) {
      $video = $row[0];
    }
    if ($video == '') {
      $video = 'Erreur';
    }

    return $video;
  }

  function description($id_film, $dbh) {
    $description = '';
    $sql = 'SELECT description FROM film WHERE ID = ' . $id_film;
    foreach ($dbh->query($sql) as $row) {
      $description = $row[0];
    }
    if ($description == '') {
      $description = 'Erreur';
    }

    return $description;
  }

  function realisateur($id_film, $dbh) {
    $realisateur = '';
    $sql = 'SELECT * FROM fait WHERE ID = ' . $id_film;
    foreach ($dbh->query($sql) as $row) {
      $sql = 'SELECT * FROM realisateur WHERE ID =' . $row[1];

      foreach ($dbh->query($sql) as $row) {
        $realisateur = $realisateur . '<li>' . $row[2] . ' ' . $row[1] . '</li>';
      }
    }
    if ($realisateur == '') {
      $realisateur = 'Erreur';
    }

    return $realisateur;
  }

  function acteur($id_film, $dbh) {
    $acteur = '';
    $sql = 'SELECT * FROM joue WHERE ID = ' . $id_film;
    foreach ($dbh->query($sql) as $row) {
      $sql = 'SELECT * FROM acteur WHERE ID =' . $row[1];

      foreach ($dbh->query($sql) as $row) {
        $acteur = $acteur . '<li>' . $row[2] . ' ' . $row[1] . '</li>';
      }
    }
    if ($acteur == '') {
      $acteur = 'Erreur';
    }

    return $acteur;
  }

  function background($id_film, $dbh) {
    $background = '';
    $sql = 'SELECT background FROM film WHERE ID = ' . $id_film;
    foreach ($dbh->query($sql) as $row) {
      $background = $row[0];
    }
    if ($background == '') {
      $background = 'defau.jpg';
    }

    return $background;
  }

  function ajout_date($date,$dbh) {
    $req_date = $dbh->prepare('INSERT INTO date(ID,annee) VALUES(:annee,:annee)');

    $vue = 0;
    foreach ($dbh->query('SELECT * FROM date') as $row) {
      if ($row[0] == $date) {
        $vue++;
      }
    }

    if ($vue == 0) {
      $req_date->execute(array('annee' => $date ));
    }

    $sql = 'SELECT annee FROM date WHERE ID = ' . $date;
    foreach ($dbh->query($sql) as $row) {
      if ($row[0] == $date) {
        return TRUE;
      }else {
        $sql = 'DELETE FROM date WHERE date.ID =' . $date;
        $dbh->query($sql);
        return FALSE;
      }
    }
  }

  function ajout_acteur($nom, $prenom, $dbh)  {
      $nom = strtolower($nom);
      $prenom = strtolower($prenom);

      $req_acteur = $dbh->prepare('INSERT INTO acteur(nom,prenom) VALUES(:nom,:prenom)');

      $vue = 0;
      foreach ($dbh->query('SELECT * FROM acteur') as $row) {
        if ($row[1] == $nom && $row[2] == $prenom) {
          $vue++;
        }
      }

      if ($vue == 0) {
        $req_acteur->execute(array('nom' => $nom, 'prenom' => $prenom));
      }else {
        return TRUE;
      }

      $vue == 0;
      foreach ($dbh->query('SELECT nom , prenom FROM acteur') as $row) {
        if ($row[0] == $nom && $row[1] == $prenom) {
          $vue++;
        }
      }

      if ($vue > 0) {
        return TRUE;
      }else {
        return FALSE;
      }
  }

  function ajout_realisateur($nom, $prenom, $dbh)  {
    $nom = strtolower($nom);
    $prenom = strtolower($prenom);

    $req_realisateur = $dbh->prepare('INSERT INTO realisateur(nom,prenom) VALUES(:nom,:prenom)');

    $vue = 0;
    foreach ($dbh->query('SELECT * FROM realisateur') as $row) {
      if ($row[1] == $nom && $row[2] == $prenom) {
        $vue++;
      }
    }

    if ($vue == 0) {
      $req_realisateur->execute(array('nom' => $nom, 'prenom' => $prenom));
    }else {
      return TRUE;
    }

    $vue == 0;
    foreach ($dbh->query('SELECT nom , prenom FROM realisateur') as $row) {
      if ($row[0] == $nom && $row[1] == $prenom) {
        $vue++;
      }
    }

    if ($vue > 0) {
      return TRUE;
    }else {
      return FALSE;
    }
  }

  function ajout_genre($genre, $dbh)  {
    $genre = strtolower($genre);

    $req_genre = $dbh->prepare('INSERT INTO genre(genre) VALUES(:genre)');

    $vue = 0;
    foreach ($dbh->query('SELECT genre FROM genre') as $row) {
      if ($row[0] == $genre) {
        $vue++;
      }
    }

    if ($vue == 0) {
      $req_genre->execute(array('genre' => $genre));
    }else {
      return TRUE;
    }

    $vue == 0;
    foreach ($dbh->query('SELECT * FROM genre') as $row) {
      if ($row[1] == $genre) {
        $vue++;
      }
    }

    if ($vue > 0) {
      return TRUE;
    }else {
      return FALSE;
    }
  }

  function ajout_affiche($id,$fichier,$dbh)  {
    $sql = 'SELECT affiche FROM film WHERE ID = ' .$id;
    foreach ($dbh->query($sql) as $row) {
      $nom = $row[0];
    }

    if ($fichier['error'] > 0) {
       echo "Erreur lors du transfert";
    }else {
      $extensions = array('jpg' , 'jpeg' , 'gif');
      $extansions_fichier = strtolower(substr(strrchr($fichier['name'] , '.') , 1));

      if ( in_array($extansions_fichier,$extensions) ) {
        $nom = "img/affiche/{$nom}.{$extansions_fichier}";
        $resultat = move_uploaded_file($fichier['tmp_name'],$nom);
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

  function ajout_background($id,$fichier,$dbh)  {
    $sql = 'SELECT background FROM film WHERE ID = ' .$id;
    foreach ($dbh->query($sql) as $row) {
      $nom = $row[0];
    }

    if ($fichier['error'] > 0) {
       echo "Erreur lors du transfert";
    }else {
      $extensions = array('jpg' , 'jpeg' , 'gif');
      $extansions_fichier = strtolower(substr(strrchr($fichier['name'] , '.') , 1));

      if ( in_array($extansions_fichier,$extensions) ) {
        $nom = "img/background/{$nom}.{$extansions_fichier}";
        $resultat = move_uploaded_file($fichier['tmp_name'],$nom);
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

  function ajout_video($id,$fichier,$dbh)  {
    echo ini_get('upload_max_filesize').'<br/>';
    ini_set("upload_max_filesize","300M");
    echo ini_get("upload_max_filesize");

    $sql = 'SELECT video FROM film WHERE ID = ' .$id;
    foreach ($dbh->query($sql) as $row) {
      $nom = $row[0];
    }

    if (! empty($fichier)) {
        echo '<pre>'.print_r($fichier,true).'</pre>';
        $file_name = $nom;
        $file_extension = strrchr($file_name, ".");

        $file_tmp_name = $fichier['tmp_name'];
        $filedest = 'video/' . $file_name;

        $extension_autorisees = array(
            0 =>'.mp4',
            1 => '.MP4'
        );

        echo '<pre>'.print_r($file_extension,true).'</pre>';
        echo '<pre>'.print_r($extension_autorisees,true).'</pre>';
        if (in_array(
            $file_extension,
            $extension_autorisees
        )) {
            echo $file_tmp_name.'<br>';
            echo $filedest;
        } else {
            echo 'Uniquement .mp4, .MP4';
        }
    }
  }
?>
