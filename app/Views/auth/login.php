<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            background: #0B1F3A;
            font-family: 'Poppins', sans-serif;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.30);
        }

        .login-brand {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            background: linear-gradient(145deg, #0B1F3A, #102D52);
            color: #ffffff;
        }

        .gold-line {
            width: 70px;
            height: 4px;
            margin-bottom: 25px;
            background: #C9A227;
        }

        .brand-title {
            margin-bottom: 15px;
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            line-height: 1.1;
            color: #ffffff;
        }

        .brand-tagline {
            max-width: 360px;
            margin-bottom: 35px;
            color: #d9e2ec;
            font-size: 16px;
            line-height: 1.8;
        }

        .brand-quote {
            max-width: 360px;
            padding-left: 20px;
            border-left: 2px solid #C9A227;
            color: #ffffff;
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            line-height: 1.6;
        }

        .login-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 55px;
            background: #ffffff;
        }

        .login-form {
            width: 100%;
            max-width: 390px;
        }

        .login-heading {
            margin-bottom: 8px;
            color: #0B1F3A;
            font-family: 'Playfair Display', serif;
            font-size: 34px;
        }

        .login-description {
            margin-bottom: 30px;
            color: #64748B;
            font-size: 14px;
        }

        .alert {
            margin-bottom: 20px;
            padding: 13px 15px;
            border-radius: 8px;
            font-size: 13px;
        }

        .alert-error {
            background: #FEF2F2;
            color: #B91C1C;
            border: 1px solid #FECACA;
        }

        .alert-success {
            background: #F0FDF4;
            color: #15803D;
            border: 1px solid #BBF7D0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #1E293B;
            font-size: 14px;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            outline: none;
            color: #1E293B;
            background: #ffffff;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: 0.2s ease;
        }

        .form-input:focus {
            border-color: #C9A227;
            box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.12);
        }

        .login-button {
            width: 100%;
            margin-top: 8px;
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #C9A227;
            color: #0B1F3A;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s ease;
        }
     

        .login-button:hover {
            background: #B58E1C;
            transform: translateY(-1px);
        }

        .security-note {
            margin-top: 25px;
            text-align: center;
            color: #94A3B8;
            font-size: 12px;
        }

        @media (max-width: 800px) {

            .login-wrapper {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .login-brand {
                padding: 45px;
            }

            .brand-title {
                font-size: 40px;
            }

            .login-panel {
                padding: 45px 30px;
            }
        }
        </style>

</head>

<body>

    <div class="login-wrapper">

        <!-- Brand Section -->

        <div class="login-brand">

            <div class="gold-line"></div>

            <h1 class="brand-title">
                Lex Counsel
            </h1>

            <p class="brand-tagline">
                Justice. Integrity. Excellence.
            </p>

            <p class="brand-quote">
                Professional legal counsel built on trust,
                experience and integrity.
            </p>

        </div>


        <!-- Login Section -->

        <div class="login-panel">

            <form
                class="login-form"
                action="<?= site_url('admin/login') ?>"
                method="POST"
            >

                <?= csrf_field() ?>

                <h2 class="login-heading">
                    Admin Login
                </h2>

                <p class="login-description">
                    Sign in to manage your Lex Counsel website.
                </p>


                <?php if (session()->getFlashdata('error')): ?>

                    <div class="alert alert-error">

                        <?= esc(session()->getFlashdata('error')) ?>

                    </div>

                <?php endif; ?>


                <?php if (session()->getFlashdata('success')): ?>

                    <div class="alert alert-success">

                        <?= esc(session()->getFlashdata('success')) ?>

                    </div>

                <?php endif; ?>


                <!-- Email -->

                <div class="form-group">

                    <label
                        class="form-label"
                        for="email"
                    >
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        placeholder="admin@lexcounsel.com"
                        value="<?= esc(old('email') ?? '') ?>"
                        required
                    >

                </div>


                <!-- Password -->

                <div class="form-group">

                    <label
                        class="form-label"
                        for="password"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <!-- Login Button -->

                <button
                    type="submit"
                    class="login-button"
                >
                    Sign In to Admin Panel
                </button>
                <div style="text-align: center; margin-top: 15px;">
                    <a href="<?= base_url('admin/forgot-password') ?>"
                        style="
                            color: #0B1F3A;
                            text-decoration: none;
                            font-size: 14px;
                            font-weight: 600;
                        ">
                        Forgot Password?
                    </a>
                </div>


                <p class="security-note">
                    🔒 Secure administrator access
                </p>

            </form>

        </div>

    </div>

</body>

</html>
