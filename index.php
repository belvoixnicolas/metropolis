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
      <link rel="stylesheet" type="text/css" href="css/index.css" />
      <link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
      <nav>
      </nav>
      <header>
        <div id="choix">
          <input type="button" name="ident" value="Se connecter" />
          <a href="liste_film.php">Visiter</a>
        </div>

        <div id="ident">
          <div class="connect">
            <form action="#" method="post">
              <h2>Connexion</h2>
              <input type="email" name="mail_co" placeholder="Mail" required />
              <input type="password" name="psw_co" placeholder="Mot de passe" required  />
              <input type="submit" value="Connexion" />
            </form>
          </div>
          <div class="inscri">
            <form action="#" method="post">
              <h2>Inscription</h2>

              <p class='genre'>
                <label class="h"><input type="radio" name="genre" value="homme" /></label>
                <label class="f"><input type="radio" name="genre" value="femme" /></label>
              </p>

              <input type="text" name="nom" placeholder="Nom" required />
              <input type="text" name="prenom" placeholder="Prénom" required />

              <input type="email" name="mail_ins_1" placeholder="Mail" required />
              <input type="email" name="mail_ins_2" placeholder="Réécriver votre mail" required />

              <input type="password" name="psw_ins_1" placeholder="Mot de passe" required />
              <input type="password" name="psw_ins_2" placeholder="Réécriver votre mot de passe" required />

              <input type="submit" value="Inscri">
            </form>
          </div>
        </div>
      </header>

      <main>
        <section>
          <div class="bouton">
            <button type="button" name="description">Description</button>
            <button type="button" name="contact">Contact</button>
          </div>

          <div class="description">
            <h1>Metropolis</h1>
            <p>
              Le Cinéma METROPOLIS est situé en centre-ville, à 300 mètres de la place Ducale, coeur historique de Charleville-Mézières.<br/>
              L'arrivée de la "voie rapide", elle aussi à 300 mètres du cinéma, permet un accès direct et facile pour ceux qui viennent par la route.
            </p>
            <p>
              Le parking est gratuit tous les jours de 12h00 à 14h00 et après 18h30 jusqu'au lendemain 9h00.
            </p>
            <p>
              Il est gratuit le dimanche toute la journée.
            </p>
            <p>
              La première heure et demie est gratuite le mercredi, le vendredi après-midi et le samedi.
            </p>

            <h2>10 salles pour une capacité de 2.000 fauteuils, de 500 à 100 places</h2>
            <ul>
              <li>Projection numérique</li>
              <li>Son "dolby" digital</li>
              <li>Ecrans "mur à mur"</li>
              <li>Salles et hall d'accueil climatisés</li>
            </ul>

            <h2>Ciné-Café et Confiserie</h2>
            <p>
              Le CINÉ-CAFÉ est à votre disposition pour prendre un verre, vous retrouver ou calmer une petite faim, avant ou après la séance de cinéma.<br/>
              Le comptoir CONFISERIE vous propose boissons, pop-corn, friandises et tout ce qu'il faut pour un bon moment de cinéma.
            </p>

            <h2>Architecture ET Décoration</h2>
            <p>
              Développée sur 5.000 m2, l'architecture du cinéma METROPOLIS associe le verre et l'acier.<br/>
              La décoration du cinéma METROPOLIS repose principalement sur deux grandes toiles tirées du film éponyme de Ftritz LANG (1928). La passerelle du hall ainsi que le traitement du sol rejoignent les décors du film. Volontairement, les systèmes techniques (gaines de ventilation et chemins électriques) ont été laissés apparents.
            </p>

            <h2>Galerie Metropolis</h2>
            <p>
              Pour parfaire le monde des images animées projetées au cinéma METROPOLIS, nous avons voulu donner sa place à la photographie, sans laquelle le cinéma n'aurait jamais existé. Nous vous proposons, tout au long de l'année, des images sur lesquelles vous pourrez jeter un oeil, ou vous attarder. En toute liberté.
            </p>
          </div>

          <div class="contact">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
      <script type="text/javascript" src="js/ident.js"></script>
      <script type="text/javascript" src="js/index_section.js"></script>
      <script type="text/javascript">
      var num = 0;
        setInterval(function(){
          if (window.pageYOffset > 0 && document.querySelector('header').className == '') {
            if (document.querySelector('#choix').style.display == 'none') {
              $('#ident').animate({opacity: '0'}, 'slow', function(){$('#ident').hide()});
              $('#choix').animate({opacity: '0'}, function(){$('#choix').show();});
              $('#choix').animate({opacity: '1'}, 'slow');
              $('#ident').animate({opacity: '1'});
            }
            document.querySelector('header').className = 'anim';
            $('footer').animate({height: '0px'}, 'slow', function() {document.querySelector('footer').className = 'static';});
            $('footer').animate({height: '50px'});
          }else if (window.pageYOffset > 0 && document.querySelector('header').className == 'anim') {
            console.log('je sait compter jusqu\'a ' + num + '.');
            num++;
          }else {
            document.querySelector('header').className = '';
            document.querySelector('footer').className = '';
          }
        }, 5);
      </script>
      <script type="text/javascript" src="js/radio.js"></script>
    </body>
  </html>
