<?php
    session_start(); // Démarrer la session
?>
<!doctype html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
// Si l'utilisateur est déjà connecté, on affiche un message de bienvenue et un lien de déconnexion
if (isset($_SESSION['name'])) {
    echo "Bonjour, " . htmlspecialchars($_SESSION['name']) . " " .
            htmlspecialchars($_SESSION['surname']) .
            "! <a href='logout.php'>Se déconnecter</a>";
    } else {
// Sinon, on affiche le formulaire de connexion
// (Code HTML du formulaire de connexion ici)
?>
<!--
<form action="register_process.php" method="POST">
    <input name="name" type="text" required placeholder="Prénom">
    <input name="surname" type="text" required placeholder="Nom">
    <input name="email" type="email" required placeholder="E-mail">
    <input name="password" type="password" required placeholder="Mot de passe">
    <input name="confirm_password" type="password" required placeholder="Confirmation">
    <button type="submit">S'inscrire</button>
</form>
<a href="index.php">Déjà inscrit ? Se connecter</a>
-->

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <h3 class="text-center">Inscription</h3>

            <form action="register_process.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    S'inscrire
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="index.php">Déjà inscrit ? Se connecter</a>
            </div>
        </div>
    </div>


<?php
}
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>