<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<style>
    .contact-page {
        background: #f8f9fa;
        padding: 80px 0;
    }

    .contact-hero {
        background: #0B1F3A;
        padding: 75px 20px;
        text-align: center;
        color: #ffffff;
    }

    .contact-hero .section-label {
        color: #C9A227;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        display: inline-block;
        margin-bottom: 12px;
    }

    .contact-hero h1 {
        font-family: "Playfair Display", serif;
        font-size: 48px;
        margin: 0 0 15px;
        color: #ffffff;
    }

    .contact-hero p {
        max-width: 700px;
        margin: 0 auto;
        color: #dbe4ef;
        font-size: 16px;
        line-height: 1.8;
    }

    .contact-layout {
        display: grid;
        grid-template-columns: 0.85fr 1.4fr;
        gap: 35px;
        max-width: 1150px;
        margin: 0 auto;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .contact-info-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-left: 4px solid #C9A227;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 8px 25px rgba(11, 31, 58, 0.06);
    }

    .contact-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0B1F3A;
        color: #C9A227;
        border-radius: 50%;
        font-size: 18px;
        margin-bottom: 15px;
    }

    .contact-info-card h3 {
        font-family: "Playfair Display", serif;
        color: #0B1F3A;
        font-size: 21px;
        margin: 0 0 8px;
    }

    .contact-info-card p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
    }

    .contact-form-card {
        background: #ffffff;
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 12px 35px rgba(11, 31, 58, 0.08);
        border: 1px solid #e5e7eb;
    }

    .contact-form-card h2 {
        font-family: "Playfair Display", serif;
        color: #0B1F3A;
        font-size: 30px;
        margin: 0 0 8px;
    }

    .contact-form-card .form-intro {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 28px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #0B1F3A;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        padding: 13px 15px;
        border: 1px solid #d7dce3;
        border-radius: 6px;
        background: #ffffff;
        color: #1e293b;
        font-family: "Poppins", sans-serif;
        font-size: 14px;
        outline: none;
        transition: 0.25s ease;
    }

    .form-control:focus {
        border-color: #C9A227;
        box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.12);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 150px;
    }

    .btn-gold {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #C9A227;
        color: #0B1F3A;
        border: none;
        padding: 13px 28px;
        border-radius: 5px;
        font-family: "Poppins", sans-serif;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.25s ease;
    }

    .btn-gold:hover {
        background: #b28e1f;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .success-message,
    .error-message {
        max-width: 1150px;
        margin: 0 auto 25px;
        padding: 15px 20px;
        border-radius: 6px;
        font-size: 14px;
    }

    .success-message {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #065f46;
    }

    .error-message {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }

    .error-message p {
        margin: 4px 0;
    }

    @media (max-width: 900px) {
        .contact-layout {
            grid-template-columns: 1fr;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 650px) {
        .contact-page {
            padding: 50px 15px;
        }

        .contact-hero {
            padding: 55px 18px;
        }

        .contact-hero h1 {
            font-size: 36px;
        }

        .contact-info {
            grid-template-columns: 1fr;
        }

        .contact-form-card {
            padding: 25px 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }
</style>

<!-- Contact Hero -->

<section class="contact-hero">

```
<span class="section-label">
    CONTACT US
</span>

<h1>
    Get In Touch
</h1>

<p>
    Have a legal question or need professional assistance?
    Our team is ready to listen, understand your concerns,
    and help you find the right legal solution.
</p>
```

</section>

<!-- Contact Content -->

<section class="contact-page">

```
<div class="container">

    <?php if (session()->getFlashdata('success')): ?>

        <div class="success-message">
            <i class="fa-solid fa-circle-check"></i>
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="error-message">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->get('errors')): ?>

        <div class="error-message">

            <strong>Please correct the following:</strong>

            <?php foreach (session()->get('errors') as $error): ?>

                <p>
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <?= esc($error) ?>
                </p>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <div class="contact-layout">

        <!-- Contact Information -->
        <div class="contact-info">

            <div class="contact-info-card">

                <div class="contact-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <h3>
                    Our Office
                </h3>

                <p>
                    Contact our legal team to discuss
                    your legal concerns and consultation needs.
                </p>

            </div>


            <div class="contact-info-card">

                <div class="contact-icon">
                    <i class="fa-solid fa-phone"></i>
                </div>

                <h3>
                    Phone
                </h3>

                <p>
                    Speak directly with our team for
                    professional legal assistance.
                </p>

            </div>


            <div class="contact-info-card">

                <div class="contact-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <h3>
                    Email
                </h3>

                <p>
                    Send us your questions and our team
                    will respond as soon as possible.
                </p>

            </div>


            <div class="contact-info-card">

                <div class="contact-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <h3>
                    Office Hours
                </h3>

                <p>
                    Monday – Friday<br>
                    9:00 AM – 5:00 PM
                </p>

            </div>

        </div>


        <!-- Contact Form -->
        <div class="contact-form-card">

            <h2>
                Send Us a Message
            </h2>

            <p class="form-intro">
                Fill out the form below and our legal team
                will get back to you regarding your inquiry.
            </p>


            <form
                action="<?= base_url('contact/submit') ?>"
                method="POST"
            >

                <?= csrf_field() ?>


                <div class="form-row">

                    <div class="form-group">

                        <label for="name">
                            Full Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            value="<?= esc(old('name')) ?>"
                            placeholder="Enter your full name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="<?= esc(old('email')) ?>"
                            placeholder="Enter your email"
                            required
                        >

                    </div>

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label for="phone">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="form-control"
                            value="<?= esc(old('phone')) ?>"
                            placeholder="Enter your phone number"
                        >

                    </div>


                    <div class="form-group">

                        <label for="subject">
                            Subject
                        </label>

                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            class="form-control"
                            value="<?= esc(old('subject')) ?>"
                            placeholder="Enter message subject"
                            required
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label for="message">
                        Message
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        class="form-control"
                        rows="7"
                        placeholder="Write your message..."
                        required
                    ><?= esc(old('message')) ?></textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-gold"
                >
                    <i class="fa-solid fa-paper-plane"></i>
                    Send Message
                </button>

            </form>

        </div>

    </div>

</div>
```

</section>

<?= $this->endSection() ?>
