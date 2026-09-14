<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Attorneys | Lex Counsel</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

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

        .consultation-btn {
            background: #C9A227;
            color: #0B1F3A !important;
            padding: 10px 18px;
            border-radius: 5px;
            font-weight: 600 !important;
        }

        .consultation-btn:hover {
            background: #FFFFFF;
        }

        .hero {
            background: #0B1F3A;
            padding: 80px 7%;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            color: #FFFFFF;
            font-size: 48px;
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
            color: #C9A227;
            font-size: 13px;
        }

        .attorneys-section {
            padding: 80px 7%;
            background: #FFFFFF;
        }

        .section-header {
            text-align: center;
            max-width: 750px;
            margin: 0 auto 50px;
        }

        .section-header h2 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 38px;
            margin-bottom: 12px;
        }

        .section-header p {
            color: #64748B;
            font-size: 15px;
        }

        .attorneys-grid {
            max-width: 1150px;
            margin: auto;

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 28px;
        }

        .attorney-card {
            background: #F8F9FA;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            overflow: hidden;
            transition: 0.3s;
        }

        .attorney-card:hover {
            transform: translateY(-6px);

            box-shadow:
                0 12px 30px rgba(11, 31, 58, 0.12);
        }

        .attorney-image {
            height: 310px;
            background: #0B1F3A;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .attorney-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-placeholder {
            text-align: center;
            color: #FFFFFF;
        }

        .image-placeholder i {
            color: #C9A227;
            font-size: 65px;
            margin-bottom: 12px;
        }

        .image-placeholder p {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
        }

        .attorney-content {
            padding: 25px;
        }

        .attorney-content h3 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 25px;
            margin-bottom: 5px;
        }

        .designation {
            color: #C9A227;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 14px;
        }

        .specialization {
            color: #475569;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .specialization i {
            color: #C9A227;
            margin-right: 6px;
        }

        .bio {
            color: #64748B;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .contact-info {
            border-top: 1px solid #E2E8F0;
            padding-top: 15px;
        }

        .contact-info a {
            display: block;
            color: #475569;
            font-size: 12px;
            margin-bottom: 7px;
            transition: 0.3s;
        }

        .contact-info a:hover {
            color: #C9A227;
        }

        .contact-info i {
            width: 20px;
            color: #C9A227;
        }

        .linkedin {
            margin-top: 12px;
        }

        .linkedin a {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #0B1F3A;
            color: #FFFFFF;

            padding: 8px 13px;
            border-radius: 4px;

            font-size: 12px;
            font-weight: 500;
        }

        .linkedin a:hover {
            background: #C9A227;
            color: #0B1F3A;
        }

        /* =========================
           VIEW PROFILE BUTTON
        ========================= */

        .profile-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            margin-top: 15px;

            background: #C9A227;
            color: #0B1F3A;

            padding: 10px 16px;
            border-radius: 5px;

            font-size: 12px;
            font-weight: 600;

            transition: 0.3s;
        }

        .profile-btn:hover {
            background: #0B1F3A;
            color: #FFFFFF;
        }

        .empty-state {
            max-width: 700px;
            margin: auto;
            text-align: center;

            background: #F8F9FA;
            border: 1px solid #E5E7EB;
            border-radius: 10px;

            padding: 60px 30px;
        }

        .empty-state i {
            font-size: 55px;
            color: #C9A227;
            margin-bottom: 18px;
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #64748B;
            font-size: 14px;
        }

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

        @media (max-width: 1000px) {

            .attorneys-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }

        @media (max-width: 800px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 14px;
            }

            .hero h1 {
                font-size: 40px;
            }

        }

        @media (max-width: 650px) {

            .attorneys-grid {
                grid-template-columns: 1fr;
                max-width: 450px;
            }

            .attorneys-section {
                padding: 60px 5%;
            }

            .hero {
                padding: 60px 5%;
            }

            .hero h1 {
                font-size: 34px;
            }

            .section-header h2 {
                font-size: 32px;
            }

            .attorney-image {
                height: 330px;
            }

        }

        @media (max-width: 450px) {

            .logo {
                font-size: 24px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .attorney-image {
                height: 280px;
            }

            .attorney-content {
                padding: 22px;
            }

        }

    </style>

</head>


<body>


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


<section class="hero">

    <h1>
        Our Attorneys
    </h1>

    <p>
        Meet our experienced legal professionals
        dedicated to providing trusted legal guidance,
        representation, and client-focused service.
    </p>

    <div class="breadcrumb">
        Home / Attorneys
    </div>

</section>


<section class="attorneys-section">


    <div class="section-header">

        <h2>
            Meet Our Legal Team
        </h2>

        <p>
            Our attorneys combine legal knowledge,
            professional experience, and commitment
            to deliver effective legal solutions.
        </p>

    </div>


    <?php if (!empty($attorneys)): ?>

        <div class="attorneys-grid">


            <?php foreach ($attorneys as $attorney): ?>

                <div class="attorney-card">


                    <div class="attorney-image">

                        <?php if (!empty($attorney['image'])): ?>

                            <img
                                src="<?= base_url('uploads/attorneys/' . $attorney['image']) ?>"
                                alt="<?= esc($attorney['name']) ?>"
                            >

                        <?php else: ?>

                            <div class="image-placeholder">

                                <i class="fa-solid fa-user-tie"></i>

                                <p>
                                    Lex Counsel
                                </p>

                            </div>

                        <?php endif; ?>

                    </div>


                    <div class="attorney-content">


                        <h3>
                            <?= esc($attorney['name']) ?>
                        </h3>


                        <?php if (!empty($attorney['designation'])): ?>

                            <div class="designation">
                                <?= esc($attorney['designation']) ?>
                            </div>

                        <?php endif; ?>


                        <?php if (!empty($attorney['specialization'])): ?>

                            <div class="specialization">

                                <i class="fa-solid fa-scale-balanced"></i>

                                <?= esc($attorney['specialization']) ?>

                            </div>

                        <?php endif; ?>


                        <?php if (!empty($attorney['bio'])): ?>

                            <div class="bio">
                                <?= esc($attorney['bio']) ?>
                            </div>

                        <?php endif; ?>


                        <?php if (
                            !empty($attorney['email']) ||
                            !empty($attorney['phone'])
                        ): ?>

                            <div class="contact-info">


                                <?php if (!empty($attorney['email'])): ?>

                                    <a
                                        href="mailto:<?= esc($attorney['email']) ?>"
                                    >

                                        <i class="fa-solid fa-envelope"></i>

                                        <?= esc($attorney['email']) ?>

                                    </a>

                                <?php endif; ?>


                                <?php if (!empty($attorney['phone'])): ?>

                                    <a
                                        href="tel:<?= esc($attorney['phone']) ?>"
                                    >

                                        <i class="fa-solid fa-phone"></i>

                                        <?= esc($attorney['phone']) ?>

                                    </a>

                                <?php endif; ?>


                            </div>

                        <?php endif; ?>


                        <?php if (!empty($attorney['linkedin'])): ?>

                            <div class="linkedin">

                                <a
                                    href="<?= esc($attorney['linkedin']) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >

                                    <i class="fa-brands fa-linkedin"></i>

                                    LinkedIn Profile

                                </a>

                            </div>

                        <?php endif; ?>


                        <!-- VIEW PROFILE -->

                        <a
                            href="<?= base_url('attorneys/' . $attorney['slug']) ?>"
                            class="profile-btn"
                        >

                            View Profile

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>


                    </div>

                </div>

            <?php endforeach; ?>


        </div>

    <?php else: ?>


        <div class="empty-state">

            <i class="fa-solid fa-user-tie"></i>

            <h3>
                Our Attorneys
            </h3>

            <p>
                Our legal team information will be
                available here soon.
            </p>

        </div>


    <?php endif; ?>


</section>


<footer>

    © <?= date('Y') ?>

    <span>Lex Counsel</span>.

    All rights reserved.

</footer>


</body>

</html>