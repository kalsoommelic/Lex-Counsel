<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Request a Consultation | Lex Counsel</title>

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
            padding: 75px 20px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 46px;
            margin-bottom: 12px;
        }

        .hero p {
            max-width: 650px;
            margin: auto;
            color: #E2E8F0;
            font-size: 15px;
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

        /* MAIN */

        .consultation-section {
            max-width: 1100px;
            margin: 45px auto 80px;
            padding: 0 20px;
        }

        .consultation-wrapper {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(11, 31, 58, 0.08);
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
        }

        /* LEFT */

        .consultation-info {
            background: #0B1F3A;
            color: white;
            padding: 45px;
        }

        .consultation-info h2 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            margin-bottom: 15px;
            color: #C9A227;
        }

        .consultation-info p {
            color: #E2E8F0;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 22px;
        }

        .info-item i {
            color: #C9A227;
            font-size: 18px;
            width: 25px;
            margin-top: 4px;
        }

        .info-item h4 {
            font-size: 15px;
            margin-bottom: 3px;
        }

        .info-item span {
            color: #CBD5E1;
            font-size: 13px;
        }

        /* FORM */

        .consultation-form {
            padding: 45px;
        }

        .consultation-form h2 {
            font-family: 'Playfair Display', serif;
            color: #0B1F3A;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .form-intro {
            color: #64748B;
            font-size: 14px;
            margin-bottom: 30px;
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
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-group label span {
            color: #C9A227;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #E2E8F0;
            border-radius: 6px;
            background: #F8F9FA;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #1E293B;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #C9A227;
            background: white;
            box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.08);
        }

        .form-group textarea {
            height: 130px;
            resize: vertical;
        }

        .submit-btn {
            border: none;
            background: #0B1F3A;
            color: white;
            padding: 13px 25px;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #C9A227;
            color: #0B1F3A;
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

        @media (max-width: 850px) {

            .consultation-wrapper {
                grid-template-columns: 1fr;
            }

            .consultation-info,
            .consultation-form {
                padding: 35px;
            }

        }

        @media (max-width: 650px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .hero {
                padding: 55px 20px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .consultation-info,
            .consultation-form {
                padding: 25px;
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
                <a href="<?= base_url('/') ?>">Home</a>
            </li>

            <li>
                <a href="<?= base_url('about') ?>">About</a>
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

        <h1>Request a Consultation</h1>

        <p>
            Speak with our legal professionals and receive
            trusted guidance for your legal matter.
        </p>

    </section>


    <!-- BREADCRUMB -->

    <div class="breadcrumb">

        <a href="<?= base_url('/') ?>">
            Home
        </a>

        &nbsp; / &nbsp;

        Consultation

    </div>


    <!-- CONSULTATION -->

    <section class="consultation-section">

        <div class="consultation-wrapper">


            <!-- LEFT INFORMATION -->

            <div class="consultation-info">

                <h2>
                    Legal Guidance You Can Trust
                </h2>

                <p>
                    Tell us about your legal matter.
                    Our team will review your request
                    and contact you with the appropriate
                    guidance and next steps.
                </p>


                <div class="info-item">

                    <i class="fa-solid fa-scale-balanced"></i>

                    <div>

                        <h4>
                            Professional Legal Advice
                        </h4>

                        <span>
                            Experienced legal professionals
                            ready to assist you.
                        </span>

                    </div>

                </div>


                <div class="info-item">

                    <i class="fa-solid fa-shield-halved"></i>

                    <div>

                        <h4>
                            Confidential Consultation
                        </h4>

                        <span>
                            Your information is treated
                            with professionalism and care.
                        </span>

                    </div>

                </div>


                <div class="info-item">

                    <i class="fa-solid fa-clock"></i>

                    <div>

                        <h4>
                            Prompt Response
                        </h4>

                        <span>
                            We will contact you regarding
                            your consultation request.
                        </span>

                    </div>

                </div>

            </div>


            <!-- FORM -->

            <div class="consultation-form">

                <h2>
                    Consultation Form
                </h2>

                <p class="form-intro">
                    Please provide the following information.
                </p>

                <?php if (session()->getFlashdata('success')): ?>

    <div class="success-message">
        <i class="fa-solid fa-circle-check"></i>
        <?= esc(session()->getFlashdata('success')) ?>
    </div>

<?php endif; ?>


<?php if (session()->getFlashdata('errors')): ?>

    <div class="error-message">

        <strong>
            Please correct the following:
        </strong>

        <ul>

            <?php foreach (session()->getFlashdata('errors') as $error): ?>

                <li>
                    <?= esc($error) ?>
                </li>

            <?php endforeach; ?>

        </ul>

    </div>

<?php endif; ?>


                <form
                    action="<?= base_url('consultation/submit') ?>"
                    method="post"
                >


                    <div class="form-row">


                        <div class="form-group">

                            <label>
                                Full Name <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                placeholder="Enter your full name"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Email Address <span>*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                placeholder="Enter your email"
                                required
                            >

                        </div>


                    </div>


                    <div class="form-row">


                        <div class="form-group">

                            <label>
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                placeholder="Enter your phone number"
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Legal Matter <span>*</span>
                            </label>

                            <select
                                name="practice_area"
                                required
                            >

                                <option value="">
                                    Select Legal Matter
                                </option>

                                <option value="Criminal Law">
                                    Criminal Law
                                </option>

                                <option value="Family Law">
                                    Family Law
                                </option>

                                <option value="Corporate Law">
                                    Corporate Law
                                </option>

                                <option value="Other">
                                    Other
                                </option>

                            </select>

                        </div>


                    </div>


                    <div class="form-group">

                        <label>
                            Preferred Date
                        </label>

                        <input
                            type="date"
                            name="preferred_date"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Describe Your Legal Matter <span>*</span>
                        </label>

                        <textarea
                            name="message"
                            placeholder="Briefly describe your legal matter..."
                            required
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="submit-btn"
                    >

                        <i class="fa-solid fa-paper-plane"></i>

                        Submit Consultation Request

                    </button>


                </form>

            </div>

        </div>

    </section>


    <!-- FOOTER -->

    <footer>

        © <?= date('Y') ?>

        <span>Lex Counsel</span>.

        All rights reserved.

    </footer>


</body>

</html>