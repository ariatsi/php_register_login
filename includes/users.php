<?php

function lireUtilisateurs(): array
{
    $fichier = __DIR__ . '/../data/users.json';
    if (!file_exists($fichier)) {
        throw new RuntimeException('Fichier utilisateurs introuvable.');
    }
    $contenu = file_get_contents($fichier);
    if ($contenu === false) {
        throw new RuntimeException('Lecture impossible.');
    }
    $users = json_decode($contenu, true);
    if (!is_array($users)) {
        throw new RuntimeException('Fichier JSON invalide.');
    }
    return $users;
}

function enregistrerUtilisateurs(array $users): void
{
    $fichier = __DIR__ . '/../data/users.json';
    $json = json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    if ($json === false || file_put_contents($fichier, $json, LOCK_EX) === false) {
        throw new RuntimeException('Enregistrement impossible.');
    }
}
