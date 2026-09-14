<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lex Counsel | Justice. Integrity. Excellence.</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #1E293B;
            background: #ffffff;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        /* =========================
           HEADER
        ========================= */

        header {
            background: #0B1F3A;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.12);
        }

        .navbar {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .logo span {
            color: #C9A227;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }

        .nav-links a {
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #C9A227;
        }

        .nav-btn {
            background: #C9A227;
            color: #0B1F3A !important;
            padding: 11px 18px;
            border-radius: 4px;
            font-weight: 600 !important;
        }

        .nav-btn:hover {
            background: #ffffff;
            color: #0B1F3A !important;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 650px;
            display: flex;
            align-items: center;
            background:
                linear-gradient(
                    rgba(11, 31, 58, 0.94),
                    rgba(11, 31, 58, 0.94)
                );
            color: #ffffff;
        }

        .hero-content {
            max-width: 760px;
            padding: 80px 0;
        }

        .hero-tag {
            color: #C9A227;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 58px;
            line-height: 1.15;
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: #C9A227;
        }

        .hero p {
            max-width: 650px;
            color: #e2e8f0;
            font-size: 17px;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 13px 24px;
            border-radius: 4px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary {
            background: #C9A227;
            color: #0B1F3A;
        }

        .btn-primary:hover {
            background: #ffffff;
        }

        .btn-outline {
            border: 1px solid #C9A227;
            color: #ffffff;
        }

        .btn-outline:hover {
            background: #C9A227;
            color: #0B1F3A;
        }

        /* =========================
           GENERAL SECTIONS
        ========================= */

        section {
            padding: 85px 0;
        }

        .section-heading {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 50px;
        }

        .section-heading span {
            color: #C9A227;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .section-heading h2 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 40px;
            margin: 8px 0 15px;
        }

        .section-heading p {
            color: #64748B;
        }

        /* =========================
           ABOUT
        ========================= */

        .about-section {
            background: #F8F9FA;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 55px;
            align-items: center;
        }

        .about-content h2 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 40px;
            margin-bottom: 20px;
        }

        .about-content p {
            color: #64748B;
            margin-bottom: 18px;
        }

        .about-box {
            background: #0B1F3A;
            color: #ffffff;
            padding: 45px;
            border-left: 5px solid #C9A227;
        }

        .about-box i {
            font-size: 42px;
            color: #C9A227;
            margin-bottom: 20px;
        }

        .about-box h3 {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            margin-bottom: 12px;
        }

        .about-box p {
            color: #cbd5e1;
        }

        /* =========================
           PRACTICE AREAS
        ========================= */

        .practice-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .practice-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 32px 25px;
            transition: 0.3s;
        }

        .practice-card:hover {
            transform: translateY(-6px);
            border-color: #C9A227;
            box-shadow: 0 12px 30px rgba(11, 31, 58, 0.08);
        }

        .practice-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0B1F3A;
            color: #C9A227;
            border-radius: 50%;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .practice-card h3 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 23px;
            margin-bottom: 10px;
        }

        .practice-card p {
            color: #64748B;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .learn-more {
            color: #0B1F3A;
            font-size: 14px;
            font-weight: 600;
        }

        .learn-more:hover {
            color: #C9A227;
        }

        /* =========================
           WHY US
        ========================= */

        .why-section {
            background: #F8F9FA;
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .why-card {
            background: #ffffff;
            padding: 35px 25px;
            text-align: center;
            border-top: 3px solid #C9A227;
        }

        .why-card i {
            color: #C9A227;
            font-size: 32px;
            margin-bottom: 15px;
        }

        .why-card h3 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .why-card p {
            color: #64748B;
            font-size: 14px;
        }

        /* =========================
           CTA
        ========================= */

        .cta {
            background: #0B1F3A;
            color: #ffffff;
            text-align: center;
        }

        .cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            margin-bottom: 15px;
        }

        .cta p {
            max-width: 650px;
            margin: 0 auto 28px;
            color: #cbd5e1;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #071426;
            color: #cbd5e1;
            padding: 55px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 40px;
            padding-bottom: 35px;
        }

        .footer-brand h3 {
            font-family: 'Playfair Display', serif;
            color: #ffffff;
            font-size: 28px;
            margin-bottom: 12px;
        }

        .footer-brand h3 span {
            color: #C9A227;
        }

        .footer-brand p {
            font-size: 14px;
            max-width: 400px;
        }

        footer h4 {
            color: #ffffff;
            margin-bottom: 15px;
        }

        footer ul {
            list-style: none;
        }

        footer li {
            margin-bottom: 8px;
        }

        footer a {
            color: #cbd5e1;
            font-size: 14px;
        }

        footer a:hover {
            color: #C9A227;
        }

        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 18px;
            text-align: center;
            font-size: 13px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .nav-links {
                gap: 14px;
            }

            .hero h1 {
                font-size: 45px;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .practice-grid,
            .why-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 650px) {

            .navbar {
                flex-direction: column;
                padding: 15px 0;
                gap: 12px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                min-height: auto;
            }

            .hero-content {
                padding: 70px 0;
            }

            .hero h1 {
                font-size: 38px;
            }

            .hero p {
                font-size: 15px;
            }

            .practice-grid,
            .why-grid,
            .footer-grid {
                grid-template-columns: 1fr;
            }

            .section-heading h2,
            .about-content h2 {
                font-size: 32px;
            }

            .cta h2 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

<!-- =========================
     HEADER
========================= -->

<header>

    <div class="container navbar">

        <a href="<?= base_url('/') ?>" class="logo">
            Lex <span>Counsel</span>
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

            <li>
                <a
                    href="<?= base_url('consultation') ?>"
                    class="nav-btn"
                >
                    Book Consultation
                </a>
            </li>

        </ul>

    </div>

</header>


<!-- =========================
     HERO
========================= -->

<section class="hero">

    <div class="container">

        <div class="hero-content">

            <div class="hero-tag">
                Professional Legal Counsel
            </div>

            <h1>
                Justice.
                <span>Integrity.</span>
                Excellence.
            </h1>

            <p>
                Lex Counsel provides professional legal guidance,
                trusted representation, and practical solutions
                for individuals, families, and businesses.
            </p>

            <div class="hero-buttons">

                <a
                    href="<?= base_url('consultation') ?>"
                    class="btn btn-primary"
                >
                    Book a Consultation
                </a>

                <a
                    href="<?= base_url('practice-areas') ?>"
                    class="btn btn-outline"
                >
                    Explore Practice Areas
                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     ABOUT
========================= -->

<section class="about-section">

    <div class="container">

        <div class="about-grid">

            <div class="about-content">

                <span
                    style="
                        color:#C9A227;
                        text-transform:uppercase;
                        font-size:13px;
                        font-weight:600;
                        letter-spacing:2px;
                    "
                >
                    About Lex Counsel
                </span>

                <h2>
                    Trusted Legal Guidance
                </h2>

                <p>
                    At Lex Counsel, we are committed to providing
                    professional and reliable legal services
                    tailored to the needs of our clients.
                </p>

                <p>
                    Our approach combines legal knowledge,
                    professional integrity, and a strong
                    commitment to achieving practical outcomes.
                </p>

                <a
                    href="<?= base_url('about') ?>"
                    class="btn btn-primary"
                >
                    Learn More About Us
                </a>

            </div>


            <div class="about-box">

                <i class="fa-solid fa-scale-balanced"></i>

                <h3>
                    Your Rights. Our Commitment.
                </h3>

                <p>
                    We believe every client deserves clear legal
                    guidance, respectful representation, and
                    dedicated professional support.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     PRACTICE AREAS
========================= -->

<section>

    <div class="container">

        <div class="section-heading">

            <span>
                Our Expertise
            </span>

            <h2>
                Practice Areas
            </h2>

            <p>
                Explore our key areas of legal practice and
                discover how Lex Counsel can assist you.
            </p>

        </div>


<div class="practice-grid">

    <?php if (!empty($practiceAreas)): ?>

        <?php foreach ($practiceAreas as $area): ?>

            <div class="practice-card">

                <div class="practice-icon">
                    <i class="<?= esc($area['icon'] ?: 'fa-solid fa-scale-balanced') ?>"></i>
                </div>

                <h3>
                    <?= esc($area['name']) ?>
                </h3>

                <p>
                    <?= esc($area['short_description']) ?>
                </p>

                <a
                    href="<?= base_url('practice-areas/' . $area['slug']) ?>"
                    class="learn-more"
                >
                    Learn More →
                </a>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="practice-card">

            <div class="practice-icon">
                <i class="fa-solid fa-scale-balanced"></i>
            </div>

            <h3>
                Legal Services
            </h3>

            <p>
                Professional legal guidance and representation
                tailored to your legal needs.
            </p>

            <a
                href="<?= base_url('practice-areas') ?>"
                class="learn-more"
            >
                View Practice Areas →
            </a>

        </div>

    <?php endif; ?>

</div>

</section>

<!-- =========================
     OUR ATTORNEYS
========================= -->

<section>

    <div class="container">

        <div class="section-heading">

            <span>
                Our Legal Team
            </span>

            <h2>
                Meet Our Attorneys
            </h2>

            <p>
                Experienced legal professionals committed to
                providing trusted representation and guidance.
            </p>

        </div>


        <?php if (!empty($attorneys)): ?>

            <div class="practice-grid">

                <?php foreach ($attorneys as $attorney): ?>

                    <div class="practice-card">

                        <?php if (!empty($attorney['image'])): ?>

                            <img
                                src="<?= base_url('uploads/attorneys/' . $attorney['image']) ?>"
                                alt="<?= esc($attorney['name']) ?>"
                                style="
                                    width:100%;
                                    height:220px;
                                    object-fit:cover;
                                    margin-bottom:20px;
                                "
                            >

                        <?php else: ?>

                            <div
                                style="
                                    width:100%;
                                    height:220px;
                                    background:#0B1F3A;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    margin-bottom:20px;
                                "
                            >
                                <i
                                    class="fa-solid fa-user-tie"
                                    style="
                                        font-size:65px;
                                        color:#C9A227;
                                    "
                                ></i>
                            </div>

                        <?php endif; ?>


                        <h3>
                            <?= esc($attorney['name']) ?>
                        </h3>


                        <?php if (!empty($attorney['designation'])): ?>

                            <p
                                style="
                                    color:#C9A227;
                                    font-weight:600;
                                    margin-bottom:8px;
                                "
                            >
                                <?= esc($attorney['designation']) ?>
                            </p>

                        <?php endif; ?>


                        <?php if (!empty($attorney['specialization'])): ?>

                            <p>
                                <?= esc($attorney['specialization']) ?>
                            </p>

                        <?php endif; ?>


                        <a
                            href="<?= base_url('attorneys/' . $attorney['slug']) ?>"
                            class="learn-more"
                        >
                            View Profile →
                        </a>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div
                style="
                    text-align:center;
                    padding:40px;
                    background:#F8F9FA;
                "
            >

                <i
                    class="fa-solid fa-user-tie"
                    style="
                        font-size:45px;
                        color:#C9A227;
                        margin-bottom:15px;
                    "
                ></i>

                <h3
                    style="
                        font-family:'Playfair Display', serif;
                        color:#0B1F3A;
                        margin-bottom:10px;
                    "
                >
                    Our Legal Team
                </h3>

                <p style="color:#64748B;">
                    Attorney profiles will be available soon.
                </p>

            </div>

        <?php endif; ?>


        <div
            style="
                text-align:center;
                margin-top:35px;
            "
        >

            <a
                href="<?= base_url('attorneys') ?>"
                class="btn btn-primary"
            >
                View All Attorneys
            </a>

        </div>

    </div>

</section>

<!-- =========================
     LATEST BLOG POSTS
========================= -->

<section>

    <div class="container">

        <div class="section-heading">

            <span>
                Legal Insights
            </span>

            <h2>
                Latest From Our Blog
            </h2>

            <p>
                Read useful legal information, updates, and
                insights from Lex Counsel.
            </p>

        </div>


        <?php if (!empty($latestPosts)): ?>

            <div class="practice-grid">

                <?php foreach ($latestPosts as $post): ?>

                    <div class="practice-card">

                        <?php if (!empty($post['featured_image'])): ?>

                            <img
                                src="<?= base_url('uploads/posts/' . $post['featured_image']) ?>"
                                alt="<?= esc($post['title']) ?>"
                                style="
                                    width:100%;
                                    height:190px;
                                    object-fit:cover;
                                    margin-bottom:20px;
                                "
                            >

                        <?php else: ?>

                            <div
                                style="
                                    width:100%;
                                    height:190px;
                                    background:#0B1F3A;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    margin-bottom:20px;
                                "
                            >

                                <i
                                    class="fa-solid fa-scale-balanced"
                                    style="
                                        font-size:55px;
                                        color:#C9A227;
                                    "
                                ></i>

                            </div>

                        <?php endif; ?>


                        <?php if (!empty($post['category_name'])): ?>

                            <div
                                style="
                                    color:#C9A227;
                                    font-size:12px;
                                    font-weight:600;
                                    text-transform:uppercase;
                                    letter-spacing:1px;
                                    margin-bottom:8px;
                                "
                            >
                                <?= esc($post['category_name']) ?>
                            </div>

                        <?php endif; ?>


                        <h3>
                            <?= esc($post['title']) ?>
                        </h3>


                        <?php if (!empty($post['excerpt'])): ?>

                            <p>
                                <?= esc($post['excerpt']) ?>
                            </p>

                        <?php endif; ?>


                        <a
                            href="<?= base_url('blog/' . $post['slug']) ?>"
                            class="learn-more"
                        >
                            Read Article →
                        </a>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div
                style="
                    text-align:center;
                    padding:40px;
                    background:#F8F9FA;
                "
            >

                <i
                    class="fa-solid fa-newspaper"
                    style="
                        font-size:45px;
                        color:#C9A227;
                        margin-bottom:15px;
                    "
                ></i>

                <h3
                    style="
                        font-family:'Playfair Display', serif;
                        color:#0B1F3A;
                        margin-bottom:10px;
                    "
                >
                    Legal Insights Coming Soon
                </h3>

                <p style="color:#64748B;">
                    New legal articles will be published here soon.
                </p>

            </div>

        <?php endif; ?>


        <div
            style="
                text-align:center;
                margin-top:35px;
            "
        >

            <a
                href="<?= base_url('blog') ?>"
                class="btn btn-primary"
            >
                View All Articles
            </a>

        </div>

    </div>

</section>




<!-- =========================
     WHY CHOOSE US
========================= -->

<section class="why-section">

    <div class="container">

        <div class="section-heading">

            <span>
                Why Lex Counsel
            </span>

            <h2>
                Professional. Trusted. Dedicated.
            </h2>

            <p>
                We focus on providing dependable legal support
                with professionalism and integrity.
            </p>

        </div>


        <div class="why-grid">


            <div class="why-card">

                <i class="fa-solid fa-scale-balanced"></i>

                <h3>
                    Legal Excellence
                </h3>

                <p>
                    Focused legal guidance based on knowledge,
                    preparation, and professional standards.
                </p>

            </div>


            <div class="why-card">

                <i class="fa-solid fa-handshake"></i>

                <h3>
                    Client Focused
                </h3>

                <p>
                    We listen carefully to our clients and
                    understand their individual legal needs.
                </p>

            </div>


            <div class="why-card">

                <i class="fa-solid fa-shield-halved"></i>

                <h3>
                    Professional Integrity
                </h3>

                <p>
                    We value confidentiality, honesty,
                    transparency, and responsible representation.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     CALL TO ACTION
========================= -->

<section class="cta">

    <div class="container">

        <h2>
            Need Legal Assistance?
        </h2>

        <p>
            Schedule a consultation with Lex Counsel and
            take the next step toward understanding your
            legal options.
        </p>

        <a
            href="<?= base_url('consultation') ?>"
            class="btn btn-primary"
        >
            Request a Consultation
        </a>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <div class="container">

        <div class="footer-grid">


            <div class="footer-brand">

                <h3>
                    Lex <span>Counsel</span>
                </h3>

                <p>
                    Professional legal guidance built on
                    justice, integrity, and excellence.
                </p>

            </div>


            <div>

                <h4>
                    Quick Links
                </h4>

                <ul>

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

                </ul>

            </div>


            <div>

                <h4>
                    Legal Services
                </h4>

                <ul>

                    <li>
                        <a href="<?= base_url('blog') ?>">
                            Legal Blog
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('contact') ?>">
                            Contact Us
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('consultation') ?>">
                            Consultation
                        </a>
                    </li>

                </ul>

            </div>

        </div>


        <div class="copyright">

            © <?= date('Y') ?> Lex Counsel.
            All rights reserved.

        </div>

    </div>

</footer>

</body>
</html>