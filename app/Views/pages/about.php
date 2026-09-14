<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="container">

        <span class="section-label">
            ABOUT LEX COUNSEL
        </span>

        <div class="section-heading">
            <h2>
                Trusted Legal Counsel
                <span>Built on Integrity.</span>
            </h2>
        </div>

        <div class="intro-text">

            <p>
                Lex Counsel is a professional law firm dedicated to
                providing trusted legal advice, representation and
                consultation to individuals and businesses.
            </p>

            <p>
                Our approach is based on integrity, professionalism
                and a strong commitment to our clients. We believe
                that every legal matter deserves careful attention,
                clear communication and strategic guidance.
            </p>

            <p>
                Our mission is to provide reliable legal solutions
                while protecting the rights and interests of every
                client we serve.
            </p>

        </div>

    </div>
</section>

<section class="section section-light">
    <div class="container">

        <div class="section-header center">

            <span class="section-label">
                OUR VALUES
            </span>

            <h2>
                What We Stand For
            </h2>

            <p>
                Professional values that guide our legal practice.
            </p>

        </div>

        <div class="practice-grid">

            <div class="practice-card">

                <div class="practice-icon">
                    ⚖
                </div>

                <h3>Integrity</h3>

                <p>
                    We maintain honesty, transparency and ethical
                    standards in every legal matter.
                </p>

            </div>

            <div class="practice-card">

                <div class="practice-icon">
                    ✓
                </div>

                <h3>Excellence</h3>

                <p>
                    We strive for professional excellence and
                    carefully prepared legal solutions.
                </p>

            </div>

            <div class="practice-card">

                <div class="practice-icon">
                    ♙
                </div>

                <h3>Client Focus</h3>

                <p>
                    Our clients' interests remain at the center
                    of everything we do.
                </p>

            </div>

        </div>

    </div>
</section>

<section class="cta-section">

    <div class="container cta-content">

        <span class="section-label">
            NEED LEGAL ASSISTANCE?
        </span>

        <h2>
            Let Us Help You Navigate Your Legal Matter.
        </h2>

        <p>
            Schedule a consultation with our legal team
            to discuss your situation.
        </p>

        <a
            href="<?= base_url('consultation') ?>"
            class="btn btn-gold"
        >
            Book a Consultation
        </a>

    </div>

</section>

<?= $this->endSection() ?>