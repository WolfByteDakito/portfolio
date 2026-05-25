<?php
// =====================================================================
// Point d'entrée unique du portfolio (Front Controller)
// Toutes les requêtes passent par ici : public/index.php?page=xxx
// =====================================================================

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once APP_PATH . '/core/Controller.php';
require_once APP_PATH . '/core/Router.php';

$page = $_GET['page'] ?? 'accueil';
Router::dispatch($page);
