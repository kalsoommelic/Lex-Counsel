<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= esc($practiceArea['name']) ?> | Lex Counsel
    </title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #1E293B;
            background: #FFFFFF;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #0B1F3A;
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #FFFFFF;
        }

        .logo span {
            color: #C9A227;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-links a {
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #C9A227;
        }

        .nav-links .consultation-btn {
            background: #C9A227;
            color: #0B1F3A;
            padding: 10px 18px;
            border-radius: 5px;
            font-weight: 600;
        }

        .nav-links .consultation-btn:hover {
            background: #FFFFFF;
            color: #0B1F3A;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            background:
                linear-gradient(
                    rgba(11, 31, 58, 0.94),
                    rgba(11, 31, 58, 0.94)
                );

            padding: 85px 7%;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #FFFFFF;
            margin-bottom: 15px;
        }

        .hero p {
            color: #D8DEE8;
            font-size: 16px;
            max-width: 750px;
            margin: auto;
        }

        .breadcrumb {
            margin-top: 18px;
            font-size: 13px;
            color: #C9A227;
        }

        /* =========================
           DETAIL SECTION
        ========================= */

        .detail-section {
            padding: 80px 7%;
            background: #FFFFFF;
        }

        .detail-container {
            max-width: 1100px;
            margin: auto;
        }

        .detail-card {
            background: #F8F9FA;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #E5E7EB;
        }

        /* =========================
           IMAGE
        ========================= */

        .detail-image {
            width: 100%;
            height: 420px;
            overflow: hidden;
            background: #0B1F3A;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .detail-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-placeholder {
            text-align: center;
            color: #FFFFFF;
        }

        .image-placeholder i {
            font-size: 70px;
            color: #C9A227;
            margin-bottom: 15px;
        }

        .image-placeholder h3 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
        }

        /* =========================
           CONTENT
        ========================= */

        .detail-content {
            padding: 45px;
        }

        .service-label {
            display: inline-block;
            background: #0B1F3A;
            color: #C9A227;
            padding: 7px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 18px;
        }

        .icon-box {
            width: 65px;
            height: 65px;
            border-radius: 10px;
            background: #0B1F3A;
            color: #C9A227;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .icon-box span {
            font-size: 30px;
        }

        .detail-content h2 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 36px;
            margin-bottom: 18px;
        }

        .short-description {
            font-size: 18px;
            color: #475569;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .description {
            font-size: 15px;
            color: #475569;
        }

        .description p {
            margin-bottom: 18px;
        }

        /* =========================
           BUTTON
        ========================= */

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-top: 30px;
            background: #0B1F3A;
            color: #FFFFFF;
            padding: 12px 22px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #C9A227;
            color: #0B1F3A;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #0B1F3A;
            color: #D8DEE8;
            padding: 25px 7%;
            text-align: center;
            font-size: 13px;
        }

        footer span {
            color: #C9A227;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .nav-links {
                gap: 15px;
            }

            .nav-links a {
                font-size: 13px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .detail-image {
                height: 350px;
            }
        }

        @media (max-width: 700px) {

            .navbar {
                padding: 15px 5%;
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }

            .nav-links .consultation-btn {
                padding: 8px 13px;
            }

            .hero {
                padding: 65px 5%;
            }

            .hero h1 {
                font-size: 34px;
            }

            .hero p {
                font-size: 14px;
            }

            .detail-section {
                padding: 55px 5%;
            }

            .detail-image {
                height: 260px;
            }

            .detail-content {
                padding: 30px 25px;
            }

            .detail-content h2 {
                font-size: 30px;
            }

            .short-description {
                font-size: 16px;
            }
        }

        @media (max-width: 450px) {

            .logo {
                font-size: 24px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .hero h1 {
                font-size: 29px;
            }

            .detail-image {
                height: 220px;
            }

            .detail-content {
                padding: 25px 18px;
            }

            .detail-content h2 {
                font-size: 27px;
            }

            .icon-box {
                width: 55px;
                height: 55px;
            }

        }

    </style>

</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <a
        href="<?= base_url('/') ?>"
        class="logo"
    >
        Lex <span>Counsel</span>
    </a>

    <div class="nav-links">

        <a href="<?= base_url('/') ?>">
            Home
        </a>

        <a href="<?= base_url('about') ?>">
            About
        </a>

        <a href="<?= base_url('practice-areas') ?>">
            Practice Areas
        </a>

        <a href="<?= base_url('attorneys') ?>">
            Attorneys
        </a>

        <a href="<?= base_url('blog') ?>">
            Blog
        </a>

        <a href="<?= base_url('contact') ?>">
            Contact
        </a>

        <a
            href="<?= base_url('consultation') ?>"
            class="consultation-btn"
        >
            Consultation
        </a>

    </div>

</nav>


<!-- =========================
     HERO
========================= -->

<section class="hero">

    <h1>
        <?= esc($practiceArea['name']) ?>
    </h1>

    <p>
        Professional legal guidance and representation
        from Lex Counsel.
    </p>

    <div class="breadcrumb">

        Home
        /
        Practice Areas
        /
        <?= esc($practiceArea['name']) ?>

    </div>

</section>


<!-- =========================
     DETAIL
========================= -->

<section class="detail-section">

    <div class="detail-container">

        <div class="detail-card">


            <!-- IMAGE -->

            <div class="detail-image">

                <?php if (!empty($practiceArea['image'])): ?>

                    <img
                        src="<?= base_url('uploads/practice-areas/' . $practiceArea['image']) ?>"
                        alt="<?= esc($practiceArea['name']) ?>"
                    >

                <?php else: ?>

                    <div class="image-placeholder">

                        <i class="fa-solid fa-scale-balanced"></i>

                        <h3>
                            Lex Counsel
                        </h3>

                    </div>

                <?php endif; ?>

            </div>


            <!-- CONTENT -->

            <div class="detail-content">

                <div class="service-label">
                    Practice Area
                </div>


                <?php if (!empty($practiceArea['icon'])): ?>

                    <div class="icon-box">
                        <span>
                            <?= esc($practiceArea['icon']) ?>
                        </span>
                    </div>

                <?php else: ?>

                    <div class="icon-box">

                        <i class="fa-solid fa-scale-balanced"></i>

                    </div>

                <?php endif; ?>


                <h2>
                    <?= esc($practiceArea['name']) ?>
                </h2>


                <?php if (!empty($practiceArea['short_description'])): ?>

                    <div class="short-description">

                        <?= esc($practiceArea['short_description']) ?>

                    </div>

                <?php endif; ?>


                <?php if (!empty($practiceArea['description'])): ?>

                    <div class="description">

                        <?php

                        $paragraphs = preg_split(
                            "/\r\n|\r|\n/",
                            trim((string) $practiceArea['description'])
                        );

                        foreach ($paragraphs as $paragraph):

                            if (trim($paragraph) !== ''):
                        ?>

                            <p>
                                <?= esc($paragraph) ?>
                            </p>

                        <?php
                            endif;

                        endforeach;
                        ?>

                    </div>

                <?php else: ?>

                    <div class="description">

                        <p>
                            Lex Counsel provides professional legal
                            guidance and representation in this area
                            of law. Contact us for further information
                            and legal consultation.
                        </p>

                    </div>

                <?php endif; ?>


                <a
                    href="<?= base_url('practice-areas') ?>"
                    class="back-btn"
                >

                    <i class="fa-solid fa-arrow-left"></i>

                    Back to Practice Areas

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer>

    © <?= date('Y') ?>

    <span>Lex Counsel</span>.

    All rights reserved.

</footer>

</body>

</html>