<?php
/**
 * head.php — HTML <head> component
 * Usage: <?php include 'components/layout/head.php'; ?>
 * Variables:
 *   $pageTitle       string  (required)
 *   $pageDescription string  (optional)
 *   $pageKeywords    string  (optional)
 *   $ogImage         string  (optional)
 */
$siteTitle       = 'BeatWave';
$pageTitle       = isset($pageTitle)       ? $pageTitle       : 'BeatWave — Stream & Discover Music';
$pageDescription = isset($pageDescription) ? $pageDescription : 'Discover, stream, and download your favorite music on BeatWave. Explore trending songs, top artists, and new album releases.';
$pageKeywords    = isset($pageKeywords)    ? $pageKeywords    : 'music, stream, download, songs, artists, albums, trending';
$ogImage         = isset($ogImage)         ? $ogImage         : '/assets/images/og-default.jpg';
$baseUrl         = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');
$canonicalUrl    = $baseUrl . ($_SERVER['REQUEST_URI'] ?? '/');
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- SEO -->
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
  <meta name="keywords"    content="<?= htmlspecialchars($pageKeywords) ?>">
  <meta name="author"      content="BeatWave">
  <link rel="canonical"    href="<?= htmlspecialchars($canonicalUrl) ?>">

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:url"         content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:title"       content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
  <meta property="og:image"       content="<?= htmlspecialchars($ogImage) ?>">

  <!-- Twitter Card -->
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:title"       content="<?= htmlspecialchars($pageTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription) ?>">
  <meta name="twitter:image"       content="<?= htmlspecialchars($ogImage) ?>">

  <!-- Theme -->
  <meta name="theme-color" content="#0a0a0f">

  <!-- PWA -->
  <link rel="manifest" href="/manifest.json">
  <link rel="apple-touch-icon" href="/assets/images/logo/icon-192.png">

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/logo/favicon.svg">

  <!-- Fonts (preload) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/variables.css">
  <link rel="stylesheet" href="/assets/css/reset.css">
  <link rel="stylesheet" href="/assets/css/main.css">
  <link rel="stylesheet" href="/assets/css/components.css">
  <link rel="stylesheet" href="/assets/css/pages.css">
  <link rel="stylesheet" href="/assets/css/player.css">
  <link rel="stylesheet" href="/assets/css/responsive.css">
  <?php if (isset($extraCss)): ?>
    <?php foreach ((array)$extraCss as $css): ?>
      <link rel="stylesheet" href="<?= htmlspecialchars($css) ?>">
    <?php endforeach; ?>
  <?php endif; ?>

  <!-- Theme JS — runs first to prevent flash -->
  <script src="/assets/js/theme.js"></script>
</head>
<body>
