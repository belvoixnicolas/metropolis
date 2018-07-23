<?php
    include 'connexion_dbh.php';
    include 'function.php';

    if (isset($_POST['genre']), isset($_POST['nom']), isset($_POST['prenom']), isset($_POST['mail_ins_1']), isset($_POST['mail_ins_2']), isset($_POST['psw_ins_1']), isset($_POST['psw_ins_2'])) {
        $reqinscript = $dbh->prepare('INSERT INTO utilisateur` (`ID`, `photo`, `sexe`, `nom`, `prenom`, `mail`, `mdp`, `admin`) VALUES (NULL, '', '', '', '', '', '', '')');
        
    }
?>