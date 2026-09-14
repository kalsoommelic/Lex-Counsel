<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'Lex Counsel') ?></title>

    <meta name="description"
          content="<?= esc($description ?? 'Lex Counsel - Justice. Integrity. Excellence.') ?>">

    <meta name="keywords"
          content="lawyer, law firm, legal services, legal consultation, attorney">

    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <?= $this->renderSection('styles') ?>
</head>

<body>

<header class="site-header">

    <div class="container navbar">

        <!-- Logo -->
        <a href="<?= base_url('/') ?>" class="logo">
            <span class="logo-main">Lex</span>
            <span class="logo-sub">Counsel</span>
        </a>

        <!-- Mobile Menu Button -->
        <button class="menu-toggle" id="menuToggle" aria-label="Open Menu">
            ☰
        </button>

        <!-- Navigation -->
        <nav class="main-nav" id="mainNav">

            <a href="<?= base_url('/') ?>">Home</a>

            <a href="<?= base_url('about') ?>">About</a>

            <a href="<?= base_url('practice-areas') ?>">
                Practice Areas
            </a>

            <a href="<?= base_url('attorneys') ?>">
                Attorneys
            </a>

            <a href="<?= base_url('blog') ?>">
                Insights
            </a>

            <a href="<?= base_url('contact') ?>">
                Contact
            </a>

            <a href="<?= base_url('consultation') ?>"
               class="nav-button">
                Book Consultation
            </a>

        </nav>

    </div>

</header>

<main>