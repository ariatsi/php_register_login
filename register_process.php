<?php

require_once __DIR__ . '/includes/users.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$surname = trim($_POST['surname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmation = $_POST['confirm_password'] ?? '';

if ($name === '' || $surname === '' || $email === '' ||
    $password === '' || $confirmation === '') {
    exit('Veuillez remplir tous les champs.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Adresse e-mail invalide.');
}
if ($password !== $confirmation) {
    exit('Les mots de passe ne correspondent pas.');
}

try {
    $users = lireUtilisateurs();
    foreach ($users as $user) {
        if (strcasecmp($user['email'], $email) === 0) {
            exit('Un compte existe déjà avec cet e-mail.');
        }
    }
    $users[] = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'name' => $name,
        'surname' => $surname,
        'role' => 'User'
    ];
    enregistrerUtilisateurs($users);
    echo 'Inscription réussie. <a href="index.php">Se connecter</a>';
} catch (RuntimeException $e) {
    error_log($e->getMessage());
    echo 'Une erreur technique est survenue.';
}
