<?php
function get_available_fonts() {
    return [
        'Arial, sans-serif' => 'Arial',
        "'Times New Roman', serif" => 'Times Roman',
        "'Courier New', monospace" => 'Courier',
        "'Jameel Noori Nastaleeq'" => 'Jameel Noori'
    ];
}

function get_font_css($font) {
    return "body { font-family: $font; }";
}

function get_available_themes() {
    return ['light', 'dark', 'blue'];
}

function get_theme_path($theme) {
    return "assets/css/theme-$theme.css";
}
?>