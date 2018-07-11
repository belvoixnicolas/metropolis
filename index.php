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
          <a href="liste_film">Visiter</a>
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
              <select name="genre">
                <option value="h">Je suis un homme</option>
                <option value="f">Je suis une femme</option>
              </select>

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
          <button type="button" name="description" onclick="truc()">Description</button>
          <button type="button" name="contact">Contact</button>

          <p class="description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>

          <p class="contact">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
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
      setInterval(function(){
        if (window.pageYOffset > 0) {
          document.querySelector('header').className = 'anim';
          document.querySelector('footer').className = 'static';
        }else {
          document.querySelector('header').className = '';
          document.querySelector('footer').className = '';
        }
      }, 5);

      var binaire = 0;
      </script>
    </body>
  </html>
