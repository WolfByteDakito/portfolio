<?php
// =====================================================================
// Configuration base de données (MySQL)
// =====================================================================
// À MODIFIER selon ton environnement (XAMPP local par défaut)
// =====================================================================

define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio_mottner');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

/**
 * Retourne une instance PDO partagée (singleton simple).
 * Connexion paresseuse : créée au premier appel uniquement.
 */
function db(): ?PDO
{
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
        return $pdo;
    } catch (PDOException $e) {
        // La BDD est optionnelle pour le moment, on ne bloque pas le site
        return null;
    }
}
