<?php
require_once 'includes/config.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require_once 'templates/dashboard.php';