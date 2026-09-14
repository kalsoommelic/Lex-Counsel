<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog | Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

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
            padding: 75px 7%;
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
            max-width: 650px;
            margin: auto;
        }

        /* BLOG SECTION */
        .blog-section {
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
            margin: 0 auto;
        }

        /* CATEGORY FILTER */
        .categories {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 40px;
        }

        .category-btn {
            border: 1px solid #C9A227;
            background: #ffffff;
            color: #0B1F3A;
            padding: 8px 18px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        .category-btn:hover,
        .category-btn.active {
            background: #C9A227;
            color: #ffffff;
        }

        /* BLOG GRID */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .blog-card {
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(11, 31, 58, 0.10);
        }

        .blog-image {
            width: 100%;
            height: 210px;
            background: #0B1F3A;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .blog-image-placeholder {
            color: #C9A227;
            font-family: 'Playfair Display', serif;
            font-size: 28px;
        }

        .blog-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .blog-category {
            color: #C9A227;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .blog-title {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 23px;
            line-height: 1.35;
            margin-bottom: 12px;
        }

        .blog-excerpt {
            color: #64748B;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .blog-meta {
            color: #94A3B8;
            font-size: 12px;
            margin-bottom: 18px;
        }

        .read-more {
            display: inline-block;
            color: #0B1F3A;
            border-bottom: 2px solid #C9A227;
            font-size: 13px;
            font-weight: 600;
            padding-bottom: 3px;
            align-self: flex-start;
            margin-top: auto;
            transition: 0.3s;
        }

        .read-more:hover {
            color: #C9A227;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            background: #ffffff;
            padding: 60px 20px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
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
            margin-top: 30px;
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
            .blog-grid {
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

            .blog-section {
                padding: 50px 5%;
            }

            .blog-grid {
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

        <a href="<?= base_url('/') ?>">Home</a>

        <a href="<?= base_url('about') ?>">About</a>

        <a href="<?= base_url('practice-areas') ?>">Practice Areas</a>

        <a href="<?= base_url('attorneys') ?>">Attorneys</a>

        <a href="<?= base_url('blog') ?>" class="active">Blog</a>

        <a href="<?= base_url('contact') ?>">Contact</a>

    </div>

</nav>


<!-- HERO -->
<section class="hero">

    <h1>Legal Insights &amp; Updates</h1>

    <p>
        Stay informed with legal insights, guidance, and updates
        from Lex Counsel.
    </p>

</section>


<!-- BLOG -->
<section class="blog-section">

    <div class="section-title">

        <h2>Latest Articles</h2>

        <div class="gold-line"></div>

    </div>


    <!-- CATEGORY FILTER -->
    <?php if (!empty($categories)): ?>

        <div class="categories">

            <button
                type="button"
                class="category-btn active"
                onclick="filterPosts('all', this)"
            >
                All
            </button>

            <?php foreach ($categories as $category): ?>

                <button
                    type="button"
                    class="category-btn"
                    onclick="filterPosts('<?= esc($category['id']) ?>', this)"
                >
                    <?= esc($category['name']) ?>
                </button>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <?php if (!empty($posts)): ?>

        <div class="blog-grid" id="blogGrid">

            <?php foreach ($posts as $post): ?>

                <article
                    class="blog-card"
                    data-category="<?= esc($post['category_id']) ?>"
                >

                    <!-- IMAGE -->
                    <div class="blog-image">

                        <?php if (!empty($post['featured_image'])): ?>

                            <img
                                src="<?= base_url('uploads/posts/' . $post['featured_image']) ?>"
                                alt="<?= esc($post['title']) ?>"
                            >

                        <?php else: ?>

                            <div class="blog-image-placeholder">
                                Lex Counsel
                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- CONTENT -->
                    <div class="blog-content">

                        <div class="blog-category">
                            <?= esc($post['category_name'] ?? 'Legal') ?>
                        </div>


                        <h3 class="blog-title">
                            <?= esc($post['title']) ?>
                        </h3>


                        <?php if (!empty($post['excerpt'])): ?>

                            <p class="blog-excerpt">
                                <?= esc($post['excerpt']) ?>
                            </p>

                        <?php else: ?>

                            <p class="blog-excerpt">
                                Read this legal article from Lex Counsel.
                            </p>

                        <?php endif; ?>


                        <div class="blog-meta">

                            <?php
                                $date = !empty($post['published_at'])
                                    ? $post['published_at']
                                    : $post['created_at'];
                            ?>

                            <?= $date ? date('F d, Y', strtotime($date)) : '' ?>

                        </div>


                        <a
                            href="<?= base_url('blog/' . $post['slug']) ?>"
                            class="read-more"
                        >
                            Read More →
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="empty-state">

            <h3>No Articles Available</h3>

            <p>
                There are currently no published articles.
                Please check back soon.
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


<script>

function filterPosts(categoryId, button) {

    const cards = document.querySelectorAll('.blog-card');
    const buttons = document.querySelectorAll('.category-btn');

    buttons.forEach(function(btn) {
        btn.classList.remove('active');
    });

    button.classList.add('active');

    cards.forEach(function(card) {

        if (categoryId === 'all') {

            card.style.display = 'flex';

        } else {

            if (card.dataset.category === categoryId) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }

        }

    });

}

</script>

</body>
</html>