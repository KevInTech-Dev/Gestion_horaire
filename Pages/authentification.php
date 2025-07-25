<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="ReedBelca">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Inscription | Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="connexion.php" method="POST" autocomplete="off" class="sign-in-form">
              <div class="heading">
                <h2>Bienvenue !</h2>
                <h6>Pas de compte ?</h6>
                <a href="#" class="toggle">Inscrivez-vous</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="email" minlength="4" name="email" class="input-field" autocomplete="off" required>
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" minlength="4" class="input-field" name="password" autocomplete="off" required>
                  <label>Mot de Passe</label>
                </div>

                <input type="submit" value="Se connecter" class="sign-btn" name="valider">

                <p class="text">
                  Mot de passe oublié ?
                  <a href="#">Aide</a> Connexion
                </p>
              </div>
            </form>

            <form action="inscription.php" method="POST" autocomplete="off" class="sign-up-form">
              <div class="heading">
                <h2>Inscription</h2>
                <h6>Déjà un compte ?</h6>
                <a href="#" class="toggle">Connectez-vous</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="text" minlength="4" name="lastname" class="input-field" autocomplete="off" required>
                  <label>Nom</label>
                </div>

                <div class="input-wrap">
                  <input type="text" minlength="4" name="firstname" class="input-field" autocomplete="off" required>
                  <label>Prénoms</label>
                </div>

                <div class="input-wrap">
                  <input type="email" name="email" class="input-field" autocomplete="off" required>
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="tel" name="telephone" class="input-field" autocomplete="off">
                  <label>Téléphone</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="password" minlength="4" class="input-field" autocomplete="off" required>
                  <label>Mot de passe</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="confirmation" minlength="4" class="input-field" autocomplete="off" required>
                  <label>Confirmation</label>
                </div>

                <input type="submit" name="valider" value="S'inscrire" class="sign-btn">

                <p class="text">
                  En s'inscrivant, j'accepte
                  <a href="#">Les conditions d'utilisation</a> et
                  <a href="#">Les termes de confidentialité</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/image1.png" class="image img-1 show" alt="illustration de protection de données">
              <img src="./img/image2.png" class="image img-2" alt="illustration de navigation">
              <img src="./img/image3.png" class="image img-3" alt="illustration de feedback">
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Vos données sont protégées</h2>
                  <h2>La navigation est facile</h2>
                  <h2>Envoyez-nous vos remarques</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
