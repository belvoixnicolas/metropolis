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
?>
