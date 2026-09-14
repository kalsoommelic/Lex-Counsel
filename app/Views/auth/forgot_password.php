<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password | Lex Counsel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

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
            padding: 20px;
            background: #0B1F3A;
            font-family: 'Poppins', sans-serif;
        }

        .forgot-container {
            width: 100%;
            max-width: 460px;
        }

        .forgot-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #0B1F3A;
        }

        .logo span {
            color: #C9A227;
        }

        .logo p {
            margin-top: 6px;
            color: #64748B;
            font-size: 13px;
        }

        .title {
            text-align: center;
            margin-bottom: 25px;
        }

        .title h2 {
            color: #1E293B;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .title p {
            color: #64748B;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
        }

        .alert-success {
            background: #DCFCE7;
            color: #166534;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #1E293B;
        }

        .form-group input {
            width: 100%;
            height: 48px;
            padding: 0 14px;
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #1E293B;
            outline: none;
            transition: 0.2s;
        }

        .form-group input:focus {
            border-color: #C9A227;
            box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.12);
        }

        .btn {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 8px;
            background: #C9A227;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            background: #AE8B1D;
        }

        .back-login {
            text-align: center;
            margin-top: 22px;
        }

        .back-login a {
            color: #0B1F3A;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .back-login a:hover {
            color: #C9A227;
        }

        .security-note {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid #E2E8F0;
            text-align: center;
            color: #64748B;
            font-size: 12px;
            line-height: 1.6;
        }

        @media (max-width: 480px) {
            .forgot-card {
                padding: 28px 22px;
            }

            .logo h1 {
                font-size: 28px;
            }

            .title h2 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="forgot-container">

    <div class="forgot-card">

        <div class="logo">
            <h1>Lex <span>Counsel</span></h1>
            <p>Justice. Integrity. Excellence.</p>
        </div>

        <div class="title">
            <h2>Forgot Password?</h2>
            <p>
                Enter your admin email address and we will send
                you instructions to reset your password.
            </p>
        </div>

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

        <form action="<?= base_url('admin/forgot-password') ?>" method="post">

            <?= csrf_field() ?>

            <div class="form-group">
                <label for="email">Admin Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="admin@lexcounsel.com"
                    value="<?= esc(old('email')) ?>"
                    required
                    autocomplete="email"
                >
            </div>

            <button type="submit" class="btn">
                Send Reset Link
            </button>

        </form>

        <div class="back-login">
            <a href="<?= base_url('admin/login') ?>">
                ← Back to Login
            </a>
        </div>

        <div class="security-note">
            For security reasons, we do not reveal whether an
            email address exists in our system.
        </div>

    </div>

</div>

</body>
</html>