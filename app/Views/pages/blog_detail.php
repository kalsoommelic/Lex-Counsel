<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($post['title']) ?> | Lex Counsel</title>

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
            line-height: 1.8;
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
            padding: 65px 7%;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            color: #ffffff;
            font-size: 45px;
            line-height: 1.25;
            max-width: 900px;
            margin: 0 auto 18px;
        }

        .hero-meta {
            color: #d7dee8;
            font-size: 13px;
        }

        .hero-meta span {
            color: #C9A227;
        }

        /* ARTICLE */

        .article-section {
            padding: 65px 7%;
        }

        .article-container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
        }

        /* FEATURED IMAGE */

        .featured-image {
            width: 100%;
            max-height: 480px;
            background: #0B1F3A;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .featured-image img {
            width: 100%;
            max-height: 480px;
            object-fit: cover;
        }

        .image-placeholder {
            color: #C9A227;
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            padding: 100px 20px;
        }

        /* ARTICLE CONTENT */

        .article-content {
            padding: 45px;
        }

        .category {
            color: #C9A227;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .article-date {
            color: #94A3B8;
            font-size: 13px;
            margin-bottom: 30px;
        }

        .excerpt {
            font-size: 18px;
            font-weight: 500;
            color: #475569;
            border-left: 4px solid #C9A227;
            padding-left: 18px;
            margin-bottom: 30px;
        }

        .content {
            color: #334155;
            font-size: 15px;
        }

        .content p {
            margin-bottom: 22px;
        }

        .article-footer {
            border-top: 1px solid #e5e7eb;
            margin-top: 35px;
            padding-top: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .views {
            color: #94A3B8;
            font-size: 13px;
        }

        .back-btn {
            display: inline-block;
            background: #0B1F3A;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #C9A227;
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

        @media (max-width: 700px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .hero {
                padding: 50px 5%;
            }

            .hero h1 {
                font-size: 34px;
            }

            .article-section {
                padding: 40px 5%;
            }

            .article-content {
                padding: 28px 22px;
            }

            .article-footer {
                flex-direction: column;
                align-items: flex-start;
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

        <a href="<?= base_url('practice-areas') ?>">
            Practice Areas
        </a>

        <a href="<?= base_url('attorneys') ?>">
            Attorneys
        </a>

        <a href="<?= base_url('blog') ?>" class="active">
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
        <?= esc($post['title']) ?>
    </h1>

    <div class="hero-meta">

        <?= esc($post['category_name'] ?? 'Legal') ?>

        <span> • </span>

        <?php
            $date = !empty($post['published_at'])
                ? $post['published_at']
                : $post['created_at'];
        ?>

        <?= $date ? date('F d, Y', strtotime($date)) : '' ?>

    </div>

</section>


<!-- ARTICLE -->

<section class="article-section">

    <article class="article-container">


        <!-- FEATURED IMAGE -->

        <div class="featured-image">

            <?php if (!empty($post['featured_image'])): ?>

                <img
                    src="<?= base_url('uploads/posts/' . $post['featured_image']) ?>"
                    alt="<?= esc($post['title']) ?>"
                >

            <?php else: ?>

                <div class="image-placeholder">
                    Lex Counsel
                </div>

            <?php endif; ?>

        </div>


        <!-- ARTICLE CONTENT -->

        <div class="article-content">

            <?php if (!empty($post['category_name'])): ?>

                <div class="category">
                    <?= esc($post['category_name']) ?>
                </div>

            <?php endif; ?>


            <div class="article-date">

                <?php if ($date): ?>

                    Published on <?= date('F d, Y', strtotime($date)) ?>

                <?php endif; ?>

            </div>


            <?php if (!empty($post['excerpt'])): ?>

                <div class="excerpt">
                    <?= esc($post['excerpt']) ?>
                </div>

            <?php endif; ?>


            <div class="content">

                <?php
                    $paragraphs = preg_split(
                        "/\r\n|\r|\n/",
                        trim($post['content'])
                    );
                ?>

                <?php foreach ($paragraphs as $paragraph): ?>

                    <?php if (trim($paragraph) !== ''): ?>

                        <p>
                            <?= nl2br(esc(trim($paragraph))) ?>
                        </p>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>


            <!-- ARTICLE FOOTER -->

            <div class="article-footer">

                <div class="views">
                    👁 <?= (int) $post['views'] ?> views
                </div>

                <a
                    href="<?= base_url('blog') ?>"
                    class="back-btn"
                >
                    ← Back to Blog
                </a>

            </div>

        </div>

    </article>

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