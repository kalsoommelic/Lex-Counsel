<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Practice Areas | Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet"
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
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
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
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #C9A227;
        }


        /* HERO */

        .hero {
            background: #0B1F3A;
            padding: 70px 7%;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            color: #ffffff;
            font-size: 48px;
            margin-bottom: 12px;
        }

        .hero p {
            color: #d7dee8;
            font-size: 16px;
            max-width: 700px;
            margin: auto;
        }


        /* SECTION */

        .practice-section {
            padding: 70px 7%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #0B1F3A;
            margin-bottom: 10px;
        }

        .gold-line {
            width: 65px;
            height: 3px;
            background: #C9A227;
            margin: auto;
        }


        /* GRID */

        .practice-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }


        /* CARD */

        .practice-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
        }

        .practice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(11, 31, 58, 0.10);
        }


        /* IMAGE */

        .practice-image {
            width: 100%;
            height: 210px;
            background: #0B1F3A;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .practice-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-placeholder {
            color: #C9A227;
            font-family: 'Playfair Display', serif;
            font-size: 27px;
        }


        /* CARD CONTENT */

        .practice-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .icon {
            font-size: 30px;
            color: #C9A227;
            margin-bottom: 10px;
        }

        .practice-content h3 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 23px;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .practice-content p {
            color: #64748B;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .learn-more {
            color: #0B1F3A;
            border-bottom: 2px solid #C9A227;
            font-size: 13px;
            font-weight: 600;
            align-self: flex-start;
            padding-bottom: 3px;
            margin-top: auto;
            transition: 0.3s;
        }

        .learn-more:hover {
            color: #C9A227;
        }


        /* EMPTY */

        .empty-state {
            text-align: center;
            background: #ffffff;
            padding: 60px 20px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #64748B;
            font-size: 14px;
        }


        /* FOOTER */

        footer {
            background: #0B1F3A;
            color: #ffffff;
            text-align: center;
            padding: 25px 20px;
        }

        footer p {
            font-size: 13px;
            color: #d7dee8;
        }

        footer span {
            color: #C9A227;
        }


        /* RESPONSIVE */

        @media (max-width: 992px) {

            .practice-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-links {
                gap: 15px;
            }

        }


        @media (max-width: 700px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                padding: 55px 5%;
            }

            .hero h1 {
                font-size: 38px;
            }

            .practice-section {
                padding: 50px 5%;
            }

            .practice-grid {
                grid-template-columns: 1fr;
            }

            .section-title h2 {
                font-size: 30px;
            }

        }

    </style>

</head>

<body>


<!-- NAVBAR -->

<nav class="navbar">

    <a href="<?= base_url('/') ?>" class="logo">
        Lex <span>Counsel</span>
    </a>


    <div class="nav-links">

        <a href="<?= base_url('/') ?>">
            Home
        </a>

        <a href="<?= base_url('about') ?>">
            About
        </a>

        <a
            href="<?= base_url('practice-areas') ?>"
            class="active"
        >
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

    </div>

</nav>


<!-- HERO -->

<section class="hero">

    <h1>
        Our Practice Areas
    </h1>

    <p>
        Professional legal services and trusted guidance
        across a wide range of legal matters.
    </p>

</section>


<!-- PRACTICE AREAS -->

<section class="practice-section">

    <div class="section-title">

        <h2>
            Legal Services
        </h2>

        <div class="gold-line"></div>

    </div>


    <?php if (!empty($practiceAreas)): ?>

        <div class="practice-grid">

            <?php foreach ($practiceAreas as $area): ?>

                <article class="practice-card">


                    <!-- IMAGE -->

                    <div class="practice-image">

                        <?php if (!empty($area['image'])): ?>

                            <img
                                src="<?= base_url('uploads/practice-areas/' . $area['image']) ?>"
                                alt="<?= esc($area['name']) ?>"
                            >

                        <?php else: ?>

                            <div class="image-placeholder">
                                Lex Counsel
                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- CONTENT -->

                    <div class="practice-content">


                        <?php if (!empty($area['icon'])): ?>

                            <div class="icon">
                                <?= esc($area['icon']) ?>
                            </div>

                        <?php endif; ?>


                        <h3>
                            <?= esc($area['name']) ?>
                        </h3>


                        <?php if (!empty($area['short_description'])): ?>

                            <p>
                                <?= esc($area['short_description']) ?>
                            </p>

                        <?php elseif (!empty($area['description'])): ?>

                            <p>
                                <?= esc(
                                    mb_strimwidth(
                                        strip_tags($area['description']),
                                        0,
                                        150,
                                        '...'
                                    )
                                ) ?>
                            </p>

                        <?php else: ?>

                            <p>
                                Professional legal assistance
                                from Lex Counsel.
                            </p>

                        <?php endif; ?>


                        <a
                            href="<?= base_url('practice-areas/' . $area['slug']) ?>"
                            class="learn-more"
                        >
                            Learn More →
                        </a>


                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="empty-state">

            <h3>
                No Practice Areas Available
            </h3>

            <p>
                Our legal services will be listed here soon.
            </p>

        </div>

    <?php endif; ?>

</section>


<!-- FOOTER -->

<footer>

    <p>

        © <?= date('Y') ?>

        <span>Lex Counsel</span>.

        All rights reserved.

    </p>

</footer>


</body>

</html>