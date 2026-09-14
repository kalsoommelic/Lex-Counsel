<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- =========================================
     HERO SECTION
========================================= -->

<section class="hero-section">

    <div class="container hero-content">

        <div class="hero-text">

            <span class="hero-label">
                TRUSTED LEGAL COUNSEL
            </span>

            <h1>
                Justice.
                <span>Integrity.</span>
                Excellence.
            </h1>

            <p>
                Strategic legal representation built on experience,
                trust and an unwavering commitment to our clients.
            </p>

            <div class="hero-buttons">

                <a href="<?= base_url('consultation') ?>"
                   class="btn btn-primary">
                    Book a Consultation
                </a>

                <a href="<?= base_url('practice-areas') ?>"
                   class="btn btn-outline">
                    Explore Our Practice Areas
                </a>

            </div>

        </div>


        <div class="hero-card">

            <div class="hero-card-icon">
                ⚖
            </div>

            <h3>
                Trusted Legal Guidance
            </h3>

            <p>
                Professional advice and representation
                tailored to your legal needs.
            </p>

            <div class="hero-card-line"></div>

            <strong>
                Your Rights. Our Commitment.
            </strong>

        </div>

    </div>

</section>


<!-- =========================================
     TRUST / STATS
========================================= -->

<section class="stats-section">

    <div class="container stats-grid">

        <div class="stat-item">
            <strong>15+</strong>
            <span>Years of Experience</span>
        </div>

        <div class="stat-item">
            <strong>500+</strong>
            <span>Cases Handled</span>
        </div>

        <div class="stat-item">
            <strong>95%</strong>
            <span>Client Satisfaction</span>
        </div>

        <div class="stat-item">
            <strong>24/7</strong>
            <span>Client Support</span>
        </div>

    </div>

</section>


<!-- =========================================
     INTRODUCTION
========================================= -->

<section class="intro-section">

    <div class="container intro-grid">

        <div class="section-heading">

            <span class="section-label">
                WHY LEX COUNSEL
            </span>

            <h2>
                Legal Expertise.
                <span>Personal Commitment.</span>
            </h2>

        </div>

        <div class="intro-text">

            <p>
                At Lex Counsel, we believe exceptional legal
                representation begins with understanding our clients.
            </p>

            <p>
                Our approach combines legal knowledge, strategic
                thinking and personal attention to provide solutions
                designed around your unique circumstances.
            </p>

            <a href="<?= base_url('about') ?>"
               class="text-link">
                Discover Our Firm →
            </a>

        </div>

    </div>

</section>


<!-- =========================================
     PRACTICE AREAS
========================================= -->

<section class="practice-section">

    <div class="container">

        <div class="section-header center">

            <span class="section-label">
                OUR EXPERTISE
            </span>

            <h2>
                Practice Areas
            </h2>

            <p>
                Comprehensive legal services delivered
                with precision and professionalism.
            </p>

        </div>


        <div class="practice-grid">

            <div class="practice-card">

                <div class="practice-icon">
                    ⚖
                </div>

                <h3>
                    Corporate & Business Law
                </h3>

                <p>
                    Strategic legal guidance for businesses,
                    companies and entrepreneurs.
                </p>

                <a href="#">
                    Learn More →
                </a>

            </div>


            <div class="practice-card">

                <div class="practice-icon">
                    🏛
                </div>

                <h3>
                    Civil Litigation
                </h3>

                <p>
                    Strong representation and strategic
                    solutions for complex civil disputes.
                </p>

                <a href="#">
                    Learn More →
                </a>

            </div>


            <div class="practice-card">

                <div class="practice-icon">
                    📜
                </div>

                <h3>
                    Family Law
                </h3>

                <p>
                    Compassionate and professional guidance
                    through sensitive family matters.
                </p>

                <a href="#">
                    Learn More →
                </a>

            </div>


            <div class="practice-card">

                <div class="practice-icon">
                    🏠
                </div>

                <h3>
                    Property Law
                </h3>

                <p>
                    Legal assistance for property transactions,
                    disputes and documentation.
                </p>

                <a href="#">
                    Learn More →
                </a>

            </div>


            <div class="practice-card">

                <div class="practice-icon">
                    👨‍⚖️
                </div>

                <h3>
                    Criminal Defense
                </h3>

                <p>
                    Dedicated legal representation focused
                    on protecting your rights.
                </p>

                <a href="#">
                    Learn More →
                </a>

            </div>


            <div class="practice-card">

                <div class="practice-icon">
                    🌍
                </div>

                <h3>
                    International Law
                </h3>

                <p>
                    Cross-border legal support for individuals
                    and organizations.
                </p>

                <a href="#">
                    Learn More →
                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================================
     CALL TO ACTION
========================================= -->

<section class="cta-section">

    <div class="container cta-content">

        <span class="section-label">
            NEED LEGAL ASSISTANCE?
        </span>

        <h2>
            Let's Discuss Your Legal Matter.
        </h2>

        <p>
            Speak with our legal team and take the first
            step toward a clear and confident solution.
        </p>

        <a href="<?= base_url('consultation') ?>"
           class="btn btn-gold">
            Schedule a Consultation
        </a>

    </div>

</section>

<?= $this->endSection() ?>