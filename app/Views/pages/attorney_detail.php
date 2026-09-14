<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= esc($attorney['name']) ?> | Lex Counsel
    </title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap"
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
            background: #F8F9FA;
            color: #1E293B;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */

        .navbar {
            background: #0B1F3A;
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            color: #C9A227;
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            list-style: none;
        }

        .nav-links a {
            color: white;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #C9A227;
        }

        /* HERO */

        .hero {
            background: #0B1F3A;
            color: white;
            text-align: center;
            padding: 70px 20px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 46px;
            margin-bottom: 10px;
        }

        .hero p {
            color: #C9A227;
            font-size: 16px;
        }

        /* BREADCRUMB */

        .breadcrumb {
            max-width: 1100px;
            margin: 25px auto 0;
            padding: 0 20px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #C9A227;
        }

        /* CONTENT */

        .attorney-detail {
            max-width: 1100px;
            margin: 40px auto 80px;
            padding: 0 20px;
        }

        .detail-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(11, 31, 58, 0.08);
            display: grid;
            grid-template-columns: 380px 1fr;
        }

        /* IMAGE */

        .attorney-image {
            background: #0B1F3A;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .attorney-image img {
            width: 100%;
            height: 100%;
            min-height: 500px;
            object-fit: cover;
        }

        .image-placeholder {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #C9A227;
            color: #0B1F3A;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 65px;
        }

        /* INFO */

        .attorney-info {
            padding: 45px;
        }

        .attorney-info h2 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 38px;
            margin-bottom: 8px;
        }

        .designation {
            color: #C9A227;
            font-weight: 600;
            font-size: 17px;
            margin-bottom: 20px;
        }

        .specialization {
            display: inline-block;
            background: #F8F9FA;
            border-left: 4px solid #C9A227;
            padding: 10px 15px;
            margin-bottom: 25px;
            color: #0B1F3A;
            font-weight: 500;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 24px;
            margin: 25px 0 10px;
        }

        .bio {
            white-space: pre-line;
            color: #475569;
            margin-bottom: 25px;
        }

        /* CONTACT */

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 15px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #475569;
        }

        .contact-item i {
            width: 25px;
            color: #C9A227;
        }

        .contact-item a {
            color: #475569;
        }

        .contact-item a:hover {
            color: #C9A227;
        }

        /* BUTTONS */

        .buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 22px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-primary {
            background: #0B1F3A;
            color: white;
        }

        .btn-primary:hover {
            background: #C9A227;
            color: #0B1F3A;
        }

        .btn-secondary {
            background: #F8F9FA;
            color: #0B1F3A;
            border: 1px solid #E2E8F0;
        }

        .btn-secondary:hover {
            border-color: #C9A227;
            color: #C9A227;
        }

        /* FOOTER */

        footer {
            background: #0B1F3A;
            color: white;
            text-align: center;
            padding: 25px 20px;
            font-size: 13px;
        }

        footer span {
            color: #C9A227;
        }

        /* RESPONSIVE */

        @media (max-width: 800px) {

            .nav-links {
                gap: 12px;
            }

            .detail-card {
                grid-template-columns: 1fr;
            }

            .attorney-image {
                min-height: 350px;
            }

            .attorney-image img {
                min-height: 350px;
            }

            .attorney-info {
                padding: 30px;
            }

            .attorney-info h2 {
                font-size: 30px;
            }

            .hero h1 {
                font-size: 36px;
            }
        }

        @media (max-width: 600px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                padding: 50px 20px;
            }

            .hero h1 {
                font-size: 30px;
            }

            .attorney-info {
                padding: 25px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar">

        <a href="<?= base_url('/') ?>" class="logo">
            Lex Counsel
        </a>

        <ul class="nav-links">

            <li>
                <a href="<?= base_url('/') ?>">
                    Home
                </a>
            </li>

            <li>
                <a href="<?= base_url('about') ?>">
                    About
                </a>
            </li>

            <li>
                <a href="<?= base_url('practice-areas') ?>">
                    Practice Areas
                </a>
            </li>

            <li>
                <a href="<?= base_url('attorneys') ?>">
                    Attorneys
                </a>
            </li>

            <li>
                <a href="<?= base_url('blog') ?>">
                    Blog
                </a>
            </li>

            <li>
                <a href="<?= base_url('contact') ?>">
                    Contact
                </a>
            </li>

        </ul>

    </nav>


    <!-- HERO -->

    <section class="hero">

        <h1>
            <?= esc($attorney['name']) ?>
        </h1>

        <?php if (!empty($attorney['designation'])): ?>

            <p>
                <?= esc($attorney['designation']) ?>
            </p>

        <?php endif; ?>

    </section>


    <!-- BREADCRUMB -->

    <div class="breadcrumb">

        <a href="<?= base_url('/') ?>">
            Home
        </a>

        &nbsp; / &nbsp;

        <a href="<?= base_url('attorneys') ?>">
            Attorneys
        </a>

        &nbsp; / &nbsp;

        <?= esc($attorney['name']) ?>

    </div>


    <!-- ATTORNEY DETAIL -->

    <section class="attorney-detail">

        <div class="detail-card">

            <!-- IMAGE -->

            <div class="attorney-image">

                <?php if (!empty($attorney['image'])): ?>

                    <img
                        src="<?= base_url('uploads/attorneys/' . $attorney['image']) ?>"
                        alt="<?= esc($attorney['name']) ?>"
                    >

                <?php else: ?>

                    <div class="image-placeholder">

                        <i class="fa-solid fa-user-tie"></i>

                    </div>

                <?php endif; ?>

            </div>


            <!-- INFORMATION -->

            <div class="attorney-info">

                <h2>
                    <?= esc($attorney['name']) ?>
                </h2>


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

                    <h3 class="section-title">
                        Professional Biography
                    </h3>

                    <div class="bio">
                        <?= esc($attorney['bio']) ?>
                    </div>

                <?php endif; ?>


                <?php if (
                    !empty($attorney['email']) ||
                    !empty($attorney['phone']) ||
                    !empty($attorney['linkedin'])
                ): ?>

                    <h3 class="section-title">
                        Contact Information
                    </h3>

                    <div class="contact-info">


                        <?php if (!empty($attorney['email'])): ?>

                            <div class="contact-item">

                                <i class="fa-solid fa-envelope"></i>

                                <a href="mailto:<?= esc($attorney['email']) ?>">
                                    <?= esc($attorney['email']) ?>
                                </a>

                            </div>

                        <?php endif; ?>


                        <?php if (!empty($attorney['phone'])): ?>

                            <div class="contact-item">

                                <i class="fa-solid fa-phone"></i>

                                <a href="tel:<?= esc($attorney['phone']) ?>">
                                    <?= esc($attorney['phone']) ?>
                                </a>

                            </div>

                        <?php endif; ?>


                        <?php if (!empty($attorney['linkedin'])): ?>

                            <div class="contact-item">

                                <i class="fa-brands fa-linkedin"></i>

                                <a
                                    href="<?= esc($attorney['linkedin']) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    LinkedIn Profile
                                </a>

                            </div>

                        <?php endif; ?>


                    </div>

                <?php endif; ?>


                <!-- BUTTONS -->

                <div class="buttons">

                    <a
                        href="<?= base_url('consultation') ?>"
                        class="btn btn-primary"
                    >
                        <i class="fa-solid fa-calendar-check"></i>

                        Request Consultation
                    </a>


                    <a
                        href="<?= base_url('attorneys') ?>"
                        class="btn btn-secondary"
                    >
                        <i class="fa-solid fa-arrow-left"></i>

                        Back to Attorneys
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->

    <footer>

        © <?= date('Y') ?> <span>Lex Counsel</span>.
        All rights reserved.

    </footer>

</body>

</html>