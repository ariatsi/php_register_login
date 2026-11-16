<?php
session_start(); // Démarrer la session

require_once __DIR__ . '/includes/users.php';
try {
    $users = lireUtilisateurs();
} catch (RuntimeException $e) {
    error_log($e->getMessage());
    exit('Service de connexion indisponible.');
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['role'] = $user['role'];

            // Rediriger vers la page d'accueil après connexion réussie
            header("Location: welcome.php");
            exit;
        }
    }
    // Si les informations ne correspondent pas
    echo "Email ou mot de passe incorrect.";
}
