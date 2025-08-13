<?php
session_start();

// Available languages
$available_langs = ['en', 'ar', 'ur'];

// Set default language to English
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}

// Change language if requested
if (isset($_GET['lang']) && in_array($_GET['lang'], $available_langs)) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Load translations
$lang = include 'languages/' . $_SESSION['lang'] . '.php';

// Set direction based on language
$dir = ($_SESSION['lang'] == 'ar') ? 'rtl' : 'ltr';
?>