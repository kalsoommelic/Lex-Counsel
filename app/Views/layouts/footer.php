</main>

<footer class="site-footer">

    <div class="container footer-grid">

        <!-- About -->
        <div class="footer-column">

            <a href="<?= base_url('/') ?>" class="footer-logo">
                Lex Counsel
            </a>

            <p>
                Justice. Integrity. Excellence.
            </p>

            <p class="footer-description">
                Professional legal counsel built on trust,
                integrity and excellence.
            </p>

        </div>


        <!-- Quick Links -->
        <div class="footer-column">

            <h3>Quick Links</h3>

            <a href="<?= base_url('/') ?>">Home</a>

            <a href="<?= base_url('about') ?>">About</a>

            <a href="<?= base_url('practice-areas') ?>">
                Practice Areas
            </a>

            <a href="<?= base_url('attorneys') ?>">
                Attorneys
            </a>

        </div>


        <!-- Resources -->
        <div class="footer-column">

            <h3>Resources</h3>

            <a href="<?= base_url('blog') ?>">Legal Insights</a>

            <a href="<?= base_url('contact') ?>">Contact</a>

            <a href="<?= base_url('consultation') ?>">
                Book Consultation
            </a>

            <a href="#">Privacy Policy</a>

        </div>


        <!-- Contact -->
        <div class="footer-column">

            <h3>Contact</h3>

            <p>📞 +92 XXX XXXXXXX</p>

            <p>✉️ info@lexcounsel.com</p>

            <p>📍 Pakistan</p>

        </div>

    </div>


    <div class="footer-bottom">

        <div class="container">

            <p>
                © <?= date('Y') ?> Lex Counsel.
                All Rights Reserved.
            </p>

            <p>
                Justice. Integrity. Excellence.
            </p>

        </div>

    </div>

</footer>


<!-- Main JavaScript -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

<?= $this->renderSection('scripts') ?>

</body>
</html>